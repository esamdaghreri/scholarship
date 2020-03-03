<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = "statuses";
    
    // Get Country depend on local language .
    public function getStatuses(){
        return Status::all();
    }
}
