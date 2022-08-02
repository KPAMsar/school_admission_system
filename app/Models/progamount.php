<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class progamount extends Model
{
    use HasFactory;
    protected $table = 'program_amount';
    protected $fillable = [
        'programme',
        'entry_mode',
        'amount'
    ];
}
