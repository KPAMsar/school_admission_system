<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class programs extends Model
{
    use HasFactory;
    protected $table = 'application_program';
    protected $fillable = [
        'degree_awarded',
        'course',
        'department',
        'faculty',
        'status',
        'duration',
        'affliation'
    ];
}
