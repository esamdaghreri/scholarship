<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    protected $table = "qualifications";
    
    // Get qualifications depend on local language .
    public function getQualifications(){
        return Qualification::all();
    }
}
