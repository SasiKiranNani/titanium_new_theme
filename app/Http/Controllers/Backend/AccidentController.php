<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VehicleAccident;
use App\Models\VehicleAccidentFile;
use App\Models\VehicleDetail;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AccidentController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('permission:View Accident', only: ['index']),
            new Middleware('permission:Create Accident', only: ['create']),
            new Middleware('permission:Edit Accident', only: ['edit']),
            new Middleware('permission:Delete Accident', only: ['destroy']),
        ];
    }


    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Default to 10 if not provided
        $query = VehicleAccident::with(['vehicle', 'files']);

        // Apply search filter if search term is provided
        if ($request->filled('search')) {
            $query->whereHas('vehicle', function ($q) use ($request) {
                $q->where('reg_no', 'LIKE', "%{$request->search}%");
            });
        }

        // Apply date range filter if both start_date and end_date are provided
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('accident_date', [$request->start_date, $request->end_date]);
        }

        // Fetch all records if 'all' is selected, otherwise paginate
        if ($perPage === 'all') {
            $accidents = $query->get(); // Fetch all records as a collection
        } else {
            $perPage = (int) $perPage; // Ensure $perPage is an integer
            $accidents = $query->paginate($perPage); // Paginate with the provided per_page value
        }

        $vehicles = VehicleDetail::all();

        return view('backend.service-management.accidents.index', compact('accidents', 'vehicles', 'perPage'));
    }


    public function create()
    {
        $vehicles = VehicleDetail::all();
        return view('backend.service-management.accidents.create', compact('vehicles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required',
            'accident_date' => 'required',
            'insurance_ref' => 'nullable',
            'description' => 'nullable',
            'file.*' => 'nullable|file|mimes:jpg,jpeg,png,webp,pdf,doc,docx|max:2048', // Allow images and documents
        ]);

        // Save the accident details
        $accident = new VehicleAccident();
        $accident->vehicle_id = $request->vehicle_id;
        $accident->accident_date = $request->accident_date;
        $accident->insurance_ref = $request->insurance_ref;
        $accident->description = $request->description;
        $accident->save();

        // Get the vehicle registration number from the vehicle_id
        $vehicle = VehicleDetail::findOrFail($request->vehicle_id);
        $reg_no = $vehicle->reg_no;

        // Handle file uploads
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                // Generate a unique filename
                // Get the last inserted file for the vehicle accident
                $lastFile = VehicleAccidentFile::where('vehicle_accident_id', $accident->id)->orderBy('id', 'desc')->first();
                $lastFileNumber = $lastFile ? intval(explode('_', $lastFile->file)[2]) : 0;
                $fileNumber = $lastFileNumber + 1;

                $fileName = $reg_no . '_' . date('Ymd') . '_' . $fileNumber . '.' . $file->getClientOriginalExtension();
                $filePath = 'accidents/files/' . $fileName; // Path to store in the database

                // Move the file to the public/accidents/files directory
                $file->move(public_path('accidents/files'), $fileName);

                // Save the file details in the database
                VehicleAccidentFile::create([
                    'vehicle_accident_id' => $accident->id,
                    'file' => $filePath,
                ]);
            }
        }

        return redirect()->route('services.accident')->with('success', 'Accident added successfully');
    }

    public function edit($id)
    {
        $accident = VehicleAccident::findOrFail($id);
        $vehicles = VehicleDetail::all();
        return view('backend.service-management.accidents.edit', compact('accident', 'vehicles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'vehicle_id' => 'required',
            'accident_date' => 'required',
            'insurance_ref' => 'nullable',
            'description' => 'nullable',
            'file.*' => 'nullable|file|mimes:jpg,jpeg,png,webp,pdf,doc,docx|max:2048', // Allow images and documents
        ]);

        $accident = VehicleAccident::findOrFail($id);
        $accident->vehicle_id = $request->vehicle_id;
        $accident->accident_date = $request->accident_date;
        $accident->insurance_ref = $request->insurance_ref;
        $accident->description = $request->description;
        $accident->save();

        // Get the vehicle registration number from the vehicle_id
        $vehicle = VehicleDetail::findOrFail($request->vehicle_id);
        $reg_no = $vehicle->reg_no;

        // Handle file uploads
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                // Generate a unique filename
                // Get the last inserted file for the vehicle accident
                $lastFile = VehicleAccidentFile::where('vehicle_accident_id', $accident->id)->orderBy('id', 'desc')->first();
                $lastFileNumber = $lastFile ? intval(explode('_', $lastFile->file)[2]) : 0;
                $fileNumber = $lastFileNumber + 1;

                $fileName = $reg_no . '_' . date('Ymd') . '_' . $fileNumber .  '.' . $file->getClientOriginalExtension();
                $filePath = 'accidents/files/' . $fileName; // Path to store in the database

                // Move the file to the public/accidents/files directory
                $file->move(public_path('accidents/files'), $fileName);

                // Save the file details in the database
                VehicleAccidentFile::create([
                    'vehicle_accident_id' => $accident->id,
                    'file' => $filePath,
                ]);
            }
        }

        return redirect()->route('services.accident')->with('success', 'Accident updated successfully');
    }

    public function destroy($id)
    {
        // Find the accident
        $accident = VehicleAccident::findOrFail($id);

        // Delete associated files
        foreach ($accident->files as $file) {
            // Delete the file from the public directory
            if (file_exists(public_path($file->file))) {
                unlink(public_path($file->file));
            }
            // Delete the file record from the database
            $file->delete();
        }

        // Delete the accident
        $accident->delete();

        return redirect()->back()->with('success', 'Accident deleted successfully');
    }

    public function deleteFile($id)
    {
        $file = VehicleAccidentFile::findOrFail($id);

        // Delete the file from the public directory
        if (file_exists(public_path($file->file))) {
            unlink(public_path($file->file));
        }

        // Delete the file record from the database
        $file->delete();

        return response()->json(['success' => true]);
    }
}
