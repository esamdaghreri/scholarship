<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class LanguageScholarship extends Model
{
    protected $fillable = [
        'user_id', 'country_id', 'university_id', 'college_id', 'created_by', 'created_at',
    ];

    protected $table = 'language_scholarships';

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

    public function status()
    {
        return $this->belongsTo('App\Model\User\Status');
    }

    public function registerationType()
    {
        return $this->belongsTo('App\Model\User\RegisterationType');
    }
}
