<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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

   /**
     * Relations to get the (gender, qualifications ,country, university, college) associated with the user.
     */
    public function qualifications()
    {
        return $this->belongsToMany('App\Model\User\Qualification');
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

}
