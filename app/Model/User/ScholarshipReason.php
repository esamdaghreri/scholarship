<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class ScholarshipReason extends Model
{
    protected $table = "scholarship_reasons";
    
    // Get scholarship reasons of cancel.
    public static function getCancelScholarshipReasons(){
        return ScholarshipReason::where('cancel', 1)->get();
    }

    // Get scholarship reasons of cancel.
    public static function getExtendScholarshipReasons(){
        return ScholarshipReason::where('extend', 1)->get();
    }
}
