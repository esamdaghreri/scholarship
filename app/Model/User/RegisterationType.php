<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class RegisterationType extends Model
{
    protected $table = "registeration_types";
    
    // Get qualifications depend on local language .
    public function getRegisterationTypes($languages_code){
        if($languages_code == 'ar'){
            return RegisterationType::select('id','name_ar')->get();
        }
        if($languages_code == 'en'){
            return RegisterationType::select('id','name_en')->get();
        }
    }
}
