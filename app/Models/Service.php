<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'name',
        'description',
    ];

    public function serviceJobs()
    {
        return $this->hasMany(ServiceJob::class);
    }
}
