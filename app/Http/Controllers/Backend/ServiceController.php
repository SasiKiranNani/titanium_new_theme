<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TimeSlot;
use App\Models\Service;
use App\Models\ServiceJob;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // public function index(Request $request)
    // {
    //     // Get the search query and per_page value from the request
    //     $search = $request->input('search');
    //     $perPage = $request->input('per_page', 10); // Default to 10 if not provided

    //     // Query the services with search functionality
    //     $services = Service::when($search, function ($query) use ($search) {
    //         return $query->where('name', 'like', '%' . $search . '%');
    //     })->paginate($perPage);

    //     return view('backend.service-management.services-and-jobs.services', compact('services', 'search', 'perPage'));
    // }

    public function index(Request $request)
    {
        // Get the search query and per_page value from the request
        $search = $request->input('search');
        $perPage = $request->input('per_page', 10); // Default to 10 if not provided

        // Query the services with search functionality
        $query = Service::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', '%' . $search . '%');
        });

        // Fetch all records if 'all' is selected, otherwise paginate
        if ($perPage === 'all') {
            $services = $query->get(); // Fetch all records as a collection
        } else {
            $services = $query->paginate((int) $perPage); // Paginate with the provided per_page value
        }

        return view('backend.service-management.services-and-jobs.services', compact('services', 'search', 'perPage'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        Service::create($request->all());
        return redirect()->back()->with('success', 'Service created successfully');
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $service->update($request->all());
        return redirect()->back()->with('success', 'Service updated successfully');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->back()->with('success', 'Service deleted successfully');
    }

    // public function job(Request $request)
    // {
    //     $search = $request->input('search');
    //     $perPage = $request->input('per_page', 10);

    //     $services = Service::all();
    //     $serviceJobs = ServiceJob::when($search, function ($query) use ($search) {
    //         return $query->where('name', 'like', '%' . $search . '%')
    //             ->orWhereHas('service', function ($query) use ($search) {
    //                 $query->where('name', 'like', '%' . $search . '%');
    //             });
    //     })->paginate($perPage);

    //     return view('backend.service-management.services-and-jobs.job', compact('serviceJobs', 'services', 'search', 'perPage'));
    // }


    public function job(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('per_page', 10);

        $services = Service::all();
        $query = ServiceJob::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', '%' . $search . '%')
                ->orWhereHas('service', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                });
        });

        // Fetch all records if 'all' is selected, otherwise paginate
        if ($perPage === 'all') {
            $serviceJobs = $query->get(); // Fetch all records as a collection
        } else {
            $serviceJobs = $query->paginate((int) $perPage); // Paginate with the provided per_page value
        }

        return view('backend.service-management.services-and-jobs.job', compact('serviceJobs', 'services', 'search', 'perPage'));
    }

    public function jobStore(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        ServiceJob::create([
            'service_id' => $request->service_id,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Service Job created successfully');
    }

    public function jobUpdate(Request $request, $id)
    {
        $serviceJob = ServiceJob::findOrFail($id);
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $serviceJob->update([
            'service_id' => $request->service_id,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);
        return redirect()->back()->with('success', 'Service Job updated successfully');
    }

    public function jobDestroy($id)
    {
        $serviceJob = ServiceJob::findOrFail($id);
        $serviceJob->delete();
        return redirect()->back()->with('success', 'Service Job deleted successfully');
    }
}
