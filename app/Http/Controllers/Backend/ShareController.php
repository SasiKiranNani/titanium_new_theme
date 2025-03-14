<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\ShareVehicleDetailsMail;
use App\Models\User;
use App\Models\VehicleDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\AdminNotificationMail;
use App\Mail\UserCredentialsMail;
use App\Models\AssignVehicle;
use App\Models\AuthorisedDriver;
use App\Models\RentalAgreement;
use App\Models\UserVehicleToken;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ShareController extends Controller
{
    public function shareVehicle(Request $request)
    {
        // Validate the request
        $request->validate([
            'cost_per_week'   => 'required',
            'vehicle_id'      => 'required|exists:vehicle_details,id',
            'rent_start_date' => 'required|date',
            'rent_end_date'   => 'required|date|after_or_equal:rent_start_date',
            'total_days'      => 'required',
            'total_price'     => 'required',
            'email'           => 'required|email',
            'company_name'    => 'required',
            'odometer'        => 'required',
            'deposit_amount'  => 'required',
        ]);
        // dd($request->all());

        // Retrieve the vehicle details
        $vehicle = VehicleDetail::findOrFail($request->vehicle_id);
        Log::info('Vehicle details retrieved: ', $vehicle->toArray());

        // Generate a unique token and store it in the database
        $uniqueToken = bin2hex(random_bytes(16));

        // Set expiration time (15 minutes from now)
        $expiresAt = Carbon::now()->addMinutes(15);

        UserVehicleToken::create([
            'user_id'         => $request->user_id,
            'vehicle_id'      => $vehicle->id,
            'token'           => $uniqueToken,
            'cost_per_week'   => $request->cost_per_week,
            'rent_start_date' => $request->rent_start_date,
            'rent_end_date'   => $request->rent_end_date,
            'total_days'      => $request->total_days,
            'total_price'     => $request->total_price,
            'odometer'        => $request->odometer,
            'deposit_amount'  => $request->deposit_amount,
        ]);

        $data = [
            'cost_per_week'   => $request->cost_per_week,
            'rent_start_date' => $request->rent_start_date,
            'rent_end_date'   => $request->rent_end_date,
            'vehicle'         => $vehicle->id,
            'total_days'      => $request->total_days,
            'total_price'     => $request->total_price,
            'odometer'        => $request->odometer,
            'token'           => $uniqueToken,
            'deposit_amount'  => $request->deposit_amount,
        ];

        // Generate the URL
        $url         = route('share.vehicle.details', ['id' => $vehicle->id, 'token' => $uniqueToken]);
        $data['url'] = $url;

        // Send the email
        try {
            Mail::to($request->email)->send(new ShareVehicleDetailsMail($data));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to send email. Please try again later.');
        }

        // Mark the vehicle as shared
        $request->session()->put('vehicle_shared_' . $request->vehicle_id, true);

        return redirect()->back()->with('success', 'Vehicle details for ' . $vehicle->reg_no . ' shared successfully!');
    }

    public function showVehicleDetails(Request $request)
    {
        // Validate token
        $tokenData = UserVehicleToken::where('token', $request->token)->first();

        if (!$tokenData) {
            return redirect()->route('link.expired')->with('error', 'The agreement link is invalid.');
        }

        // Fetch required data
        $vehicle = VehicleDetail::findOrFail($tokenData->vehicle_id);

        // Pass the token to the view
        return view('backend.vehicle-management.vehicle-agreement.vehicle-details', compact(
            'vehicle', 'tokenData'
        ));
    }

    public function sendUserVehicleEmail(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'cost_per_week'   => 'required',
            'vehicle_id'      => 'required|exists:vehicle_details,id',
            'user_id'         => 'required|exists:users,id',
            'rent_start_date' => 'required|date',
            'rent_end_date'   => 'required|date|after_or_equal:rent_start_date',
            'email'           => 'required|email',
            'total_days'      => 'required',
            'total_price'     => 'required',
            'company_name'    => 'required',
            'odometer'        => 'required',
            'deposit_amount'  => 'required',
        ]);

        // dd($request->all());

        // Retrieve the vehicle details
        $vehicle = VehicleDetail::findOrFail($request->vehicle_id);
        Log::info('Vehicle details retrieved: ', $vehicle->toArray());

        // Generate a unique token and store it in the database
        $uniqueToken = bin2hex(random_bytes(16));

        // Set expiration time (15 minutes from now)
        $expiresAt = Carbon::now()->addMinutes(15);

        UserVehicleToken::create([
            'user_id'    => $request->user_id,
            'vehicle_id' => $vehicle->id,
            'token'      => $uniqueToken,
            'cost_per_week'   => $request->cost_per_week,
            'rent_start_date' => $request->rent_start_date,
            'rent_end_date'   => $request->rent_end_date,
            'total_days'      => $request->total_days,
            'total_price'     => $request->total_price,
            'odometer'        => $request->odometer,
            'deposit_amount'  => $request->deposit_amount,
        ]);

        $url = route('send.user.vehicle.email', [
            'user_id'    => $request->user_id,
            'vehicle_id' => $vehicle->id,
            'token'      => $uniqueToken,
        ]);
        Log::info('Agreement Link: ' . $url);

        // Prepare the data for the email
        $data = [
            'cost_per_week'   => $request->cost_per_week,
            'vehicle'         => $vehicle,
            'user_id'         => $request->user_id,
            'agreement_link'  => $url,
            'rent_start_date' => $request->rent_start_date,
            'rent_end_date'   => $request->rent_end_date,
            'total_days'      => $request->total_days,
            'total_price'     => $request->total_price,
            'url'             => $url,
            'odometer'        => $request->odometer,
            'deposit_amount'  => $request->deposit_amount,
        ];
        // Send the email
        try {
            Mail::to($request->email)->send(new ShareVehicleDetailsMail($data));
            Log::info('Email sent to: ' . $request->email);
        } catch (\Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to send email. Please try again later.');
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Vehicle and driver details sent successfully!');
    }

    public function driversAgreement(Request $request)
    {
        // Validate token
        $tokenData = UserVehicleToken::where('token', $request->token)->first();

        if (!$tokenData) {
            return redirect()->route('link.expired')->with('error', 'The agreement link is invalid.');
        }

        // Fetch required data
        $user = User::findOrFail($tokenData->user_id);
        $vehicle = VehicleDetail::findOrFail($tokenData->vehicle_id);

        return view('backend.vehicle-management.vehicle-agreement.agreement', compact(
            'user',
            'vehicle',
            'tokenData'
        ));
    }
}
