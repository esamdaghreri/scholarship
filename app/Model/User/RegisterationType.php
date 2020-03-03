<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class RegisterationType extends Model
{
    protected $table = "registeration_types";
    
    // Get qualifications depend on local language .
    public function getRegisterationTypes(){
        return RegisterationType::all();
    }
}
