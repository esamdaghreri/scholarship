<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $table = "universities";

    // Get universities depend on local language .
    public function getUniversities(){
        return University::all();
    }
}
