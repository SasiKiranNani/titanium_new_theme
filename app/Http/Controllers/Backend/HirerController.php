<?php

namespace App\Http\Controllers\Backend;

use App\Enums\PaymentMethod;
use App\Http\Controllers\Controller;
use App\Http\Requests\HirerDetailsRequest;
use App\Mail\AdminNotificationMail;
use App\Mail\ShareAgreementMail;
use App\Models\AssignVehicle;
use App\Models\AuthorisedDriver;
use App\Models\RentalAgreement;
use App\Models\User;
use App\Models\UserVehicleToken;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class HirerController extends Controller
{
    public function handle(HirerDetailsRequest $request)
    {
        $isRegisterdUser = User::where('email', $request->email)->exists();
        $rented = now()->between($request->rent_start_date, $request->rent_end_date) ? 1 : 0;
        if ($isRegisterdUser) {
            $user = $this->updateUser($request->name, $request->driver_abn, $request->address, $request->licence_no, $request->dob, $request->email, $request->contact);
        } else {
            $user = $this->createUser($request->name, $request->driver_abn, $request->address, $request->licence_no, $request->dob, $request->email, $request->contact);
        }

        if ($request->authorised_driver_name) {
            $authorisedDriver = AuthorisedDriver::where('authorised_driver_license_no', $request->authorised_driver_license_no)->exists();
            if (! $authorisedDriver) {
                $this->createAuthorizedDriver($user, $request->authorised_driver_name, $request->authorised_driver_dob, $request->authorised_driver_address, $request->authorised_driver_license_no);
            }
        }

        $assignedVehicle = $this->assingVehicleToUser($user->id, $request->reg_no, $request->cost_per_week, $request->rent_start_date, $request->rent_end_date, $request->total_days, $request->total_price, $request->deposit_amount, $rented);
        $vehicle = $assignedVehicle->vehicle;
        $vehicle->odometer = $request->odometer;
        $vehicle->save();

        $signatureDirectory = public_path('signatures');
        if (! file_exists($signatureDirectory)) {
            mkdir($signatureDirectory, 0755, true);
        }

        $signatureName = $this->storeSignature($request->signature_method, $request->signature, $request->esign_data, $signatureDirectory);
        $this->createRentalAgreement($user, $signatureName, $assignedVehicle->vehicle->id);

        $agreementsDirectory = public_path('agreements');
        if (! file_exists($agreementsDirectory)) {
            mkdir($agreementsDirectory, 0755, true);
        }

        $agreementData = [
            'name' => $request->name,
            'abn' => $request->driver_abn,
            'address' => $request->address,
            'licence_no' => $request->licence_no,
            'dob' => $request->dob,
            'email' => $request->email,
            'contact' => $request->contact,
            'authorised_driver_name' => $request->authorised_driver_name,
            'authorised_driver_dob' => $request->authorised_driver_dob,
            'authorised_driver_address' => $request->authorised_driver_address,
            'authorised_driver_license_no' => $request->authorised_driver_license_no,
            'reg_no' => $request->reg_no,
            'cost_per_week' => $request->cost_per_week,
            'rent_start_date' => $request->rent_start_date,
            'rent_end_date' => $request->rent_end_date,
            'total_days' => $request->total_days,
            'total_price' => $request->total_price,
            'deposit_amount' => $request->deposit_amount,
            'signature' => 'signatures/'.$signatureName,
            'make' => $request->make,
            'model' => $request->model,
            'purchase_date' => $request->purchase_date,
            'odometer' => $request->odometer,
            'vin' => $request->vin,
            'company_name' => $request->company_name,
            'ip_address' => request()->ip(),
            'submission_date_time' => now()->format('Y-m-d H:i:s'),
        ];

        $agreementFIle = $this->generateAgreementPDF($agreementData, $agreementsDirectory);

        $assignedVehicle->agreement = $agreementFIle;
        $assignedVehicle->save();

        $this->sendEmails($user->email, $agreementFIle, $agreementData);

        $token = $request->input('token');
        UserVehicleToken::where('token', $token)->delete();

        return view('backend.vehicle-management.pages.success');
    }

    private function createUser($name, $driver_abn, $address, $licence_no, $dob, $email, $contact): User
    {
        return User::create([
            'name' => $name,
            'abn' => $driver_abn,
            'address' => $address,
            'licence_no' => $licence_no,
            'dob' => $dob,
            'email' => $email,
            'contact' => $contact,
            'password' => Str::random(8),
        ])->syncRoles('driver');
    }

    private function updateUser($name, $driver_abn, $address, $licence_no, $dob, $email, $contact): User
    {
        return User::where('email', $email)->update([
            'name' => $name,
            'abn' => $driver_abn,
            'address' => $address,
            'licence_no' => $licence_no,
            'dob' => $dob,
            'contact' => $contact,
        ]) ? User::where('email', $email)->first() : null;
    }

    private function createAuthorizedDriver($user, $authorisedDriverName, $authorisedDriverDOB, $authorisedDriverAddress, $authorisedDriverLicenseNo): void
    {
        $user->authoriseDrivers()->save(new AuthorisedDriver([
            'authorised_driver_name' => $authorisedDriverName,
            'authorised_driver_dob' => $authorisedDriverDOB,
            'authorised_driver_address' => $authorisedDriverAddress,
            'authorised_driver_license_no' => $authorisedDriverLicenseNo,
        ]));
    }

    private function assingVehicleToUser($userID, $reg_no, $cost_per_week, $rent_start_date, $rent_end_date, $total_days, $total_price, $deposit_amount, $rented): AssignVehicle
    {
        return AssignVehicle::create([
            'reg_no' => $reg_no,
            'user_id' => $userID,
            'cost_per_week' => $cost_per_week,
            'rent_start_date' => $rent_start_date,
            'rent_end_date' => $rent_end_date,
            'total_days' => $total_days,
            'total_price' => $total_price,
            'deposit_amount' => $deposit_amount,
            'outstanding_amount' => $total_price - $deposit_amount,
            'payment_method' => PaymentMethod::PAYADVANTAGE,
            'rented' => $rented,
        ]);
    }

    private function storeSignature($signatureMethod, $signatureFile, $EsignData, $signatureDirectory): string
    {
        if ($signatureMethod === 'upload' && $signatureFile) {
            $signaturePath = $signatureFile;
            $signatureName = time().'_'.$signaturePath->getClientOriginalName();
            $signaturePath->move($signatureDirectory, $signatureName);
        } elseif ($signatureMethod === 'esign' && $EsignData) {
            $signatureData = $EsignData;
            $signatureName = 'signature_'.time().'.png';
            $signatureFilePath = $signatureDirectory.'/'.$signatureName;
            $decodedImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $signatureData));
            file_put_contents($signatureFilePath, $decodedImage);
        }

        return $signatureName;
    }

    private function createRentalAgreement($user, $signatureName, $vehicleID): void
    {
        $user->rentalAgreements()->save(new RentalAgreement([
            'signature' => $signatureName,
            'vehicle_id' => $vehicleID,
        ]));
    }

    private function generateAgreementPDF($agreementData, $agreementsDirectory): string
    {
        $pdf = Pdf::loadView('emails.agreement', $agreementData);
        $agreementFIle = $agreementsDirectory.'/'.time().'.pdf';
        $pdf->save($agreementFIle);

        return $agreementFIle;
    }

    private function sendEmails($userEmail, $agreementFIle, $agreementData): void
    {
        $adminEmail = config('services.admin.email');
        Mail::to($userEmail)->send(new ShareAgreementMail($userEmail, $agreementFIle));
        Mail::to($adminEmail)->send(new AdminNotificationMail($agreementData, $agreementFIle));
    }
}
