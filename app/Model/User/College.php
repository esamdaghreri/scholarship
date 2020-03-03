<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $table = "colleges";

    // Get colleges depend on local language .
    public function getColleges(){
        return College::all();
    }
}
