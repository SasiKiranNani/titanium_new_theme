<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AssignVehicle;
use App\Models\VehicleDetail;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the count of users with the 'driver' role
        $driverCount = User::role('driver')->count();

        // Get the total count of vehicles
        $totalVehicles = VehicleDetail::count();

        // Get the count of rented vehicles
        $rentedVehicles = VehicleDetail::where('rented', 1)->count();

        // Get the count of available vehicles
        $availableVehicles = VehicleDetail::where('rented', 0)->count();

        // Calculate the total rent received
        $outstandingTotal = AssignVehicle::sum('outstanding_amount');
        $depositTotal = AssignVehicle::sum('deposit_amount');
        $rentReceived = AssignVehicle::sum('total_price');
        $totalEarnings = $outstandingTotal + $depositTotal;

        return view('dashboard', compact(
            'driverCount',
            'totalVehicles',
            'rentedVehicles',
            'availableVehicles',
            'rentReceived',
            'outstandingTotal',
            'depositTotal',
            'totalEarnings'
        ));
    }

    public function getRentAmount(Request $request)
    {
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');

        if ($startDate && $endDate) {
            // Only include vehicles that have rent periods overlapping with the selected range
            $rentReceived = AssignVehicle::whereBetween('rent_start_date', [$startDate, $endDate])
            ->orWhereBetween('rent_end_date', [$startDate, $endDate])
            ->sum('total_price');;
        } else {
            // If no date range is selected, return the total rent amount
            $rentReceived = AssignVehicle::sum('total_price');
        }

        return response()->json([
            'totalEarnings' => $rentReceived
        ]);
    }

}
