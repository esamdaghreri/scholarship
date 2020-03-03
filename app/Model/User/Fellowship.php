<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Fellowship extends Model
{
    protected $table = "fellowships";
    
    // Get fellowships depend on local language .
    public function getFellowships(){
        return Fellowship::all();
    }
}
