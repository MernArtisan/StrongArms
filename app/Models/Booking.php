<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function provider()
    {
        return $this->belongsTo(provider_detail::class); // or User::class if providers are also users
    }

    public function service()
    {
        return $this->belongsTo(service::class);
    }

      public function availability()
    {
        return $this->belongsTo(Availability::class);
    }
}
