<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class RegisterScholarship extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'country_id', 'university_id', 'college_id', 'degree_id', 'university_order', 'specialist_id', 'attachment', 'created_by', 'created_at',
    ];

    protected $table = 'register_scholarships';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function country()
    {
        return $this->belongsTo('App\Model\User\Country');
    }
    
    public function university()
    {
        return $this->belongsTo('App\Model\User\University');
    }
    
    public function college()
    {
        return $this->belongsTo('App\Model\User\College');
    }

    public function qualification()
    {
        return $this->belongsTo('App\Model\User\Qualification');
    }

    public function specialist()
    {
        return $this->belongsTo('App\Model\User\Specialist');
    }

    public function status()
    {
        return $this->belongsTo('App\Model\User\Status');
    }

    public function registerationType()
    {
        return $this->belongsTo('App\Model\User\RegisterationType');
    }
}