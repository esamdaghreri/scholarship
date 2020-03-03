<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = "countries";
    
    // Get Country depend on local language .
    public function getCountries(){
        return Country::all();
    }
}
