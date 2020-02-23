<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $table = "universities";

    // Get universities depend on local language .
    public function getUniversities($languages_code){
        if($languages_code == 'ar'){
            return University::select('id','name_ar')->get();
        }
        if($languages_code == 'en'){
            return University::select('id','name_en')->get();
        }
    }
}
