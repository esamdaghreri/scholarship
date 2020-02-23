<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $table = "colleges";

    // Get colleges depend on local language .
    public function getColleges($languages_code){
        if($languages_code == 'ar'){
            return College::select('id','name_ar')->get();
        }
        if($languages_code == 'en'){
            return College::select('id','name_en')->get();
        }
    }
}
