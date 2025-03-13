<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuthorisedDriver extends Model
{
    protected $fillable = [
        'user_id', // Add user_id to fillable
        'authorised_driver_name',
        'authorised_driver_dob',
        'authorised_driver_address',
        'authorised_driver_license_no',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
