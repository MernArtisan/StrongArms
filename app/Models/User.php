<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
 
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'website',
        'company_name',
        'address_line',
        'country',
        'state',
        'city',
        'zip',
        'gender',
        'image',
        'status'
    ];
 
    protected $hidden = [
        'password',
        'remember_token',
    ];
 
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function services()
    {
        return $this->hasMany(Service::class,'added_by');
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class,'added_by');
    }

    
}
