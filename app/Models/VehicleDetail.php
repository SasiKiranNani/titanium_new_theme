<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Carbon\Carbon;

// class VehicleDetail extends Model
// {
//     use HasFactory;

//     protected $fillable = [
//         'category_id',
//         'company_name',
//         'abn',
//         'slug',
//         'reg_no',
//         'purchase_date',
//         'fuel_type',
//         'make',
//         'vin',
//         'model',
//         'engine_no',
//         'owner',
//         'color',
//         'type',
//         'odometer',
//         'transmission',
//         'reg_expiry_date',
//         'last_service_date',
//         'rented',
//         'insurance_company',
//         'insurance_number',
//         'vehicle_inspection_report_expiring_date',
//         'thumbnail',
//         'thumbnail_alt',
//         'cost_per_week',
//     ];

//     public function category()
//     {
//         return $this->belongsTo(Category::class);
//     }

//     public function user()
//     {
//         return $this->belongsTo(User::class);
//     }

//     public function assignVehicles()
//     {
//         return $this->hasMany(AssignVehicle::class, 'reg_no', 'reg_no');
//     }

//     public function isCurrentlyRented()
//     {
//         $today = Carbon::today();
//         return $this->assignVehicles()->where('rent_start_date', '<=', $today)
//             ->where('rent_end_date', '>', $today)
//             ->exists();
//     }

//     public function updateRentedStatus()
//     {
//         $this->rented = $this->isCurrentlyRented() ? 1 : 0;
//         $this->save();
//     }
// }

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VehicleDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'company_name',
        'abn',
        'slug',
        'reg_no',
        'purchase_date',
        'fuel_type',
        'make',
        'vin',
        'model',
        'battery_size',
        'engine_no',
        'owner',
        'color',
        'type',
        'odometer',
        'transmission',
        'reg_expiry_date',
        'last_service_date',
        'rented',
        'insurance_company',
        'insurance_number',
        'vehicle_inspection_report_expiring_date',
        'thumbnail',
        'thumbnail_alt',
        'cost_per_week',
        'notes',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assignVehicles()
    {
        return $this->hasMany(AssignVehicle::class, 'reg_no', 'reg_no');
    }

    public function vehicleFiles()
    {
        return $this->hasMany(VehicleFile::class);
    }

    public function updateRentedStatus()
    {
        $this->rented = $this->assignVehicles()->where('rented', 1)->exists() ? 1 : 0;
        $this->saveQuietly(); // Prevent infinite loops
    }
}
