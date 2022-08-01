<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applicant extends Model
{
    use HasFactory;
    protected $table="applicant";
    protected $fillable =[
        'programme',
        'mode_of_entry',
        'first_name',
        'last_name',
        'other_names',
        'phone',
        'application_number',
        'status',
        'session',
    ];
}
