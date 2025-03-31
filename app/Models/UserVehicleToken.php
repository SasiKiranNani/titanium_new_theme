<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVehicleToken extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'vehicle_id', 'token', 'expires_at', 'rent_start_date', 'rent_end_date', 'cost_per_week', 'odometer', 'total_days', 'total_price', 'deposit_amount'];

    public function isExpired()
    {
        return Carbon::now()->greaterThan($this->expires_at);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(VehicleDetail::class);
    }
}
