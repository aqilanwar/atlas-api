<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'email' ,
        'phone_number',
        'dob',
        'address',
        'is_admin',
        'updated_profile',
        'account_active'.
    ]
}
