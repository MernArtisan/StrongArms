<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'type',
        'status',
        'added_by'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'added_by');
    }
}
