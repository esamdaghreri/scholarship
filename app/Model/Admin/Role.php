<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";

    // Get colleges depend on local language .
    public function getRoles(){
        return Role::all();
    }
}
