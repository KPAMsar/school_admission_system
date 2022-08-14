<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationSubjects extends Model
{
    use HasFactory;
    protected $table = 'application_subjects';
    protected $fillable = [
        'name',
        'status'
    ];
}
