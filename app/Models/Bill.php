<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'total',
        'invoice_id',
        'receipt_id',
        'status',
        'paid_at',
        'student_id',
    ];
}
