<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class biodata extends Model
{
    use HasFactory;
    protected $table = 'applicants_bio_data';
    protected $fillable =[
            'address_1',
            'city_1 ',
           ' address_2',
            'city_2',
            'country_of_residence',
            'state_of_residence',
            'lga_of_residence',
            'country_of_origin', 
            'state_of_origin',
            'lga_of_origin', 
            'dob_day ',
            'dob_month ',
            'dob_year ',
            'nok_first_name', 
            'nok_last_name ',
            'nok_address', 
            'nok_city',
            'nok_country_of_residence ',
            'nok_state_of_residence' ,
            'nok_lga_of_residence' ,
            'nok_phone_number',
            'nok_email',
    ];
}
