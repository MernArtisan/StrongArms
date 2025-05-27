<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    //    
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class , 'added_by');
    }
}
