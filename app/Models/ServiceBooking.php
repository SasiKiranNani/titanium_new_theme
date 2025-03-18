<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceBooking extends Model
{
    use HasFactory;

    protected $table = 'service_bookings';

    protected $fillable = [
        'date',
        'time_slot_id',
        'vehicle_id',
        'odometer',
        'service_interval',
        'next_service_due',
        'service_id',
        'service_job_id',
        'miscellaneous',
        'gst_toggle',
        'gst_percentage',
        'total',
        'abn',
        'repair_order_no',
        'color',
        'mobile',
        'cust_name',
        'street',
        'state',
        'post_code',
        'make',
        'model',
        'vin',
        'purchase_date',
        'engine_no',
        'payment',
        'total_paid',
        'balance_due',
    ];

    protected $casts = [
        'service_job_id' => 'array', // Cast JSON to array
        'miscellaneous' => 'array',
    ];

    // Define the relationship with VehicleDetail
    public function vehicle()
    {
        return $this->belongsTo(VehicleDetail::class, 'vehicle_id');
    }

    // Define the relationship with ServiceSubcategory
    public function serviceJobs()
    {
        return $this->hasMany(ServiceJob::class, 'id', 'service_job_id');
    }

    // Define the relationship with TimeSlot
    public function timeSlot()
    {
        return $this->belongsTo(TimeSlot::class, 'time_slot_id');
    }

    // public function miscellaneousItems()
    // {
    //     return $this->hasMany(Miscellaneous::class, 'booking_id');
    // }

    public function miscellaneousItems()
    {
        return $this->hasMany(Miscellaneous::class, 'id', 'miscellaneous');
    }
}
