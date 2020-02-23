<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    protected $table = "qualifications";
    
    // Get qualifications depend on local language .
    public function getQualifications($languages_code){
        if($languages_code == 'ar'){
            return Qualification::select('id','name_ar')->get();
        }
        if($languages_code == 'en'){
            return Qualification::select('id','name_en')->get();
        }
    }
}
