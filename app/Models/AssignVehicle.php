<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
// use Carbon\Carbon;

// class AssignVehicle extends Model
// {
//     protected $fillable = [
//         'reg_no',
//         'user_id',
//         'cost_per_week',
//         'rent_start_date',
//         'rent_end_date',
//         'total_days',
//         'total_price',
//         'deposit_amount',
//         'outstanding_amount',
//         'payment_method',
//         'agreement',
//         'rented',
//     ];

//     protected static function boot()
//     {
//         parent::boot();

//         static::saving(function ($assignVehicle) {
//             $assignVehicle->updateRentedStatus();

//             $vehicle = $assignVehicle->vehicle;
//             if ($vehicle) {
//                 $vehicle->updateRentedStatus();
//             }
//         });
//     }

//     public function updateRentedStatus()
//     {
//         $today = now()->toDateString();
//         if ($today >= $this->rent_start_date && $today <= $this->rent_end_date) {
//             $this->rented = 1;
//         } else {
//             $this->rented = 0;
//         }
//     }

//     public function vehicle()
//     {
//         return $this->belongsTo(VehicleDetail::class, 'reg_no', 'reg_no');
//     }

//     public function user()
//     {
//         return $this->belongsTo(User::class);
//     }
// }

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AssignVehicle extends Model
{
    protected $fillable = [
        'reg_no',
        'user_id',
        'cost_per_week',
        'rent_start_date',
        'rent_end_date',
        'total_days',
        'total_price',
        'deposit_amount',
        'outstanding_amount',
        'payment_method',
        'agreement',
        'rented',
    ];

    protected static function boot()
    {
        parent::boot();

        // Ensure rented status updates when the model is retrieved
        static::retrieved(function ($assignVehicle) {
            $assignVehicle->updateRentedStatus();
        });

        static::saving(function ($assignVehicle) {
            $assignVehicle->updateRentedStatus();
        });

        static::deleting(function ($assignVehicle) {
            if ($assignVehicle->vehicle) {
                $assignVehicle->vehicle->updateRentedStatus(0);
            }
        });
    }

    public function updateRentedStatus()
    {
        $today = now()->toDateString();
        $this->rented = ($today >= $this->rent_start_date && $today <= $this->rent_end_date) ? 1 : 0;
        $this->saveQuietly(); // Prevent infinite loops
    }

    public function getRentedAttribute($value)
    {
        $today = now()->toDateString();
        return ($today >= $this->rent_start_date && $today <= $this->rent_end_date) ? 1 : 0;
    }

    public function vehicle()
    {
        return $this->belongsTo(VehicleDetail::class, 'reg_no', 'reg_no');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
