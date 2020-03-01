<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class CancelScholarship extends Model
{
    protected $table = "cancle_scholarships";

    public function scholarshipReason()
    {
        return $this->belongsTo('App\Model\User\ScholarshipReasons');
    }
}
