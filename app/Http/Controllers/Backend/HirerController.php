<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\AdminNotificationMail;
use App\Mail\UserCredentialsMail;
use App\Models\AssignVehicle;
use App\Models\AuthorisedDriver;
use App\Models\RentalAgreement;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Models\VehicleDetail;
use App\Models\UserVehicleToken;

class HirerController extends Controller
{
    public function storeHirerDetails(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            // for users table
            'name'                         => 'required|string|max:255',
            'driver_abn'                   => 'nullable|string|max:255',
            'abn'                          => 'nullable|string|max:255',
            'address'                      => 'nullable|string|max:255',
            'licence_no'                   => 'nullable|string|max:255',
            'dob'                          => 'nullable|date',
            'email'                        => 'required|email',
            'contact'                      => 'nullable|string|max:255',
            // for authorised driver table
            'authorised_driver_name'       => 'nullable|string|max:255',
            'authorised_driver_dob'        => 'nullable|date',
            'authorised_driver_address'    => 'nullable|string|max:255',
            'authorised_driver_license_no' => 'nullable|string|max:255',
            // for assign vehicle table
            'reg_no'                       => 'required',
            'cost_per_week'                => 'nullable',
            'rent_start_date'              => 'nullable|date',
            'rent_end_date'                => 'nullable|date|after_or_equal:rent_start_date',
            'total_days'                   => 'nullable',
            'total_price'                  => 'nullable',
            'deposit_amount'               => 'nullable',
            // for RentalAgreement
            'vehicle_id'                   => 'required',
            // for pdf
            'make'                         => 'nullable',
            'model'                        => 'nullable',
            'purchase_date'                => 'nullable',
            'odometer'                     => 'nullable',
            'vin'                          => 'nullable',
            'company_name'                 => 'nullable',
            'signature_method'             => 'required|string|in:upload,esign',
            'signature'                    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'esign_data'                   => 'nullable|string',
        ]);

        // Generate a random password for the user
        $password      = Str::random(10);
        $isNewUser     = false; // Flag to check if the user is newly created
        $agreementData = [];    // Initialize the variable

        // Custom validation for age
        $this->validateAge($request->dob, 'dob');
        $this->validateAge($request->authorised_driver_dob, 'authorised_driver_dob');

        // Use a transaction to ensure all data is saved or none
        DB::transaction(function () use ($request, $password, &$isNewUser, &$agreementData) {
            // Check if the user already exists
            $user = User::where('email', $request->email)->first();

            if (! $user) {
                // Create the hirer if not exists
                $user = User::create([
                    'name'       => $request->name,
                    'abn'        => $request->driver_abn,
                    'address'    => $request->address,
                    'licence_no' => $request->licence_no,
                    'dob'        => $request->dob,
                    'email'      => $request->email,
                    'contact'    => $request->contact,
                    'password'   => bcrypt($password), // Hash the password
                ]);

                $user->syncRoles('driver'); // Assign role to the user
                $isNewUser = true;          // Set the flag to true since the user is newly created
            } else {
                // Update the user details if the user already exists
                $user->update([
                    'name'       => $request->name,
                    'abn'        => $request->driver_abn,
                    'address'    => $request->address,
                    'licence_no' => $request->licence_no,
                    'dob'        => $request->dob,
                    'contact'    => $request->contact,
                ]);
            }

            // Check if the authorized driver license number already exists
            if ($request->authorised_driver_name) {
                $authorisedDriver = AuthorisedDriver::where('authorised_driver_license_no', $request->authorised_driver_license_no)->first();

                if ($authorisedDriver) {
                    // Skip creating if the authorized driver already exists
                    \Log::info('Authorized driver with license number ' . $request->authorised_driver_license_no . ' already exists. Skipping creation.');
                } else {
                    // Create Authorized Driver if not exists
                    AuthorisedDriver::create([
                        'authorised_driver_name'       => $request->authorised_driver_name,
                        'authorised_driver_dob'        => $request->authorised_driver_dob,
                        'authorised_driver_address'    => $request->authorised_driver_address,
                        'authorised_driver_license_no' => $request->authorised_driver_license_no,
                        'user_id'                      => $user->id,
                    ]);
                }
            }

            // Check if AssignVehicle already exists for the user with the same rent_start_date and rent_end_date
            $existingAssignVehicle = AssignVehicle::where('user_id', $user->id)
                ->where('rent_start_date', $request->rent_start_date)
                ->where('rent_end_date', $request->rent_end_date)
                ->where('reg_no', $request->reg_no)
                ->first();

            if ($existingAssignVehicle) {
                // Delete the existing AssignVehicle record
                $existingAssignVehicle->delete();
                \Log::info('AssignVehicle for user ' . $user->id . ' with the same rent dates deleted.');
            }

            // Determine the rented status based on the current date
            $today = now();
            $rented = ($today->between($request->rent_start_date, $request->rent_end_date)) ? 1 : 0;

            // Create Assign Vehicle
            AssignVehicle::create([
                'reg_no'          => $request->reg_no,
                'user_id'         => $user->id,
                'cost_per_week'   => $request->cost_per_week,
                'rent_start_date' => $request->rent_start_date,
                'rent_end_date'   => $request->rent_end_date,
                'total_days'      => $request->total_days,
                'total_price'     => $request->total_price,
                'deposit_amount'  => $request->deposit_amount,
                'outstanding_amount' => $request->total_price - $request->deposit_amount,
                'payment_method'  => 'COD',
                'rented'          => $rented,
            ]);

            // Handle Signature Upload
            $signatureName = null;

            // Check the signature method
            if ($request->signature_method === 'upload' && $request->hasFile('signature')) {
                // If a signature image is uploaded
                $signaturePath = $request->file('signature');
                $signatureName = time() . '_' . $signaturePath->getClientOriginalName();
                $signatureDirectory = public_path('signatures');
                if (!file_exists($signatureDirectory)) {
                    mkdir($signatureDirectory, 0755, true); // Create the directory if it doesn't exist
                }
                $signaturePath->move($signatureDirectory, $signatureName);
            } elseif ($request->signature_method === 'esign' && $request->filled('esign_data')) {
                // If signature is coming from the signature pad
                $signatureData     = $request->input('esign_data');  // Base64 content
                $signatureName     = 'signature_' . time() . '.png'; // Unique name for the image
                $signatureDirectory = public_path('signatures');
                if (!file_exists($signatureDirectory)) {
                    mkdir($signatureDirectory, 0755, true); // Create the directory if it doesn't exist
                }
                $signatureFilePath = $signatureDirectory . '/' . $signatureName;

                // Decode base64 and save as image
                $decodedImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $signatureData));
                file_put_contents($signatureFilePath, $decodedImage);
            }

            \Log::info('Request Data:', $request->all());

            // Create RentalAgreement
            RentalAgreement::create([
                'signature'  => $signatureName, // Store the filename in the database
                'user_id'    => $user->id,
                'vehicle_id' => $request->vehicle_id, // Use the request variable
            ]);

            $ipAddress       = $request->ip();               // Get the user's IP address
            $currentDateTime = now()->format('Y-m-d H:i:s'); // Get the current date and time

            // Prepare data for the agreement
            $agreementData = [
                'name'                         => $request->name,
                'abn'                          => $request->driver_abn,
                'address'                      => $request->address,
                'licence_no'                   => $request->licence_no,
                'dob'                          => $request->dob,
                'email'                        => $request->email,
                'contact'                      => $request->contact,
                'authorised_driver_name'       => $request->authorised_driver_name,
                'authorised_driver_dob'        => $request->authorised_driver_dob,
                'authorised_driver_address'    => $request->authorised_driver_address,
                'authorised_driver_license_no' => $request->authorised_driver_license_no,
                'reg_no'                       => $request->reg_no,
                'cost_per_week'                => $request->cost_per_week,
                'rent_start_date'              => $request->rent_start_date,
                'rent_end_date'                => $request->rent_end_date,
                'total_days'                   => $request->total_days,
                'total_price'                  => $request->total_price,
                'deposit_amount'               => $request->deposit_amount,
                'signature'                    => 'signatures/' . $signatureName, // Use the correct path
                'make'                         => $request->make,
                'model'                        => $request->model,
                'purchase_date'                => $request->purchase_date,
                'odometer'                     => $request->odometer,
                'vin'                          => $request->vin,
                'company_name'                 => $request->company_name,
                'ip_address'                   => $ipAddress, // Add IP address
                'submission_date_time'         => $currentDateTime,
            ];

            // Update the odometer for the vehicle with the given reg_no
            $vehicleDetails = VehicleDetail::where('reg_no', $request->reg_no)->first();
            if ($vehicleDetails) {
                $vehicleDetails->odometer = $request->odometer;
                $vehicleDetails->save();
            }

            // Generate PDF
            // Create the agreements directory if it doesn't exist
            $agreementsDirectory = public_path('agreements');
            if (!file_exists($agreementsDirectory)) {
                mkdir($agreementsDirectory, 0755, true); // Create the directory if it doesn't exist
            }

            $pdf         = PDF::loadView('emails.agreement', $agreementData);
            $pdfFilePath = $agreementsDirectory . '/' . $request->reg_no . '_' . $request->rent_start_date . '_to_' . $request->rent_end_date . '_agreement.pdf';
            $pdf->save($pdfFilePath);

            // Store the PDF file path in AssignVehicle
            $assignVehicle = AssignVehicle::where('user_id', $user->id)
                ->where('reg_no', $request->reg_no)
                ->where('rent_start_date', $request->rent_start_date)
                ->where('rent_end_date', $request->rent_end_date)
                ->first();

            if ($assignVehicle) {
                $assignVehicle->agreement = $pdfFilePath;
                $assignVehicle->save();
            }

            // Send email with credentials and agreement only if the user is newly created
            if ($isNewUser) {
                Mail::to($user->email)->send(new UserCredentialsMail($user->email, $password, $pdfFilePath));
            } else {
                // Send email with just the PDF if the user already exists
                Mail::to($user->email)->send(new UserCredentialsMail($user->email, null, $pdfFilePath));
            }

            // Send the PDF and user details to the admin email
            $adminEmail = env('MAIL_USERNAME');
            if ($adminEmail) {
                Mail::to($adminEmail)->send(new AdminNotificationMail($agreementData, $pdfFilePath));
            }

          // Invalidate the token after the process is complete
        $token = $request->input('token'); // Get the token from the request
        if ($token) {
            UserVehicleToken::where('token', $token)->delete(); // Delete the token from the database
        }
        });

        return view('backend.vehicle-management.pages.success', compact('agreementData'));
    }

    protected function validateAge($dob, $fieldName)
    {
        if ($dob) {
            $age = \Carbon\Carbon::parse($dob)->age;
            if ($age < 18) {
                throw ValidationException::withMessages([
                    $fieldName => 'The drivers age must be at least 18 years old.',
                ]);
            }
        }
    }
}
