<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = "statuses";
    
    // Get Country depend on local language .
    public function getStatuses($languages_code){
        if($languages_code == 'ar'){
            return Status::select('id','name_ar')->get();
        }
        if($languages_code == 'en'){
            return Status::select('id','name_en')->get();
        }
    }
}
