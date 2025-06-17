<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    protected $fillable = [
        'provider_id',
        'service_id',
        'date',
        'time_slot',
        'status'
    ];


    public function provider()
    {
        return $this->belongsTo(provider_detail::class);
    }

    public function service()
    {
        return $this->belongsTo(service::class);
    }
}
