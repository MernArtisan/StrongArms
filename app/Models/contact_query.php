<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contact_query extends Model
{
 

    protected $fillable = [
        'full_name',
        'email',
        'subject',
        'message',
    ];
}
