<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transation extends Model
{
    use HasFactory;
    protected $table = 'payment';
    protected $fillable = [
        'user',
        'payment_method',
        'reference',
        'payment_type',
        'status',
        
    ];
}
