<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'username', 'password', 'created_by', 'created_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = "users";

    // Mutator
    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }
    public function getSecondNameAttribute($value)
    {
        return ucfirst($value);
    }
    public function getThirdNameAttribute($value)
    {
        return ucfirst($value);
    }
    public function getFourthNameAttribute($value)
    {
        return ucfirst($value);
    }

   /**
     * Relations to get the (gender ,country, university, college) associated with the user.
     */
    public function qualification()
    {
        return $this->belongsTo('App\Model\User\Qualification');
    }

    public function gender()
    {
        return $this->belongsTo('App\Model\User\Gender');
    }

    public function country()
    {
        return $this->belongsTo('App\Model\User\Country');
    }

    public function university()
    {
        return $this->belongsTo('App\Model\User\Uender');
    }

    public function college()
    {
        return $this->belongsTo('App\Model\User\College');
    }
    public function orderScholarships()
    {
        return $this->hasMany('App\Model\User\OrderScholarship');
    }
    public static function areFieldEmpty(){
        $user = User::where('id', Auth::id())->firstOrFail();
        if(is_null($user->first_name) || is_null($user->second_name) || is_null($user->third_name) || is_null($user->fourth_name) || is_null($user->phone) || is_null($user->telephone) || is_null($user->national_number) || is_null($user->save_number) || is_null($user->release_date) || is_null($user->expiry_date) || is_null($user->highest_qualification) || is_null($user->gender_id) || is_null($user->graduation_country_id) || is_null($user->graduation_university_id) || is_null($user->graduation_college_id))
        {
            return true;
        }
    }

}
