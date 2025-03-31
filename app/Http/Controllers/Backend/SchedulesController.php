<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TimeSlot;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class SchedulesController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:View Timeslot', only: ['timeSlots']),
            new Middleware('permission:Create Timeslot', only: ['storeTimeSlots']),
            new Middleware('permission:Edit Timeslot', only: ['updateTimeSlots']),
            new Middleware('permission:Delete Timeslot', only: ['destroyTimeSlots']),
        ];
    }

    // public function timeSlots(Request $request)
    // {
    //     $perPage = $request->input('per_page', 10);
    //     $sortOrder = $request->input('sort_order', 'asc');
    //     // Paginate the time slots
    //     $timeslots = TimeSlot::orderBy('time_slot', $sortOrder)
    //                          ->paginate($perPage === 'all' ? TimeSlot::count() : (int) $perPage);

    //     return view('backend.service-management.schedules.time-slots', compact('timeslots', 'perPage', 'sortOrder'));
    // }

    public function timeSlots(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Default to 10 items per page if not provided

        // Paginate the time slots
        $timeslots = TimeSlot::paginate($perPage === 'all' ? TimeSlot::count() : (int) $perPage);

        return view('backend.service-management.schedules.time-slots', compact('timeslots', 'perPage'));
    }

    public function storeTimeSlots(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'time_slots' => 'required|array', // Ensure time_slots is an array
            'time_slots.*' => 'string|distinct', // Each time slot must be a string and unique
            'days' => 'nullable', // Ensure days is an array
        ]);

        // Store each selected time slot in the database
        foreach ($request->time_slots as $timeSlot) {
            TimeSlot::create(['time_slot' => $timeSlot]);
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Time slots created successfully!');
    }

    public function updateTimeSlots($id, Request $request)
    {
        $timeSlot = TimeSlot::findOrFail($id);
        $request->validate([
            'time_slot' => 'required|string',
            'days' => 'nullable',
        ]);

        $timeSlot->update($request->all());

        return redirect()->back()->with('success', 'Time Slot Updated Successfully');
    }

    public function destroyTimeSlots($id)
    {
        TimeSlot::find($id)->delete();

        return redirect()->back()->with('success', 'Time Slot Deleted Successfully');
    }
}
