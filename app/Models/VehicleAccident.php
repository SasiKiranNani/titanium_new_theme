<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleAccident extends Model
{
    protected $table = 'vehicle_accidents';

    protected $fillable = [
        'vehicle_id',
        'accident_date',
        'insurance_ref',
        'description',
    ];

    public function vehicle()
    {
        return $this->belongsTo(VehicleDetail::class, 'vehicle_id');
    }

    public function files()
    {
        return $this->hasMany(VehicleAccidentFile::class, 'vehicle_accident_id');
    }
}
