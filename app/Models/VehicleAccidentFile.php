<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleAccidentFile extends Model
{
    protected $table = 'vehicle_accident_files';

    protected $fillable = [
        'vehicle_accident_id',
        'file',
    ];

    public function vehicleAccident()
    {
        return $this->belongsTo(VehicleAccident::class);
    }
}
