<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationDetail extends Model
{
    use HasFactory;
    protected $table='application_details';
    protected $guarded=[];

    public function getFirstChoice(){
        return $this->belongsTo(ApplicationPrograms::class, 'first_choice');
    }

    public function getSecondChoice(){
        return $this->belongsTo(ApplicationPrograms::class, 'second_choice');
    }

    public function getNCEFirstChoice(){
        return $this->belongsTo(NCECourseCombination::class, 'first_choice');
    }

    public function getNCESecondChoice(){
        return $this->belongsTo(NCECourseCombination::class, 'second_choice');
    }

    public function getSchool(){
        return $this->belongsTo(AffiliateSchool::class, 'school', 'code');
    }

    public function getOLevel(){
        return $this->hasMany(ApplicationOLevelResult::class, 'application_id', 'id');
    }
}
