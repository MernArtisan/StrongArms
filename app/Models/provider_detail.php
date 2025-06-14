<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class provider_detail extends Model
{

    protected $fillable = [
        'user_id',
        'logo',
        'store_name',
        'lat',
        'long',
        'store_location',
        'established_year',
        'owner_name',
        'email',
        'password',
        'phone_number',
        'zip_code',
        'country',
        'state',
        'city',
        'status',
        'store_description',
        'website',
        'provider_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
