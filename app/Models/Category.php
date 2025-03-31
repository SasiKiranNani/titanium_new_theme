<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Category extends Model
{
    use HasRoles;

    protected $fillable = ['name', 'slug'];

    public function vehicleDetails()
    {
        return $this->hasMany(VehicleDetail::class);
    }
}
