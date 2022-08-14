<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationOLevelResult extends Model
{
    use HasFactory;
    protected $table='olevel_result';
    protected $guarded =[];
    
    public function getSubject(){
        return $this->belongsTo(ApplicationSubjects::class, 'subject');
    }
}
