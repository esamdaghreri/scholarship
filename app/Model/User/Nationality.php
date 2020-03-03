<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    protected $table = "nationalities";

    // Get nationonalities depend on local language .
    public function getNationalities($languages_code){
        if($languages_code == 'ar'){
            return Nationality::select('id','name_ar')->get();
        }
        if($languages_code == 'en'){
            return Nationality::select('id','name_en')->get();
        }
    }
}
