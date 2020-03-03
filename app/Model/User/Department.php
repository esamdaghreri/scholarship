<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = "departments";
    
    // Get departments depend on local language .
    public function getDepartments(){
        return Department::all();
    }
}
