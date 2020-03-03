<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class GeneralSpecialization extends Model
{
    protected $table = "general_specializations";
    
    // Get departments depend on local language .
    public function getGeneralSpecializations(){
        return GeneralSpecialization::all();
    }
}
