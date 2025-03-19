<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\VehicleDetail;
use App\Models\AssignVehicle;
use App\Models\VehicleFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class VehicleDetailController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search', '');
        $categoryId = $request->input('category_id', '');
        $sortOrder = $request->input('sort_order', 'asc');
        $rentedFilter = $request->input('rented', '');

        $query = VehicleDetail::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('reg_no', 'like', "%$search%")
                    ->orWhere('make', 'like', "%$search%")
                    ->orWhere('model', 'like', "%$search%")
                    ->orWhere('company_name', 'like', "%$search%")
                    ->orWhere('abn', 'like', "%$search%")
                    ->orWhere('vin', 'like', "%$search%");
            });
        }

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        // Filter based on rented status
        if ($rentedFilter === 'rented') {
            $query->whereHas('assignVehicles', function ($q) {
                $q->where('rented', true);
            });
        } elseif ($rentedFilter === 'not_rented') {
            $query->whereDoesntHave('assignVehicles');
        }

        // Apply sorting separately
        if ($sortOrder === 'asc') {
            $query->orderBy('created_at', 'asc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $vehicles = $query->paginate($perPage === 'all' ? $query->count() : (int) $perPage);
        $categories = Category::all();

        // Fetch vehicle files for each vehicle
        foreach ($vehicles as $vehicle) {
            $vehicle->files = VehicleFile::where('vehicle_detail_id', $vehicle->id)->get();
        }

        return view('backend.vehicle-management.vehicle-detail.list', compact('vehicles', 'perPage', 'categories', 'search', 'categoryId', 'sortOrder', 'rentedFilter'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('backend.vehicle-management.vehicle-detail.create', compact('categories'));
    }

    public function edit($id)
    {
        $vehicle = VehicleDetail::findOrFail($id);
        $categories = Category::all();

        // Fetch vehicle files for this vehicle
        $vehicle->files = VehicleFile::where('vehicle_detail_id', $vehicle->id)->get();

        return view('backend.vehicle-management.vehicle-detail.edit', compact('vehicle', 'categories'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'reg_no'                                  => 'required',
            'purchase_date'                           => 'nullable|date_format:Y-m',
            'fuel_type'                               => 'nullable',
            'make'                                    => 'nullable',
            'vin'                                     => 'nullable',
            'model'                                   => 'nullable',
            'battery_size'                            => 'nullable',
            'engine_no'                               => 'nullable',
            'owner'                                   => 'nullable',
            'color'                                   => 'nullable',
            'type'                                    => 'nullable',
            'odometer'                                => 'nullable',
            'transmission'                            => 'nullable',
            'reg_expiry_date'                         => 'nullable',
            'last_service_date'                       => 'nullable',
            'rented'                                  => 'nullable',
            'insurance_company'                       => 'nullable',
            'insurance_number'                        => 'nullable',
            'vehicle_inspection_report_expiring_date' => 'nullable',
            'thumbnail'                               => 'nullable|image|max:2048', // Ensure it's an image and limit size
            'thumbnail_alt'                           => 'nullable',
            'category_id'                             => 'required|exists:categories,id', // Validate category_id
            'cost_per_week'                           => 'nullable',
            'company_name'                            => 'required',
            'abn'                                     => 'nullable',
            'notes'                                   => 'nullable',
            'files.*'                                 => 'nullable|file|max:2048|mimes:jpg,jpeg,webp,png,pdf,doc,docx', // Validate multiple files
        ]);

        // Convert the purchase_date from 'YYYY-MM' to 'YYYY-MM-DD' only if it's not null
        if ($request->purchase_date && preg_match('/^\d{4}-\d{2}$/', $request->purchase_date)) {
            $request->merge(['purchase_date' => $request->purchase_date . '-01']); // Append '-01' to make it a valid date
        } else {
            $request->merge(['purchase_date' => null]); // Explicitly set to null if not provided
        }

        // Handle Thumbnail Image
        $thumbnailName = null; // Initialize thumbnail name
        if ($request->hasFile('thumbnail')) {
            $thumbnail     = $request->file('thumbnail');                         // Get the uploaded file
            $thumbnailName = time() . '_' . $thumbnail->getClientOriginalName();  // Create a unique name
            $thumbnail->move(public_path('vehicles/thumbnails'), $thumbnailName); // Move the file to the desired location
        }

        // Set default value for rented if not present
        $rentedValue = $request->has('rented') ? 1 : 0; // 1 if checked, 0 if not

        // Fetch the category name using the category_id
        $category     = Category::find($request->category_id);
        $categoryName = $category ? $category->name : '';

        // Generate the slug using company_name, category_name, make, and model
        $slug = strtolower(trim("{$request->company_name} {$categoryName} {$request->make} {$request->model} {$request->reg_no}"));
        $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug); // Remove special characters
        $slug = preg_replace('/\s+/', '-', $slug);         // Replace spaces with hyphens
        $slug = preg_replace('/-+/', '-', $slug);          // Collapse multiple hyphens
        $slug = trim($slug, '-');                          // Trim any leading or trailing hyphens

        // Create the vehicle detail record
        $vehicleDetail = VehicleDetail::create([
            'slug'                                    => $slug,
            'reg_no'                                  => $request->reg_no,
            'purchase_date'                           => $request->purchase_date, // Store as 'YYYY-MM-DD'
            'fuel_type'                               => $request->fuel_type,
            'make'                                    => $request->make,
            'vin'                                     => $request->vin,
            'model'                                   => $request->model,
            'battery_size'                            => $request->battery_size,
            'engine_no'                               => $request->engine_no,
            'owner'                                   => $request->owner,
            'color'                                   => $request->color,
            'type'                                    => $request->type,
            'odometer'                                => $request->odometer,
            'transmission'                            => $request->transmission,
            'reg_expiry_date'                         => $request->reg_expiry_date,
            'last_service_date'                       => $request->last_service_date,
            'rented'                                  => $rentedValue, // Use the determined value for rented
            'insurance_company'                       => $request->insurance_company,
            'insurance_number'                        => $request->insurance_number,
            'vehicle_inspection_report_expiring_date' => $request->vehicle_inspection_report_expiring_date,
            'thumbnail'                               => $thumbnailName,
            'thumbnail_alt'                           => $request->thumbnail_alt,
            'category_id'                             => $request['category_id'], // Save category_id
            'cost_per_week'                           => $request->cost_per_week,
            'company_name'                            => $request->company_name,
            'abn'                                     => $request->abn,
            'notes'                                   => $request->notes,
        ]);

        // Handle Multiple File Uploads
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = $request->reg_no . '_' . $file->getClientOriginalName();  // Create a unique name
                $file->move(public_path('vehicles/files'), $fileName);     // Move the file to the desired location

                // Save the file details to the VehicleFile model
                VehicleFile::create([
                    'vehicle_detail_id' => $vehicleDetail->id,
                    'file_path'         => 'vehicles/files/' . $fileName,
                    'file_name'        => $fileName,
                ]);
            }
        }

        // Redirect with success message
        return redirect()->route('vehicle')->with('success', 'Vehicle detail created successfully.');
    }

    public function update(Request $request)
    {
        $vehicle = VehicleDetail::findOrFail($request->id);
        // Validate the incoming request data
        $request->validate([
            'reg_no'                                  => 'required',
            'purchase_date'                           => 'nullable|date_format:Y-m',
            'fuel_type'                               => 'nullable',
            'make'                                    => 'nullable',
            'vin'                                     => 'nullable',
            'model'                                   => 'nullable',
            'battery_size'                            => 'nullable',
            'engine_no'                               => 'nullable',
            'owner'                                   => 'nullable',
            'color'                                   => 'nullable',
            'type'                                    => 'nullable',
            'odometer'                                => 'nullable',
            'transmission'                            => 'nullable',
            'reg_expiry_date'                         => 'nullable',
            'last_service_date'                       => 'nullable',
            'rented'                                  => 'nullable',
            'insurance_company'                       => 'nullable',
            'insurance_number'                        => 'nullable',
            'vehicle_inspection_report_expiring_date' => 'nullable',
            'thumbnail'                               => 'nullable|image|max:2048', // Ensure it's an image and limit size
            'thumbnail_alt'                           => 'nullable',
            'category_id'                             => 'required|exists:categories,id', // Validate category_id
            'cost_per_week'                           => 'nullable',
            'company_name'                            => 'required',
            'abn'                                     => 'nullable',
            'notes'                                   => 'nullable',
            'files.*'                                 => 'nullable|file|max:2048|mimes:jpg,jpeg,webp,png,pdf,doc,docx', // Validate multiple files
        ]);

        // Convert the purchase_date from 'YYYY-MM' to 'YYYY-MM-DD' only if it's not null
        if ($request->purchase_date && preg_match('/^\d{4}-\d{2}$/', $request->purchase_date)) {
            $request->merge(['purchase_date' => $request->purchase_date . '-01']); // Append '-01' to make it a valid date
        } else {
            $request->merge(['purchase_date' => null]); // Explicitly set to null if not provided
        }

        // Handle Thumbnail Image
        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail if it exists
            if (! empty($vehicle->thumbnail)) {
                $oldThumbnailPath = public_path('vehicles/thumbnails/' . $vehicle->thumbnail);
                if (File::exists($oldThumbnailPath)) {
                    File::delete($oldThumbnailPath);
                }
            }

            // Store new thumbnail
            $thumbnail     = $request->file('thumbnail');
            $thumbnailName = time() . '_' . $thumbnail->getClientOriginalName(); // Ensure unique name
            $thumbnail->move(public_path('vehicles/thumbnails'), $thumbnailName);
            $vehicle->thumbnail = $thumbnailName; // Update the vehicle's thumbnail field
        }

        $rentedValue = $request->has('rented') ? 1 : 0; // 1 if checked, 0 if not


        // Fetch the category name using the category_id
        $category     = Category::find($request->category_id);
        $categoryName = $category ? $category->name : '';

        // Generate the slug using company_name, category_name, make, and model
        $slug = strtolower(trim("{$request->company_name} {$categoryName} {$request->make} {$request->model} {$request->reg_no}"));
        $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug); // Remove special characters
        $slug = preg_replace('/\s+/', '-', $slug);         // Replace spaces with hyphens
        $slug = preg_replace('/-+/', '-', $slug);          // Collapse multiple hyphens
        $slug = trim($slug, '-');                          // Trim any leading or trailing hyphens


        // Update the vehicle detail record
        $vehicle->update([
            'slug'                                    => $slug,
            'reg_no'                                  => $request->reg_no,
            'purchase_date'                           => $request->purchase_date, // Store as 'YYYY-MM-DD'
            'fuel_type'                               => $request->fuel_type,
            'make'                                    => $request->make,
            'vin'                                     => $request->vin,
            'model'                                   => $request->model,
            'battery_size'                            => $request->battery_size,
            'engine_no'                               => $request->engine_no,
            'owner'                                   => $request->owner,
            'color'                                   => $request->color,
            'type'                                    => $request->type,
            'odometer'                                => $request->odometer,
            'transmission'                            => $request->transmission,
            'reg_expiry_date'                         => $request->reg_expiry_date,
            'last_service_date'                       => $request->last_service_date,
            'rented'                                  => $rentedValue, // Use the determined value for rented
            'insurance_company'                       => $request->insurance_company,
            'insurance_number'                        => $request->insurance_number,
            'vehicle_inspection_report_expiring_date' => $request->vehicle_inspection_report_expiring_date,
            'thumbnail'                               => $vehicle->thumbnail,
            'thumbnail_alt'                           => $request->thumbnail_alt,
            'category_id'                             => $request['category_id'], // Save category_id
            'cost_per_week'                           => $request->cost_per_week,
            'company_name'                            => $request->company_name,
            'abn'                                     => $request->abn,
            'notes'                                   => $request->notes,
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = $request->reg_no . '_' . $file->getClientOriginalName();  // Create a unique name
                $file->move(public_path('vehicles/files'), $fileName);     // Move the file to the desired location

                // Save the file details to the VehicleFile model
                VehicleFile::create([
                    'vehicle_detail_id' => $vehicle->id,
                    'file_path'         => 'vehicles/files/' . $fileName,
                    'file_name'        => $fileName,
                ]);
            }
        }
        // Redirect with success message
        return redirect()->route('vehicle')->with('success', 'Vehicle detail updated successfully.');
    }

    public function destroy($id)
    {
        $vehicle = VehicleDetail::findOrFail($id);
        // Delete Thumbnail
        if ($vehicle->thumbnail) {
            $thumbnailPath = public_path('vehicles/thumbnails/' . $vehicle->thumbnail);
            if (File::exists($thumbnailPath)) {
                File::delete($thumbnailPath);
            }
        }

        $vehicle->delete();

        return redirect()->route('vehicle')->with('success', 'Vehicle detail deleted successfully.');
    }

    public function vehicleFileDestroy($id)
    {
        $file = VehicleFile::findOrFail($id);

        // Delete the file from storage (optional)
        if (file_exists(public_path($file->file_path))) {
            unlink(public_path($file->file_path));
        }

        // Delete the file record from the database
        $file->delete();

        return response()->json(['message' => 'File deleted successfully.']);
    }

    public function getVehicleDetail($id)
    {
        $vehicle = VehicleDetail::findOrFail($id);
        return view('backend.vehicle-management.vehicle-detail.details', compact('vehicle'));
    }

    public function details()
    {
        $vehicle = null;
        return view('backend.vehicle-management.vehicle-detail.details', compact('vehicle'));
    }
}
