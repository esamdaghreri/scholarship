<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class ChangeFellowshipScholarship extends Model
{
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'other_reason', 'register_scholarship_id', 'status_id', 'scholarship_reason_id', 'fellowship_id', 'registeration_type_id', 'created_by', 'created_at',
    ];

    protected $table = 'change_fellowship_scholarships';

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function fellowship()
    {
        return $this->belongsTo('App\Model\User\Fellowship');
    }

    public function status()
    {
        return $this->belongsTo('App\Model\User\Status');
    }

    public function registerationType()
    {
        return $this->belongsTo('App\Model\User\RegisterationType');
    }

    public function scholarshipReason()
    {
        return $this->belongsTo('App\Model\User\ScholarshipReason');
    }

    public function registerScholarship()
    {
        return $this->belongsTo('App\Model\User\RegisterScholarship');
    }

    public function files()
    {
        return $this->hasMany('App\Model\User\File');
    }
}
