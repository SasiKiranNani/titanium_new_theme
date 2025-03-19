<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignVehicle;
use App\Models\Driver;
use App\Models\DriverFile;
use App\Models\User;
use App\Models\VehicleDetail;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class DriverController extends Controller
{

    public function index(Request $request)
    {
        $roles   = Role::get();
        $perPage = $request->input('per_page', 10); // Default to 10 items per page if not provided
        $search  = $request->input('search'); // Capture the search input
        $vehicles = VehicleDetail::get();

        // Fetch users with the role of 'driver' and apply search functionality
        $users = $perPage === 'all'
            ? User::with('roles')->whereHas('roles', function ($query) {
                $query->where('name', 'driver');
            })
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%")
                        ->orWhere('email', 'LIKE', "%{$search}%")
                        ->orWhere('contact', 'LIKE', "%{$search}%")
                        ->orWhere('licence_no', 'LIKE', "%{$search}%");
                });
            })->get() // Fetch all users if "all" is selected
            : User::with('roles')->whereHas('roles', function ($query) {
                $query->where('name', 'driver');
            })
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%")
                        ->orWhere('email', 'LIKE', "%{$search}%")
                        ->orWhere('contact', 'LIKE', "%{$search}%")
                        ->orWhere('licence_no', 'LIKE', "%{$search}%");
                });
            })->paginate((int) $perPage); // Paginate users if needed
        foreach ($users as $user) {
            $user->files = DriverFile::where('user_id', $user->id)->get();
        }

        return view('backend.vehicle-management.driver-detail.list', compact('perPage', 'users', 'roles', 'vehicles', 'search'));
    }

    public function edit($id)
    {
        $roles    = Role::get();
        $vehicles = VehicleDetail::get();
        $user     = User::with('roles')->whereHas('roles', function ($query) {
            $query->where('name', 'driver');
        })->findOrFail($id);

        $user->files = DriverFile::where('user_id', $user->id)->get();

        return view('backend.vehicle-management.driver-detail.edit', compact('user', 'roles', 'vehicles'));
    }

    public function create()
    {
        $roles = Role::get();
        $vehicles = VehicleDetail::get();
        return view('backend.vehicle-management.driver-detail.create', compact('roles', 'vehicles'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'             => 'required|min:3',
            'email'            => 'required|email|unique:users,email',
            'password'         => 'required|min:8',
            'confirm_password' => 'required|same:password',
            // Add driver fields validation if needed
            'dob'              => 'nullable|date',
            'licence_no'       => 'nullable|string|max:50',
            'contact'          => 'nullable|string|max:15',
            'address'          => 'nullable|string|max:255',
            'suburb'           => 'nullable|string|max:100',
            'state'            => 'nullable|string|max:50',
            'postalcode'       => 'nullable|string|max:10',
            'notes'            => 'nullable',
            'files.*'          => 'nullable|file|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $user             = new User();
        $user->name       = $request->name;
        $user->abn    = $request->abn;
        $user->email      = $request->email;
        $user->dob        = $request->dob;
        $user->licence_no = $request->licence_no;
        $user->contact    = $request->contact;
        $user->address    = $request->address;
        $user->suburb     = $request->suburb;
        $user->state      = $request->state;
        $user->postalcode = $request->postalcode;
        $user->password   = Hash::make($request->password);
        $user->notes      = $request->notes;
        $user->save();

        // Handle Multiple File Uploads
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = $request->name . '_' . $file->getClientOriginalName();  // Create a unique name
                $file->move(public_path('drivers/files'), $fileName);     // Move the file to the desired location

                // Save the file details to the VehicleFile model
                DriverFile::create([
                    'user_id' => $user->id,
                    'file_path'         => 'drivers/files/' . $fileName,
                    'file_name'        => $fileName,
                ]);
            }
        }
        // Sync roles
        $user->syncRoles($request->role);

        return redirect()->route('drivers.list')->with('success', 'User created successfully.');
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name'       => 'required|min:3',
            'email'      => 'required|email|unique:users,email,' . $id,
            'dob'        => 'nullable|date',
            'licence_no' => 'nullable|string|max:50',
            'contact'    => 'nullable|string|max:15',
            'address'    => 'nullable|string|max:255',
            'suburb'     => 'nullable|string|max:100',
            'state'      => 'nullable|string|max:50',
            'postalcode' => 'nullable|string|max:10',
            'abn'        => 'nullable|string|max:50',
            'notes'      => 'nullable',
            'files.*'    => 'nullable|file|max:2048|mimes:jpg,jpeg,webp,png,pdf,doc,docx',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $user->name       = $request->name;
        $user->abn    = $request->abn;
        $user->email      = $request->email;
        $user->dob        = $request->dob;
        $user->licence_no = $request->licence_no;
        $user->contact    = $request->contact;
        $user->address    = $request->address;
        $user->suburb     = $request->suburb;
        $user->state      = $request->state;
        $user->postalcode = $request->postalcode;
        $user->notes      = $request->notes;
        $user->save();

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = $request->name . '_' . $file->getClientOriginalName();  // Create a unique name
                $file->move(public_path('drivers/files'), $fileName);     // Move the file to the desired location

                // Save the file details to the VehicleFile model
                DriverFile::create([
                    'user_id' => $user->id,
                    'file_path'         => 'drivers/files/' . $fileName,
                    'file_name'        => $fileName,
                ]);
            }
        }
        // Sync roles
        $user->syncRoles($request->role);

        return redirect()->route('drivers.list')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete(); // Delete the user
        return redirect()->back()->with('success', 'User deleted successfully.');
    }

    public function driverFileDestroy($id)
    {
        $file = DriverFile::findOrFail($id);

        // Delete the file from storage (optional)
        if (file_exists(public_path($file->file_path))) {
            unlink(public_path($file->file_path));
        }

        // Delete the file record from the database
        $file->delete();

        return response()->json(['message' => 'File deleted successfully.']);
    }

    // public function getDriverDetail($id)
    // {
    //     $user     = User::findOrFail($id);
    //     $users    = User::all();                                        // Fetch all users
    //     $vehicles = VehicleDetail::where('rented', '0')->get(); // Fetch only available vehicles

    //     // Fetch payment history for the specific user
    //     $payments = AssignVehicle::where('user_id', $id)
    //         ->with('vehicle') // Assuming you have a relationship defined in AssignVehicle model
    //         ->get();

    //     // Fetch vehicle allotments for the specific user
    //     $allotments = AssignVehicle::where('user_id', $id)
    //         ->with('vehicle') // Assuming you have a relationship defined in AssignVehicle model
    //         ->get();

    //     return view('backend.driver-detail.details', compact('user', 'users', 'vehicles', 'payments', 'allotments'));
    // }

    public function details()
    {
        return view('backend.vehicle-management.driver-detail.details');
    }

    public function getDriverDetail($id)
    {
        $user        = User::findOrFail($id);
        $users       = User::all();
        $vehiclesall = VehicleDetail::all();

        foreach ($vehiclesall as $vehiclesregono) {
            $vehicleId = $vehiclesregono->reg_no; // Get the current vehicle's reg_no

            // Fetch payments for the current reg_no
            $payments1 = AssignVehicle::where('reg_no', $vehicleId)->get(); // Use where for a single reg_no

            // Initialize rented status
            $isRented = false;

            foreach ($payments1 as $payment) {
                $dateStart = $payment->rent_start_date;
                $dateEnd   = $payment->rent_end_date;

                // Check if the current date is within the rental period
                if (now()->between($dateStart, $dateEnd)) {
                    $isRented = true; // Set rented status to true if within the rental period
                    break;            // No need to check further payments for this vehicle
                }
            }

            // Update the rented status based on the checks
            VehicleDetail::where('reg_no', $vehicleId)->update(['rented' => $isRented ? '1' : '0']);
        }

        $vehicles = VehicleDetail::where('rented', '0')->get();

        // Fetch payment history for the specific user
        $payments = AssignVehicle::where('user_id', $id)
            ->with('vehicle') // Assuming you have a relationship defined in AssignVehicle model
            ->get();

        // Fetch vehicle allotments for the specific user
        $allotments = AssignVehicle::where('user_id', $id)
            ->with('vehicle') // Assuming you have a relationship defined in AssignVehicle model
            ->get();

        return view('backend.vehicle-management.driver-detail.details', compact('user', 'users', 'vehicles', 'payments', 'allotments'));
    }
}
