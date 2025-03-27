<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Miscellaneous;
use App\Models\OtherServiceBooking;
use App\Models\Service;
use App\Models\ServiceBooking;
use App\Models\ServiceJob;
use App\Models\TimeSlot;
use App\Models\VehicleDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('permission:View Company Vehicle Bookings', only: ['companyVehicle']),
            new Middleware('permission:Create Company Vehicle Bookings', only: ['createCompanyVehicle']),
            new Middleware('permission:Edit Company Vehicle Bookings', only: ['editCompanyVehicle']),
            new Middleware('permission:Delete Company Vehicle Bookings', only: ['destroyCompanyVehicle']),

            new Middleware('permission:View Other Vehicle Bookings', only: ['otherVehicle']),
            new Middleware('permission:Create Other Vehicle Bookings', only: ['createOtherVehicle']),
            new Middleware('permission:Edit Other Vehicle Bookings', only: ['editOtherVehicle']),
            new Middleware('permission:Delete Other Vehicle Bookings', only: ['destroyOtherVehicle']),

            new Middleware('permission:Company Vehicle Invoice', only: ['companyInvoice']),
            new Middleware('permission:Other Vehicle Invoice', only: ['otherInvoice']),

            // invoice Management
            new Middleware('permission:Company Vehicle Invoice Management', only: ['companyInvoicePage']),
            new Middleware('permission:Other Vehicle Invoice Management', only: ['otherInvoicePage']),
        ];
    }


    // public function companyVehicle(Request $request)
    // {
    //     // Get the per_page value from the request or set a default
    //     $perPage = $request->input('per_page', 10); // Default to 10 if not provided

    //     // Fetch the service bookings with pagination
    //     $serviceBooking = ServiceBooking::paginate($perPage);

    //     // Start Query with Relationships
    //     $query = ServiceBooking::with(['vehicle']);

    //     // Search by Registration Number (`reg_no` from vehicle)
    //     if ($request->has('search') && !empty($request->search)) {
    //         $query->whereHas('vehicle', function ($q) use ($request) {
    //             $q->where('reg_no', 'LIKE', "%{$request->search}%");
    //         });
    //     }

    //     // Fetch other necessary data
    //     $vehicle = VehicleDetail::all();
    //     $timeslots = TimeSlot::all();
    //     $services = Service::all();
    //     $serviceJobs = ServiceJob::all();

    //     // Prepare an array to hold miscellaneous items for each booking
    //     $miscellaneousItems = [];
    //     foreach ($serviceBooking as $booking) {
    //         $miscellaneousIds = explode(',', $booking->miscellaneous);
    //         $miscellaneousItems[$booking->id] = Miscellaneous::whereIn('id', $miscellaneousIds)->get();
    //     }

    //     return view('backend.services.services.company-vehicle', compact('serviceBooking', 'vehicle', 'timeslots', 'services', 'serviceJobs', 'miscellaneousItems', 'perPage'));
    // }

    public function companyVehicle(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $sortOrder = in_array($request->input('sort_order'), ['asc', 'desc']) ? $request->input('sort_order') : 'asc';
        $search = $request->input('search', '');
        $startDate = $request->input('start_date', '');
        $endDate = $request->input('end_date', '');

        // Start Query with Relationships
        $query = ServiceBooking::with(['vehicle']);

        // Apply search filter
        if (!empty($search)) {
            $query->whereHas('vehicle', function ($q) use ($search) {
                $q->where('reg_no', 'LIKE', "%$search%");
            });
        }

        // Apply date range filter
        if (!empty($startDate) && !empty($endDate)) {
            $query->whereBetween('date', [$startDate, $endDate]);
        }

        // Apply sorting
        $query->orderBy('date', $sortOrder);

        // Fetch all records if 'all' is selected, otherwise paginate
        $serviceBooking = ($perPage === 'all') ? $query->get() : $query->paginate((int) $perPage);

        // Fetch other necessary data
        $vehicle     = VehicleDetail::all();
        $timeslots   = TimeSlot::all();
        $services    = Service::all();
        $serviceJobs = ServiceJob::all();

        // Prepare miscellaneous items
        $miscellaneousItems = [];
        foreach ($serviceBooking as $booking) {
            $miscellaneousIds = explode(',', $booking->miscellaneous);
            $miscellaneousItems[$booking->id] = Miscellaneous::whereIn('id', $miscellaneousIds)->get();
        }

        return view('backend.service-management.bookings.company-vehicle', compact(
            'serviceBooking',
            'vehicle',
            'timeslots',
            'services',
            'serviceJobs',
            'miscellaneousItems',
            'perPage',
            'sortOrder',
            'search',
            'startDate',
            'endDate'
        ));
    }

    public function createCompanyVehicle()
    {
        $vehicle = VehicleDetail::all();
        $timeslots = TimeSlot::all();
        $services = Service::all();
        $serviceJobs = ServiceJob::all();
        return view('backend.service-management.bookings.create-company', compact('vehicle', 'timeslots', 'services', 'serviceJobs'));
    }

    public function storeCompanyVehicle(Request $request)
    {
        // Convert checkbox value to boolean manually
        $request->merge([
            'gst_toggle' => $request->has('gst_toggle') ? true : false,
        ]);

        // Validate the request data
        $validatedData = $request->validate([
            'date'                        => 'required|date',
            'vehicle_id'                  => 'required|exists:vehicle_details,id',
            'time_slot_id'                => 'required|exists:time_slots,id',
            'service_job_id'              => 'nullable|array',
            'service_job_id.*'            => 'exists:service_jobs,id',
            'odometer'                    => 'nullable|string',
            'service_interval'            => 'nullable|string',
            'next_service_due'            => 'nullable',
            'gst_toggle'                  => 'nullable|boolean', // Add validation for gst_toggle
            'gst_percentage'              => 'nullable|numeric',
            'total'                       => 'nullable|numeric',
            'miscellaneous_name'          => 'nullable|array',
            'miscellaneous_name.*'        => 'nullable|string',
            'miscellaneous_quantity'      => 'nullable|array',
            'miscellaneous_quantity.*'    => 'nullable|numeric',
            'miscellaneous_price'         => 'nullable|array',
            'miscellaneous_price.*'       => 'nullable|numeric',
            'miscellaneous_total_price'   => 'nullable|array',
            'miscellaneous_total_price.*' => 'nullable|numeric',
            'abn'                         => 'nullable|string',
            'color'                       => 'nullable|string',
            'mobile'                      => 'nullable|string',
            'cust_name'                   => 'nullable|string',
            'street'                      => 'nullable|string',
            'state'                       => 'nullable|string',
            'post_code'                   => 'nullable|string',
            'make'                        => 'nullable|string',
            'model'                       => 'nullable|string',
            'vin'                         => 'nullable|string',
            'engine_no'                   => 'nullable|string',
            'purchase_date'               => 'nullable|date',
            'payment'                     => 'nullable|string',
            'total_paid'                  => 'nullable|string',
            'balance_due'                 => 'nullable|string',
        ]);

        // Use a database transaction to ensure data consistency
        DB::transaction(function () use ($validatedData) {
            // Create the ServiceBooking
            $booking                   = new ServiceBooking();
            $booking->date             = $validatedData['date'];
            $booking->time_slot_id     = $validatedData['time_slot_id'];
            $booking->vehicle_id       = $validatedData['vehicle_id'];
            $booking->service_job_id   = isset($validatedData['service_job_id'])
                ? json_encode($validatedData['service_job_id'])
                : null;
            $booking->odometer         = $validatedData['odometer'];
            $booking->service_interval = $validatedData['service_interval'];
            $booking->next_service_due = $validatedData['next_service_due'];
            $booking->gst_toggle       = $validatedData['gst_toggle'] ?? false; // Store gst_toggle
            $booking->gst_percentage   = $validatedData['gst_percentage'];
            $booking->total            = $validatedData['total'];
            $booking->abn              = $validatedData['abn'];
            $booking->payment          = $validatedData['payment'];
            $booking->total_paid       = $validatedData['total_paid'];
            $booking->balance_due      = $validatedData['balance_due'];

            // Auto-generate repair_order_no
            $lastBooking              = ServiceBooking::orderBy('repair_order_no', 'desc')->first();
            $lastRepairOrderNo        = $lastBooking ? intval(str_replace('TEA-', '', $lastBooking->repair_order_no)) : 0;
            $booking->repair_order_no = 'TEA-' . ($lastRepairOrderNo + 1);

            $booking->color         = $validatedData['color'];
            $booking->mobile        = $validatedData['mobile'];
            $booking->cust_name     = $validatedData['cust_name'];
            $booking->street        = $validatedData['street'];
            $booking->state         = $validatedData['state'];
            $booking->post_code     = $validatedData['post_code'];
            $booking->make          = $validatedData['make'];
            $booking->model         = $validatedData['model'];
            $booking->vin           = $validatedData['vin'];
            $booking->engine_no     = $validatedData['engine_no'];
            $booking->purchase_date = $validatedData['purchase_date'];

            // Save the booking
            $booking->save();

            // Save miscellaneous items and capture their IDs
            $miscellaneousIds = [];
            if (! empty($validatedData['miscellaneous_name'])) {
                foreach ($validatedData['miscellaneous_name'] as $index => $name) {
                    if (! empty($name) && isset($validatedData['miscellaneous_price'][$index])) {
                        $miscellaneousItem = Miscellaneous::create([
                            'name'        => $name,
                            'quantity'    => $validatedData['miscellaneous_quantity'][$index],
                            'price'       => $validatedData['miscellaneous_price'][$index],
                            'total_price' => $validatedData['miscellaneous_total_price'][$index],
                        ]);
                        // Store the ID of the created miscellaneous item
                        $miscellaneousIds[] = $miscellaneousItem->id;
                    }
                }
            }

            // Optionally, you can store the IDs in the booking if needed
            $booking->miscellaneous = implode(',', $miscellaneousIds);
            $booking->save();
        });

        $vehicle = VehicleDetail::findOrFail($validatedData['vehicle_id']);
        $vehicle->update([
            'odometer'          => $validatedData['odometer'],
            'last_service_date' => $validatedData['date'],
            'engine_no' => $validatedData['engine_no'],
        ]);
        // Redirect with a success message
        return redirect()->route('services.company-vehicle')->with('success', 'Booking created successfully.');
    }

    public function editCompanyVehicle($id)
    {
        $serviceBooking = ServiceBooking::find($id);
        if (! $serviceBooking) {
            return redirect()->back()->with('error', 'Service Booking not found.');
        }

        $vehicle        = VehicleDetail::all();
        $timeslots      = TimeSlot::all();
        $services       = Service::all();
        $serviceJobs    = ServiceJob::all();
        // Triple protection for selectedJobIds:
        $selectedJobIds = [];
        if (!empty($serviceBooking->service_job_id)) {
            $decoded = json_decode($serviceBooking->service_job_id, true);
            $selectedJobIds = is_array($decoded) ? $decoded : [];
        }

        // Handle empty or invalid miscellaneous field
        $miscellaneousIds   = $serviceBooking->miscellaneous ? explode(',', $serviceBooking->miscellaneous) : [];
        $miscellaneousItems = $miscellaneousIds ? Miscellaneous::whereIn('id', $miscellaneousIds)->get() : collect();

        return view('backend.service-management.bookings.edit-company', compact(
            'serviceBooking',
            'vehicle',
            'timeslots',
            'services',
            'serviceJobs',
            'selectedJobIds',
            'miscellaneousItems'
        ));
    }

    public function updateCompanyVehicle(Request $request, $id)
    {
        // Convert checkbox value to boolean manually
        $request->merge([
            'gst_toggle'     => $request->has('gst_toggle') ? true : false,
            'gst_percentage' => $request->has('gst_toggle') ? $request->gst_percentage : 0, // Set default value if gst_toggle is false
        ]);

        // Validate the request data
        $validatedData = $request->validate([
            'date'              => 'required|date',
            'vehicle_id'        => 'required|exists:vehicle_details,id',
            'time_slot_id'      => 'required|exists:time_slots,id',
            'service_job_id'    => 'nullable|array',         // Ensure service_job_id is an array
            'service_job_id.*'  => 'exists:service_jobs,id', // Ensure each ID exists in the service_jobs table
            'odometer'          => 'nullable|string',
            'service_interval'  => 'nullable|string',
            'next_service_due'  => 'nullable',
            'gst_toggle'        => 'nullable|boolean',
            'gst_percentage'    => 'nullable|numeric',
            'total'             => 'nullable|numeric',
            'misc_name'         => 'nullable|array',
            'misc_name.*'       => 'nullable|string',
            'misc_qty'          => 'nullable|array',
            'misc_qty.*'        => 'nullable|numeric',
            'misc_cost'         => 'nullable|array',
            'misc_cost.*'       => 'nullable|numeric',
            'misc_total_cost'   => 'nullable|array',
            'misc_total_cost.*' => 'nullable|numeric',
            'abn'               => 'nullable|string',
            'color'             => 'nullable|string',
            'mobile'            => 'nullable|string',
            'cust_name'         => 'nullable|string',
            'street'            => 'nullable|string',
            'state'             => 'nullable|string',
            'post_code'         => 'nullable|string',
            'make'              => 'nullable|string',
            'model'             => 'nullable|string',
            'vin'               => 'nullable|string',
            'engine_no'         => 'nullable|string',
            'purchase_date'     => 'nullable|date',
            'repair_order_no'   => 'nullable|string',
            'payment'           => 'nullable|string',
            'total_paid'        => 'nullable|string',
            'balance_due'       => 'nullable|string',
        ]);

        // Debugging: Check the validated data
        Log::info('Validated Data:', $validatedData);

        // Use a database transaction to ensure data consistency
        DB::transaction(function () use ($validatedData, $id) {
            // Find the existing ServiceBooking
            $booking = ServiceBooking::findOrFail($id);

            $updateData = [
                'date'             => $validatedData['date'],
                'time_slot_id'     => $validatedData['time_slot_id'],
                'vehicle_id'       => $validatedData['vehicle_id'],
                'odometer'         => $validatedData['odometer'],
                'service_interval' => $validatedData['service_interval'],
                'next_service_due' => $validatedData['next_service_due'],
                'gst_toggle'       => $validatedData['gst_toggle'] ?? false,
                'gst_percentage'   => $validatedData['gst_percentage'],
                'total'            => $validatedData['total'],
                'abn'              => $validatedData['abn'],
                'color'            => $validatedData['color'],
                'mobile'           => $validatedData['mobile'],
                'cust_name'        => $validatedData['cust_name'],
                'street'           => $validatedData['street'],
                'state'            => $validatedData['state'],
                'post_code'        => $validatedData['post_code'],
                'make'             => $validatedData['make'],
                'model'            => $validatedData['model'],
                'vin'              => $validatedData['vin'],
                'engine_no'        => $validatedData['engine_no'],
                'purchase_date'    => $validatedData['purchase_date'],
                'repair_order_no'  => $validatedData['repair_order_no'],
                'payment'          => $validatedData['payment'],
                'total_paid'       => $validatedData['total_paid'],
                'balance_due'      => $validatedData['balance_due'],
            ];

            // Handle service_job_id - check if it exists and is an array
            if (isset($validatedData['service_job_id']) && is_array($validatedData['service_job_id'])) {
                $updateData['service_job_id'] = json_encode($validatedData['service_job_id']);
            } else {
                $updateData['service_job_id'] = null;
            }

            // Update the ServiceBooking
            $booking->update($updateData);


            // Handle miscellaneous items
            $miscellaneousIds = [];
            if (! empty($validatedData['misc_name'])) {
                foreach ($validatedData['misc_name'] as $index => $name) {
                    if (! empty($name) && isset($validatedData['misc_cost'][$index])) {
                        if (isset($validatedData['misc_id'][$index])) {
                            // Update existing miscellaneous item
                            $miscellaneousItem = Miscellaneous::find($validatedData['misc_id'][$index]);
                            $miscellaneousItem->update([
                                'name'        => $name,
                                'quantity'    => $validatedData['misc_qty'][$index],
                                'price'       => $validatedData['misc_cost'][$index],
                                'total_price' => $validatedData['misc_total_cost'][$index],
                            ]);
                        } else {
                            // Create new miscellaneous item
                            $miscellaneousItem = Miscellaneous::create([
                                'name'        => $name,
                                'quantity'    => $validatedData['misc_qty'][$index],
                                'price'       => $validatedData['misc_cost'][$index],
                                'total_price' => $validatedData['misc_total_cost'][$index],
                            ]);
                        }
                        $miscellaneousIds[] = $miscellaneousItem->id;
                    }
                }
            }

            // Delete old miscellaneous items that are not in the new list
            $oldMiscellaneousIds = explode(',', $booking->miscellaneous);
            $idsToDelete         = array_diff($oldMiscellaneousIds, $miscellaneousIds);
            Miscellaneous::destroy($idsToDelete);

            // Update miscellaneous IDs in the booking
            $booking->miscellaneous = implode(',', $miscellaneousIds);
            $booking->save();
        });

        $vehicle = VehicleDetail::findOrFail($validatedData['vehicle_id']);
        $vehicle->update([
            'odometer'          => $validatedData['odometer'],
            'last_service_date' => $validatedData['date'],
            'engine_no'         => $validatedData['engine_no'],
        ]);
        // Redirect with a success message
        return redirect()->route('services.company-vehicle')->with('success', 'Booking updated successfully.');
    }

    public function destroyCompanyVehicle($id)
    {
        $serviceBooking = ServiceBooking::find($id);
        if (! $serviceBooking) {
            return redirect()->back()->with('error', 'Service Booking not found.');
        }

        $serviceBooking->delete();

        return redirect()->route('services.company-vehicle')->with('success', 'Service Booking deleted successfully.');
    }

    // used to download invoice
    // public function invoice($id)
    // {
    //     $serviceBooking = ServiceBooking::with([
    //         'vehicle',
    //         'timeSlot',
    //     ])->findOrFail($id);

    //     // Convert "miscellaneous" to an array
    //     $miscellaneousIds = array_map('trim', explode(',', trim($serviceBooking->miscellaneous, '"')));

    //     // Fetch miscellaneous items manually
    //     $miscellaneousItems = Miscellaneous::whereIn('id', $miscellaneousIds)->get();

    //     $serviceJobs = ServiceJob::with('service')
    //         ->whereIn('id', json_decode($serviceBooking->service_job_id, true))
    //         ->get();

    //     $pdf = Pdf::loadView('backend.services.services.invoice', [
    //         'serviceBooking' => $serviceBooking,
    //         'serviceJobs' => $serviceJobs,
    //         'miscellaneousItems' => $miscellaneousItems,
    //     ]);

    //     return $pdf->stream('invoice_' . $serviceBooking->id . '.pdf');
    // }

    // used to view the invoice in pdf format
    public function companyInvoice($id)
    {
        $serviceBooking = ServiceBooking::with([
            'vehicle',
            'timeSlot',
        ])->findOrFail($id);

        // Convert "miscellaneous" to an array
        $miscellaneousIds = array_map('trim', explode(',', trim($serviceBooking->miscellaneous, '"')));

        // Fetch miscellaneous items manually
        $miscellaneousItems = Miscellaneous::whereIn('id', $miscellaneousIds)->get();

        $serviceJobs = ServiceJob::with('service')
            ->whereIn('id', json_decode($serviceBooking->service_job_id, true))
            ->get();

        $pdf = Pdf::loadView('backend.service-management.bookings.invoice.invoice', [
            'serviceBooking' => $serviceBooking,
            'serviceJobs' => $serviceJobs,
            'miscellaneousItems' => $miscellaneousItems,
        ]);

        return $pdf->stream('invoice_' . $serviceBooking->id . '.pdf');
    }
    public function otherInvoice($id)
    {
        $serviceBooking = OtherServiceBooking::with([
            'timeSlot',
        ])->findOrFail($id);

        // Convert "miscellaneous" to an array
        $miscellaneousIds = array_map('trim', explode(',', trim($serviceBooking->miscellaneous, '"')));

        // Fetch miscellaneous items manually
        $miscellaneousItems = Miscellaneous::whereIn('id', $miscellaneousIds)->get();

        $serviceJobs = ServiceJob::with('service')
            ->whereIn('id', json_decode($serviceBooking->service_job_id, true))
            ->get();

        $pdf = Pdf::loadView('backend.service-management.bookings.invoice.invoice', [
            'serviceBooking' => $serviceBooking,
            'serviceJobs' => $serviceJobs,
            'miscellaneousItems' => $miscellaneousItems,
        ]);

        return $pdf->stream('invoice_' . $serviceBooking->id . '.pdf');
    }

    public function otherVehicle(Request $request)
    {
        // Get pagination value or set a default
        $perPage = $request->input('per_page', 10);
        $sortOrder = in_array($request->input('sort_order'), ['asc', 'desc']) ? $request->input('sort_order') : 'asc';
        $search = $request->input('search', '');
        $startDate = $request->input('start_date', '');
        $endDate = $request->input('end_date', '');

        // Start Query
        $query = OtherServiceBooking::query();

        // Apply search filter
        if (!empty($search)) {
            $query->where('reg_no', 'LIKE', "%$search%");
        }

        // Apply date range filter
        if (!empty($startDate) && !empty($endDate)) {
            $query->whereBetween('date', [$startDate, $endDate]);
        }

        // Apply sorting
        $query->orderBy('date', $sortOrder);

        // Fetch all records if 'all' is selected, otherwise paginate
        $serviceBooking = ($perPage === 'all') ? $query->get() : $query->paginate((int) $perPage);

        // Fetch other necessary data
        $timeslots   = TimeSlot::all();
        $services    = Service::all();
        $serviceJobs = ServiceJob::all();

        // Prepare miscellaneous items
        $miscellaneousItems = [];
        foreach ($serviceBooking as $booking) {
            $miscellaneousIds = explode(',', $booking->miscellaneous);
            $miscellaneousItems[$booking->id] = Miscellaneous::whereIn('id', $miscellaneousIds)->get();
        }

        return view('backend.service-management.bookings.other-vehicle', compact(
            'serviceBooking',
            'timeslots',
            'services',
            'serviceJobs',
            'miscellaneousItems',
            'perPage',
            'sortOrder',
            'search',
            'startDate',
            'endDate'
        ));
    }


    public function createOtherVehicle()
    {
        $timeslots      = TimeSlot::all();
        $services       = Service::all();
        $serviceJobs    = ServiceJob::all();
        $miscellaneous  = Miscellaneous::all();

        return view('backend.service-management.bookings.create-other', compact('timeslots', 'services', 'serviceJobs', 'miscellaneous'));
    }

    public function storeOtherVehicle(Request $request)
    {
        // Convert checkbox value to boolean manually
        $request->merge([
            'gst_toggle' => $request->has('gst_toggle') ? true : false,
        ]);

        // Validate the request data
        $validatedData = $request->validate([
            'date'                        => 'required|date',
            'reg_no'                      => 'required',
            'time_slot_id'                => 'required|exists:time_slots,id',
            'service_job_id'              => 'nullable|array',
            'service_job_id.*'            => 'exists:service_jobs,id',
            'odometer'                    => 'nullable|string',
            'service_interval'            => 'nullable|string',
            'next_service_due'            => 'nullable',
            'gst_toggle'                  => 'nullable|boolean',
            'gst_percentage'              => 'nullable|numeric',
            'total'                       => 'nullable|numeric',
            'miscellaneous_name'          => 'nullable|array',
            'miscellaneous_name.*'        => 'nullable|string',
            'miscellaneous_quantity'      => 'nullable|array',
            'miscellaneous_quantity.*'    => 'nullable|numeric',
            'miscellaneous_price'         => 'nullable|array',
            'miscellaneous_price.*'       => 'nullable|numeric',
            'miscellaneous_total_price'   => 'nullable|array',
            'miscellaneous_total_price.*' => 'nullable|numeric',
            'abn'                         => 'nullable|string',
            'color'                       => 'nullable|string',
            'mobile'                      => 'nullable|string',
            'cust_name'                   => 'nullable|string',
            'street'                      => 'nullable|string',
            'state'                       => 'nullable|string',
            'post_code'                   => 'nullable|string',
            'make'                        => 'nullable|string',
            'model'                       => 'nullable|string',
            'vin'                         => 'nullable|string',
            'engine_no'                   => 'nullable|string',
            'purchase_date'               => 'nullable|date',
            'payment'                     => 'nullable|string',
            'total_paid'                  => 'nullable|string',
            'balance_due'                 => 'nullable|string',
        ]);

        // Use a database transaction to ensure data consistency
        DB::transaction(function () use ($validatedData) {
            // Create the ServiceBooking
            $booking                   = new OtherServiceBooking();
            $booking->date             = $validatedData['date'];
            $booking->time_slot_id     = $validatedData['time_slot_id'];
            $booking->reg_no           = $validatedData['reg_no'];
            $booking->service_job_id   = isset($validatedData['service_job_id'])
                ? json_encode($validatedData['service_job_id'])
                : null;
            $booking->odometer         = $validatedData['odometer'];
            $booking->service_interval = $validatedData['service_interval'];
            $booking->next_service_due = $validatedData['next_service_due'];
            $booking->gst_toggle       = $validatedData['gst_toggle'] ?? false;
            $booking->gst_percentage   = $validatedData['gst_percentage'];
            $booking->total            = $validatedData['total'];
            $booking->abn              = $validatedData['abn'];
            $booking->payment          = $validatedData['payment'];
            $booking->total_paid       = $validatedData['total_paid'];
            $booking->balance_due      = $validatedData['balance_due'];

            // Auto-generate repair_order_no
            $lastBooking              = OtherServiceBooking::orderBy('repair_order_no', 'desc')->first();
            $lastRepairOrderNo        = $lastBooking ? intval(str_replace('TEA-', '', $lastBooking->repair_order_no)) : 0;
            $booking->repair_order_no = 'TEA-' . ($lastRepairOrderNo + 1);

            $booking->color         = $validatedData['color'];
            $booking->mobile        = $validatedData['mobile'];
            $booking->cust_name     = $validatedData['cust_name'];
            $booking->street        = $validatedData['street'];
            $booking->state         = $validatedData['state'];
            $booking->post_code     = $validatedData['post_code'];
            $booking->make          = $validatedData['make'];
            $booking->model         = $validatedData['model'];
            $booking->vin           = $validatedData['vin'];
            $booking->engine_no     = $validatedData['engine_no'];
            $booking->purchase_date = $validatedData['purchase_date'];

            // Save the booking
            $booking->save();

            // Save miscellaneous items and capture their IDs
            $miscellaneousIds = [];
            if (! empty($validatedData['miscellaneous_name'])) {
                foreach ($validatedData['miscellaneous_name'] as $index => $name) {
                    if (! empty($name) && isset($validatedData['miscellaneous_price'][$index])) {
                        $miscellaneousItem = Miscellaneous::create([
                            'name'        => $name,
                            'quantity'    => $validatedData['miscellaneous_quantity'][$index],
                            'price'       => $validatedData['miscellaneous_price'][$index],
                            'total_price' => $validatedData['miscellaneous_total_price'][$index],
                        ]);
                        // Store the ID of the created miscellaneous item
                        $miscellaneousIds[] = $miscellaneousItem->id;
                    }
                }
            }

            // Optionally, you can store the IDs in the booking if needed
            $booking->miscellaneous = implode(',', $miscellaneousIds);
            $booking->save();
        });

        // Redirect with a success message
        return redirect()->route('services.other-vehicle')->with('success', 'Booking created successfully.');
    }

    public function editOtherVehicle($id)
    {
        $serviceBooking = OtherServiceBooking::find($id);
        if (! $serviceBooking) {
            return redirect()->back()->with('error', 'Service Booking not found.');
        }

        $timeslots      = TimeSlot::all();
        $services       = Service::all();
        $serviceJobs    = ServiceJob::all();
        // Triple protection for selectedJobIds:
        $selectedJobIds = [];
        if (!empty($serviceBooking->service_job_id)) {
            $decoded = json_decode($serviceBooking->service_job_id, true);
            $selectedJobIds = is_array($decoded) ? $decoded : [];
        }

        // Handle empty or invalid miscellaneous field
        $miscellaneousIds   = $serviceBooking->miscellaneous ? explode(',', $serviceBooking->miscellaneous) : [];
        $miscellaneousItems = $miscellaneousIds ? Miscellaneous::whereIn('id', $miscellaneousIds)->get() : collect();

        return view('backend.service-management.bookings.edit-other', compact(
            'serviceBooking',
            'timeslots',
            'services',
            'serviceJobs',
            'selectedJobIds',
            'miscellaneousItems'
        ));
    }

    public function updateOtherVehicle(Request $request, $id)
    {
        // Convert checkbox value to boolean manually
        $request->merge([
            'gst_toggle'     => $request->has('gst_toggle') ? true : false,
            'gst_percentage' => $request->has('gst_toggle') ? $request->gst_percentage : 0, // Set default value if gst_toggle is false
        ]);
        // Validate the request data
        $validatedData = $request->validate([
            'date'              => 'required|date',
            'reg_no'            => 'required',
            'time_slot_id'      => 'required|exists:time_slots,id',
            'service_job_id'    => 'nullable|array',         // Ensure service_job_id is an array
            'service_job_id.*'  => 'exists:service_jobs,id', // Ensure each ID exists in the service_jobs table
            'odometer'          => 'nullable|string',
            'service_interval'  => 'nullable|string',
            'next_service_due'  => 'nullable',
            'gst_toggle'        => 'nullable|boolean',
            'gst_percentage'    => 'nullable|numeric',
            'total'             => 'nullable|numeric',
            'misc_name'         => 'nullable|array',
            'misc_name.*'       => 'nullable|string',
            'misc_qty'          => 'nullable|array',
            'misc_qty.*'        => 'nullable|numeric',
            'misc_cost'         => 'nullable|array',
            'misc_cost.*'       => 'nullable|numeric',
            'misc_total_cost'   => 'nullable|array',
            'misc_total_cost.*' => 'nullable|numeric',
            'abn'               => 'nullable|string',
            'color'             => 'nullable|string',
            'mobile'            => 'nullable|string',
            'cust_name'         => 'nullable|string',
            'street'            => 'nullable|string',
            'state'             => 'nullable|string',
            'post_code'         => 'nullable|string',
            'make'              => 'nullable|string',
            'model'             => 'nullable|string',
            'vin'               => 'nullable|string',
            'engine_no'         => 'nullable|string',
            'purchase_date'     => 'nullable|date',
            'repair_order_no'   => 'nullable|string',
            'payment'           => 'nullable|string',
            'total_paid'        => 'nullable|string',
            'balance_due'       => 'nullable|string',
        ]);

        // Debugging: Check the validated data
        Log::info('Validated Data:', $validatedData);

        // Use a database transaction to ensure data consistency
        DB::transaction(function () use ($validatedData, $id) {
            // Find the existing ServiceBooking
            $booking = OtherServiceBooking::findOrFail($id);

            // Prepare the update data
            $updateData = [
                'date'             => $validatedData['date'],
                'time_slot_id'     => $validatedData['time_slot_id'],
                'reg_no'           => $validatedData['reg_no'],
                'odometer'         => $validatedData['odometer'],
                'service_interval' => $validatedData['service_interval'],
                'next_service_due' => $validatedData['next_service_due'],
                'gst_toggle'       => $validatedData['gst_toggle'] ?? false,
                'gst_percentage'   => $validatedData['gst_percentage'],
                'total'            => $validatedData['total'],
                'abn'              => $validatedData['abn'],
                'color'            => $validatedData['color'],
                'mobile'           => $validatedData['mobile'],
                'cust_name'        => $validatedData['cust_name'],
                'street'           => $validatedData['street'],
                'state'            => $validatedData['state'],
                'post_code'        => $validatedData['post_code'],
                'make'             => $validatedData['make'],
                'model'            => $validatedData['model'],
                'vin'              => $validatedData['vin'],
                'engine_no'        => $validatedData['engine_no'],
                'purchase_date'    => $validatedData['purchase_date'],
                'repair_order_no'  => $validatedData['repair_order_no'],
                'payment'          => $validatedData['payment'],
                'total_paid'       => $validatedData['total_paid'],
                'balance_due'      => $validatedData['balance_due'],
            ];

            // Handle service_job_id - check if it exists and is an array
            if (isset($validatedData['service_job_id']) && is_array($validatedData['service_job_id'])) {
                $updateData['service_job_id'] = json_encode($validatedData['service_job_id']);
            } else {
                $updateData['service_job_id'] = null;
            }

            // Update the ServiceBooking
            $booking->update($updateData);

            // Handle miscellaneous items
            $miscellaneousIds = [];
            if (! empty($validatedData['misc_name'])) {
                foreach ($validatedData['misc_name'] as $index => $name) {
                    if (! empty($name) && isset($validatedData['misc_cost'][$index])) {
                        if (isset($validatedData['misc_id'][$index])) {
                            // Update existing miscellaneous item
                            $miscellaneousItem = Miscellaneous::find($validatedData['misc_id'][$index]);
                            $miscellaneousItem->update([
                                'name'        => $name,
                                'quantity'    => $validatedData['misc_qty'][$index],
                                'price'       => $validatedData['misc_cost'][$index],
                                'total_price' => $validatedData['misc_total_cost'][$index],
                            ]);
                        } else {
                            // Create new miscellaneous item
                            $miscellaneousItem = Miscellaneous::create([
                                'name'        => $name,
                                'quantity'    => $validatedData['misc_qty'][$index],
                                'price'       => $validatedData['misc_cost'][$index],
                                'total_price' => $validatedData['misc_total_cost'][$index],
                            ]);
                        }
                        $miscellaneousIds[] = $miscellaneousItem->id;
                    }
                }
            }

            // Delete old miscellaneous items that are not in the new list
            $oldMiscellaneousIds = explode(',', $booking->miscellaneous);
            $idsToDelete         = array_diff($oldMiscellaneousIds, $miscellaneousIds);
            Miscellaneous::destroy($idsToDelete);

            // Update miscellaneous IDs in the booking
            $booking->miscellaneous = implode(',', $miscellaneousIds);
            $booking->save();
        });

        // Redirect with a success message
        return redirect()->route('services.other-vehicle')->with('success', 'Booking updated successfully.');
    }

    public function destroyOtherVehicle($id)
    {
        $serviceBooking = OtherServiceBooking::find($id);
        if (! $serviceBooking) {
            return redirect()->back()->with('error', 'Service Booking not found.');
        }

        $serviceBooking->delete();

        return redirect()->route('services.company-vehicle')->with('success', 'Service Booking deleted successfully.');
    }
    // when i select the dates in the bookings it will get the days and according to that it will display timeslots in store form
    public function getTimeSlots(Request $request)
    {
        $date      = $request->input('date');
        $dayOfWeek = \Carbon\Carbon::parse($date)->format('l');

        $type = in_array($dayOfWeek, ['Saturday', 'Sunday']) ? 'weekends' : 'weekdays';

        // Log the type for debugging
        Log::info("Selected Date: $date, Day: $dayOfWeek, Type: $type");

        $timeSlots = TimeSlot::whereIn('days', [$type, 'both'])->get();

        // Log the retrieved time slots
        Log::info("Time Slots Found: " . $timeSlots->count());

        return response()->json($timeSlots);
    }

    // when i select the dates in the bookings it will get the days and according to that it will display timeslots in edit form page
    public function getTimeSlotsEdit(Request $request)
    {
        $date      = $request->input('date');
        $dayOfWeek = \Carbon\Carbon::parse($date)->format('l');

        // Determine if the selected date is a weekend or weekday
        $type = in_array($dayOfWeek, ['Saturday', 'Sunday']) ? 'weekends' : 'weekdays';

        // Fetch time slots based on the day type
        $timeSlots = TimeSlot::whereIn('days', [$type, 'both'])->get();

        return response()->json($timeSlots);
    }

    public function companyInvoicePage(Request $request)
    {
        // Get the per_page value from the request or set a default
        $perPage = $request->input('per_page', 10); // Default to 10 if not provided
        $sortOrder = $request->input('sort_order', 'asc');

        // Validate and sanitize sort order
        $sortOrder = in_array(strtolower($sortOrder), ['asc', 'desc']) ? strtolower($sortOrder) : 'asc';

        // Start Query with Relationships
        $query = ServiceBooking::with(['vehicle'])->orderBy('repair_order_no', $sortOrder);

        // Apply search filter if search term is provided
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('repair_order_no', 'LIKE', "%{$request->search}%")
                    ->orWhereHas('vehicle', function ($q) use ($request) {
                        $q->where('reg_no', 'LIKE', "%{$request->search}%");
                    });
            });
        }

        // Apply date range filter if both start_date and end_date are provided
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        // Fetch all records if 'all' is selected, otherwise paginate
        if ($perPage === 'all') {
            $serviceBooking = $query->get(); // Fetch all records as a collection
        } else {
            $perPage = is_numeric($perPage) && $perPage > 0 ? (int) $perPage : 10; // Ensure $perPage is a valid number
            $serviceBooking = $query->paginate($perPage);
        }

        // Fetch other necessary data
        $vehicle     = VehicleDetail::all();
        $timeslots   = TimeSlot::all();
        $services    = Service::all();
        $serviceJobs = ServiceJob::all();

        // Prepare an array to hold miscellaneous items for each booking
        $miscellaneousItems = [];
        foreach ($serviceBooking as $booking) {
            $miscellaneousIds = !empty($booking->miscellaneous) ? explode(',', $booking->miscellaneous) : [];
            $miscellaneousItems[$booking->id] = !empty($miscellaneousIds) ? Miscellaneous::whereIn('id', $miscellaneousIds)->get() : collect();
        }

        return view('backend.invoice-management.company-invoice', compact(
            'serviceBooking',
            'sortOrder',
            'vehicle',
            'timeslots',
            'services',
            'serviceJobs',
            'miscellaneousItems',
            'perPage'
        ));
    }

    public function shareCompanyInvoice(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $serviceBooking = ServiceBooking::with([
            'vehicle',
            'timeSlot',
        ])->findOrFail($id);

        // Convert "miscellaneous" to an array (same as in companyInvoice)
        $miscellaneousIds = array_map('trim', explode(',', trim($serviceBooking->miscellaneous, '"')));

        // Fetch miscellaneous items manually
        $miscellaneousItems = Miscellaneous::whereIn('id', $miscellaneousIds)->get();

        $serviceJobs = ServiceJob::with('service')
            ->whereIn('id', json_decode($serviceBooking->service_job_id, true))
            ->get();

        // Generate PDF with all required data
        $pdf = PDF::loadView('backend.service-management.bookings.invoice.invoice', [
            'serviceBooking' => $serviceBooking,
            'serviceJobs' => $serviceJobs,
            'miscellaneousItems' => $miscellaneousItems,
        ]);

        // Send email
        Mail::send('emails.company-invoice', [
            'serviceBooking' => $serviceBooking,
            'serviceJobs' => $serviceJobs,
            'miscellaneousItems' => $miscellaneousItems,
        ], function ($message) use ($serviceBooking, $pdf, $request) {
            $message->to($request->email)
                ->subject('Invoice #' . $serviceBooking->repair_order_no)
                ->attachData($pdf->output(), 'invoice_' . $serviceBooking->repair_order_no . '.pdf');
        });

        return redirect()->back()->with('success', 'Invoice sent successfully!');
    }

    public function otherInvoicePage(Request $request)
    {
        // Get the per_page value from the request or set a default
        $perPage = $request->input('per_page', 10); // Default to 10 if not provided
        $sortOrder = $request->input('sort_order', 'asc');

        // Ensure sort_order is only 'asc' or 'desc'
        if (!in_array($sortOrder, ['asc', 'desc'])) {
            $sortOrder = 'asc'; // Default to ascending if an invalid value is passed
        }

        // Start Query with Relationships
        $query = OtherServiceBooking::query();

        // Check if any filter is applied
        $hasSearch    = $request->has('search') && !empty($request->search);
        $hasStartDate = $request->has('start_date') && !empty($request->start_date);
        $hasEndDate   = $request->has('end_date') && !empty($request->end_date);

        // Apply search filter if search term is provided
        if ($hasSearch) {
            $query->where(function ($q) use ($request) {
                $q->where('reg_no', 'LIKE', "%{$request->search}%")
                    ->orWhere('repair_order_no', 'LIKE', "%{$request->search}%");
            });
        }

        // Apply date range filter if both start_date and end_date are provided
        if ($hasStartDate && $hasEndDate) {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        // Apply sorting correctly
        $query->orderBy('repair_order_no', $sortOrder);

        // Fetch all records if 'all' is selected, otherwise paginate
        if ($perPage === 'all') {
            $serviceBooking = $query->get(); // Fetch all records as a collection
        } else {
            $perPage = (int) $perPage; // Ensure $perPage is an integer
            $serviceBooking = $query->paginate($perPage); // Paginate with the provided per_page value
        }

        $timeslots   = TimeSlot::all();
        $services    = Service::all();
        $serviceJobs = ServiceJob::all();

        // Prepare an array to hold miscellaneous items for each booking
        $miscellaneousItems = [];
        foreach ($serviceBooking as $booking) {
            $miscellaneousIds = explode(',', $booking->miscellaneous);
            $miscellaneousItems[$booking->id] = Miscellaneous::whereIn('id', $miscellaneousIds)->get();
        }

        return view('backend.invoice-management.other-invoice', compact(
            'serviceBooking',
            'sortOrder',
            'timeslots',
            'services',
            'serviceJobs',
            'miscellaneousItems',
            'perPage'
        ));
    }

    public function shareOtherInvoice(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $serviceBooking = OtherServiceBooking::with([
            'timeSlot',
        ])->findOrFail($id);

        // Convert "miscellaneous" to an array (same as in companyInvoice)
        $miscellaneousIds = array_map('trim', explode(',', trim($serviceBooking->miscellaneous, '"')));

        // Fetch miscellaneous items manually
        $miscellaneousItems = Miscellaneous::whereIn('id', $miscellaneousIds)->get();

        $serviceJobs = ServiceJob::with('service')
            ->whereIn('id', json_decode($serviceBooking->service_job_id, true))
            ->get();

        // Generate PDF with all required data
        $pdf = PDF::loadView('backend.service-management.bookings.invoice.invoice', [
            'serviceBooking' => $serviceBooking,
            'serviceJobs' => $serviceJobs,
            'miscellaneousItems' => $miscellaneousItems,
        ]);

        // Send email
        Mail::send('emails.company-invoice', [
            'serviceBooking' => $serviceBooking,
            'serviceJobs' => $serviceJobs,
            'miscellaneousItems' => $miscellaneousItems,
        ], function ($message) use ($serviceBooking, $pdf, $request) {
            $message->to($request->email)
                ->subject('Invoice #' . $serviceBooking->repair_order_no)
                ->attachData($pdf->output(), 'invoice_' . $serviceBooking->repair_order_no . '.pdf');
        });

        return redirect()->back()->with('success', 'Invoice sent successfully!');
    }
}
