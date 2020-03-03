<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class JobDescription extends Model
{
    protected $table = "job_descriptions";
    
    // Get departments depend on local language .
    public function getJobDescriptions(){
        return JobDescription::all();
    }
}
