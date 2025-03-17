<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AssignVehicle;
use App\Models\User;
use App\Models\VehicleDetail;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Models\Category;

class AssignVehicleController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $categoryId = $request->input('category_id');

        // Update rented status dynamically
        AssignVehicle::all()->each->updateRentedStatus();

        $query = AssignVehicle::select([
            'id',
            'user_id',
            'reg_no',
            'rent_start_date',
            'rent_end_date',
            'total_price',
            'deposit_amount',
            'outstanding_amount',
            'payment_method',
            'cost_per_week',
            'total_days',
        ])
            ->with(['user:id,name', 'vehicle:id,rented'])
            ->where('rented', 0)
            ->where('rent_start_date', '>', now())
            ->latest();

            if ($categoryId) {
                $query->whereHas('vehicle', function ($query) use ($categoryId) {
                    $query->where('category_id', $categoryId);
                });
            }

        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })
                    ->orWhere('reg_no', 'like', '%' . $search . '%');
            });
        }

        if ($startDate && $endDate) {
            $query->where(function ($query) use ($startDate, $endDate) {
                $query->where('rent_start_date', '<=', $endDate)
                    ->where('rent_end_date', '>=', $startDate);
            });
        }

        $upcomingVehicles = $query->paginate($perPage === 'all' ? $query->count() : (int) $perPage);
        $users = User::all();
        $categories = Category::all(); // Fetch all categories

        return view('backend.vehicle-management.assign-vehicles.list', compact('upcomingVehicles', 'perPage', 'users', 'search', 'startDate', 'endDate', 'categoryId', 'categories'));
    }


    public function onGoing(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $categoryId = $request->input('category_id');

        // Update rented status dynamically
        AssignVehicle::all()->each->updateRentedStatus();

        $query = AssignVehicle::select([
            'id',
            'user_id',
            'reg_no',
            'rent_start_date',
            'rent_end_date',
            'total_price',
            'deposit_amount',
            'outstanding_amount',
            'payment_method',
            'cost_per_week',
            'total_days',
        ])
            ->with(['user:id,name', 'vehicle:id,rented'])
            ->where('rented', 1)
            ->where('rent_start_date', '<=', now())
            ->where('rent_end_date', '>=', now())
            ->latest();

        // Filter by category if selected
        if ($categoryId) {
            $query->whereHas('vehicle', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });
        }

        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })
                    ->orWhere('reg_no', 'like', '%' . $search . '%');
            });
        }

        if ($startDate && $endDate) {
            $query->where(function ($query) use ($startDate, $endDate) {
                $query->where('rent_start_date', '<=', $endDate)
                    ->where('rent_end_date', '>=', $startDate);
            });
        }

        $ongoingVehicles = $query->paginate($perPage === 'all' ? 100 : (int) $perPage);
        $users = User::select('id', 'name')->get();
        $categories = Category::all(); // Fetch all categories

        return view('backend.vehicle-management.assign-vehicles.on-going', compact('ongoingVehicles', 'perPage', 'users', 'startDate', 'endDate', 'search', 'categoryId', 'categories'));
    }

    public function completed(Request $request)
    {
        // Pagination and search parameters
        $perPage = $request->input('per_page', 10); // Default to 10 items per page
        $search = $request->input('search'); // Search term
        $startDate = $request->input('start_date'); // Start date filter
        $endDate = $request->input('end_date'); // End date filter
        $categoryId = $request->input('category_id');

        // Query for completed rentals
        $query = AssignVehicle::where('rent_end_date', '<', now()) // Rent has ended
            ->latest();

            if ($categoryId) {
                $query->whereHas('vehicle', function ($query) use ($categoryId) {
                    $query->where('category_id', $categoryId);
                });
            }

        // Apply search filters for username and registration number
        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%'); // Filter by username
                })
                    ->orWhere('reg_no', 'like', '%' . $search . '%'); // Filter by registration number
            });
        }

        // Apply date range filter if provided
        if ($startDate && $endDate) {
            $query->where(function ($query) use ($startDate, $endDate) {
                $query->where('rent_start_date', '<=', $endDate)
                    ->where('rent_end_date', '>=', $startDate);
            });
        }

        // Fetch completed vehicles
        $pastVehicles = $query->paginate($perPage === 'all' ? AssignVehicle::count() : (int) $perPage);

        // Fetch all users for the filter dropdown
        $users = User::all();
        $categories = Category::all(); // Fetch all categories

        return view('backend.vehicle-management.assign-vehicles.completed', compact('pastVehicles', 'perPage', 'users', 'search', 'startDate', 'endDate', 'categoryId', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'reg_no' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'cost_per_week' => 'required|numeric',
            'rent_start_date' => 'required|date',
            'rent_end_date' => 'required|date|after_or_equal:rent_start_date',
            'total_days' => 'required|integer',
            'total_price' => 'required|numeric',
            'payment_method' => 'required|string|max:255',
        ]);

        $assignVehicle = AssignVehicle::findOrFail($id);
        $assignVehicle->update($request->all());

        return redirect()->back()->with('success', 'Vehicle assignment updated successfully.');
    }
    
    public function getagreement1($id)
    {
        $assignVehicle = AssignVehicle::find($id);

        // Extract the relative path from the public directory
        $pdfPath = str_replace(public_path(), '', $assignVehicle->agreement);
        $pdfPath = trim($pdfPath, '/\\'); // Remove leading/trailing slashes

        return view('backend.vehicle-management.assign-vehicles.agreement-view', compact('pdfPath'));
    }

    public function destroy($id)
    {
        $assignVehicle = AssignVehicle::findOrFail($id);
        $assignVehicle->delete();

        return redirect()->back()->with('success', 'Vehicle assignment deleted successfully.');
    }
}
