<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Miscellaneous extends Model
{
    protected $table = 'miscellaneouses';

    protected $fillable = [
        'name',
        'quantity',
        'price',
        'total_price',
    ];

    // Define the relationship with ServiceBooking
    public function serviceBooking()
    {
        return $this->belongsTo(ServiceBooking::class, 'booking_id');
    }

    // Define the relationship with OtherServiceBooking
    public function otherServiceBooking()
    {
        return $this->belongsTo(OtherServiceBooking::class, 'booking_id');
    }
}
