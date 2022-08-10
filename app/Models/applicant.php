<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applicant extends Model
{
    use HasFactory;
    protected $table="applicant";
    protected $guarded = [];

    public function getBioData(){
        return $this->belongsTo(ApplicantBioData::class, 'application_number', 'application_number');
    }

    public function getApplication(){
        return $this->belongsTo(ApplicationDetail::class, 'application_number', 'application_number');
    }

    public function studyTime(){
        return $this->belongsTo(StudyTime::class, 'study_time');
    }

    public function getPayment(){
        return $this->belongsTo(ApplicationPayment::class, 'application_number', 'application_number');
    }
}
