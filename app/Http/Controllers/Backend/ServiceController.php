<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TimeSlot;
use App\Models\Service;
use App\Models\ServiceJob;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        // Get the search query and per_page value from the request
        $search = $request->input('search');
        $perPage = $request->input('per_page', 10); // Default to 10 if not provided

        // Query the services with search functionality
        $services = Service::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->paginate($perPage);

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
}
