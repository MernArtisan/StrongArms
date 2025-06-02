<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'type',
        'status',
        'added_by',
        'provider_id',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'added_by');
    }

    public function provider()
    {
        return $this->belongsTo(provider_detail::class, 'provider_id');
    }
}
