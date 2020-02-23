<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    protected $table = "specialists";
    
    // Get qualifications depend on local language .
    public function getSpecialists($languages_code){
        if($languages_code == 'ar'){
            return Specialist::select('id','name_ar')->get();
        }
        if($languages_code == 'en'){
            return Specialist::select('id','name_en')->get();
        }
    }
}
