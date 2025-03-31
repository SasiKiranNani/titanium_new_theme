<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AssignVehicle;
use App\Models\OtherServiceBooking;
use App\Models\ServiceBooking;
use App\Models\User;
use App\Models\VehicleDetail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class DashboardController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:View Dashboard', only: ['index']),
        ];
    }

    public function index()
    {
        // Existing vehicle and driver counts
        $driverCount = User::role('driver')->count();
        $totalVehicles = VehicleDetail::count();
        $rentedVehicles = VehicleDetail::where('rented', 1)->count();
        $availableVehicles = VehicleDetail::where('rented', 0)->count();

        // Vehicle rental earnings
        $outstandingTotal = AssignVehicle::sum('outstanding_amount');
        $depositTotal = AssignVehicle::sum('deposit_amount');
        $rentReceived = AssignVehicle::sum('total_price');
        $totalEarnings = $outstandingTotal + $depositTotal;

        // Service booking earnings
        $serviceTotal = ServiceBooking::sum('total');
        $servicePaid = ServiceBooking::sum('total_paid');
        $serviceOutstanding = ServiceBooking::sum('balance_due');

        // Other service booking earnings
        $otherServiceTotal = OtherServiceBooking::sum('total');
        $otherServicePaid = OtherServiceBooking::sum('total_paid');
        $otherServiceOutstanding = OtherServiceBooking::sum('balance_due');

        return view('dashboard', compact(
            'driverCount',
            'totalVehicles',
            'rentedVehicles',
            'availableVehicles',
            'rentReceived',
            'outstandingTotal',
            'depositTotal',
            'totalEarnings',
            'serviceTotal',
            'servicePaid',
            'serviceOutstanding',
            'otherServiceTotal',
            'otherServicePaid',
            'otherServiceOutstanding'
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
                ->sum('total_price');
        } else {
            // If no date range is selected, return the total rent amount
            $rentReceived = AssignVehicle::sum('total_price');
        }

        return response()->json([
            'totalEarnings' => $rentReceived,
        ]);
    }

    public function getServiceStats(Request $request)
    {
        $query = ServiceBooking::query();

        if ($request->start_date && $request->end_date) {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        return response()->json([
            'total' => (float) $query->sum('total'),
            'paid' => (float) $query->sum('total_paid'),
            'outstanding' => (float) $query->sum('balance_due'),
        ]);
    }

    public function getOtherServiceStats(Request $request)
    {
        $query = OtherServiceBooking::query();

        if ($request->start_date && $request->end_date) {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        return response()->json([
            'total' => (float) $query->sum('total'),
            'paid' => (float) $query->sum('total_paid'),
            'outstanding' => (float) $query->sum('balance_due'),
        ]);
    }
}
