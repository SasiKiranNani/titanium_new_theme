<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtherServiceBooking extends Model
{
    protected $table = 'other_service_bookings';

    protected $fillable = [
        'date',
        'time_slot_id',
        'reg_no',
        'odometer',
        'service_interval',
        'next_service_due',
        'service_id',
        'service_job_id',
        'miscellaneous',
        'gst_toggle',
        'gst_percentage',
        'total',
        'payment',
        'total_paid',
        'balance_due',
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
    ];

    protected $casts = [
        'service_job_id' => 'array', // Cast JSON to array
    ];

    // Define the relationship with ServiceSubcategory
    public function serviceJob()
    {
        return $this->belongsTo(ServiceJob::class, 'service_job_id');
    }

    // Define the relationship with TimeSlot
    public function timeSlot()
    {
        return $this->belongsTo(TimeSlot::class, 'time_slot_id');
    }

    public function miscellaneousItems()
    {
        return $this->hasMany(Miscellaneous::class, 'booking_id');
    }
}
