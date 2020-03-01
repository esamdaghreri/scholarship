<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class ScholarshipReasons extends Model
{
    protected $table = "scholarship_reasons";
    
    // Get scholarship reasons of cancel.
    public static function getCancelScholarshipReasons(){
        return ScholarshipReasons::where('cancel', 1)->get();
    }
}
