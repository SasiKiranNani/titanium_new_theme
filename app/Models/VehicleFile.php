<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_detail_id',
        'file_path',
        'file_name',
    ];

    public function vehicleDetail()
    {
        return $this->belongsTo(VehicleDetail::class);
    }
}
