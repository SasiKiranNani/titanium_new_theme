<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentalAgreement extends Model
{
    protected $fillable = [
        'user_id', 'vehicle_id', 'signature', 'pdf_path'
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(VehicleDetail::class);
    }
}
