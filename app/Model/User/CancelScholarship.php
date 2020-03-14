<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class CancelScholarship extends Model
{
    protected $table = "cancle_scholarships";

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function registerScholarship()
    {
        return $this->belongsTo('App\Model\User\RegisterScholarship');
    }

    public function scholarshipReason()
    {
        return $this->belongsTo('App\Model\User\ScholarshipReason');
    }

    public function status()
    {
        return $this->belongsTo('App\Model\User\Status');
    }

    public function registerationType()
    {
        return $this->belongsTo('App\Model\User\RegisterationType');
    }

    public function files()
    {
        return $this->hasMany('App\Model\User\File');
    }
}
