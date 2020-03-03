<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    protected $table = "nationalities";

    // Get nationonalities depend on local language .
    public function getNationalities(){
        return Nationality::all();
    }
}
