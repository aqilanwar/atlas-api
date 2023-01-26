<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
    use HasFactory;
    protected $guard = 'staff' ;
    
    protected $fillable = [
        'name',
        'email' ,
        'password',
        'phone_number',
        'dob',
        'address',
        'is_admin',
        'updated_profile',
        'account_active',
    ];

    protected $guarded = ['id'];
    
    protected $hidden = [
        'password', 
        'remember_token',
    ];
    public function getAuthPassword()
    {
        return $this->password;
    }
}
