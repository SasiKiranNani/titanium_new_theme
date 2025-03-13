<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceJob extends Model
{
    protected $table = 'service_jobs';

    protected $fillable = [
        'service_id',
        'name',
        'price',
        'description',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
