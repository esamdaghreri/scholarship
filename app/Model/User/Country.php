<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = "countries";
    
    // Get Country depend on local language .
    public function getCountries($languages_code){
        if($languages_code == 'ar'){
            return Country::select('id','name_ar')->get();
        }
        if($languages_code == 'en'){
            return Country::select('id','name_en')->get();
        }
    }
}
