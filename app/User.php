<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Model\User\RegisterScholarship;

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
    public function role()
    {
        return $this->belongsTo('App\Model\Admin\Role');
    }

    public function qualification()
    {
        return $this->belongsTo('App\Model\User\Qualification');
    }

    public function highestQualification()
    {
        return $this->belongsTo('App\Model\User\Qualification', 'highest_qualification_id');
    }

    public function graduationCountry()
    {
        return $this->belongsTo('App\Model\User\Country', 'graduation_country_id');
    }

    public function graduationUniversity()
    {
        return $this->belongsTo('App\Model\User\University', 'graduation_university_id');
    }

    public function graduationCollege()
    {
        return $this->belongsTo('App\Model\User\College', 'graduation_college_id');
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
        return $this->belongsTo('App\Model\User\gender');
    }

    public function college()
    {
        return $this->belongsTo('App\Model\User\College');
    }

    public function nationality()
    {
        return $this->belongsTo('App\Model\User\Nationality');
    }

    public function department()
    {
        return $this->belongsTo('App\Model\User\Department');
    }

    public function fellowship()
    {
        return $this->belongsTo('App\Model\User\Fellowship');
    }

    public function generalSpecialization()
    {
        return $this->belongsTo('App\Model\User\GeneralSpecialization');
    }

    public function jobDescription()
    {
        return $this->belongsTo('App\Model\User\JobDescription');
    }

    public function registerScholarships()
    {
        return $this->hasMany('App\Model\User\RegisterScholarship');
    }

    public function cancelscholarships()
    {
        return $this->hasMany('App\Model\User\CancelScholarship');
    }

    public function changeFellowshipScholarships()
    {
        return $this->hasMany('App\Model\User\ChangeFellowshipScholarship');
    }

    public function changeSupervisorScholarships()
    {
        return $this->hasMany('App\Model\User\ChangeSupervisorScholarship');
    }

    public function extendScholarships()
    {
        return $this->hasMany('App\Model\User\ExtendScholarship');
    }
    
    public static function areFieldEmpty()
    {
        $user = User::where('id', Auth::id())->firstOrFail();
        if(is_null($user->first_name) || is_null($user->second_name) || is_null($user->third_name) || is_null($user->fourth_name) || is_null($user->birthdate) || is_null($user->phone) || is_null($user->telephone) || is_null($user->national_number) || is_null($user->employee_number) || is_null($user->date_of_joining_the_university) || is_null($user->highest_qualification_id) || is_null($user->gender_id) || is_null($user->nationality_id)|| is_null($user->highest_qualification_id) || is_null($user->graduation_country_id) || is_null($user->graduation_university_id) || is_null($user->graduation_college_id) || is_null($user->department_id) || is_null($user->job_description_id) || is_null($user->general_specialization_id) || is_null($user->fellowship_id))
        {
            return true;
        }
    }
    public static function isAdmin()
    {
        if (!Auth::check())
        {
            return redirect('login');
        }
        else 
        {
            $user = User::select('role_id')->where('id', Auth::id())->firstOrFail();
            if($user->role_id == 1)
            {
                return true;
            }
            else
            {
                return false;    
            }
        }
    }
    
    public static function isBanned()
    {
        if (!Auth::check())
        {
            return redirect('login');
        }
        else 
        {
            $user = User::select('is_banned')->where('id', Auth::id())->firstOrFail();
            if($user->is_banned == 1)
            {
                return true;
            }
            else
            {
                return false;    
            }
        }
    }

    public static function getUsersWithDateRqeust($from_date, $to_date, $deptm){
        $users_id = [];
        $registers = DB::table('register_scholarships')->select('user_id')->join('users', 'register_scholarships.user_id', '=', 'users.id')->whereBetween('register_scholarships.created_at', [$from_date.' '.'00:00:00', $to_date.' '.'23:59:59'])->get();
        foreach($registers as $register){
            array_push($users_id, $register->user_id);
        }
        $registers = DB::table('cancel_scholarships')->select('user_id')->join('users', 'cancel_scholarships.user_id', '=', 'users.id')->whereBetween('cancel_scholarships.created_at', [$from_date.' '.'00:00:00', $to_date.' '.'23:59:59'])->get();
        foreach($registers as $register){
            array_push($users_id, $register->user_id);
        }
        $registers = DB::table('change_fellowship_scholarships')->select('user_id')->join('users', 'change_fellowship_scholarships.user_id', '=', 'users.id')->whereBetween('change_fellowship_scholarships.created_at', [$from_date.' '.'00:00:00', $to_date.' '.'23:59:59'])->get();
        foreach($registers as $register){
            array_push($users_id, $register->user_id);
        }
        $registers = DB::table('change_supervisor_scholarships')->select('user_id')->join('users', 'change_supervisor_scholarships.user_id', '=', 'users.id')->whereBetween('change_supervisor_scholarships.created_at', [$from_date.' '.'00:00:00', $to_date.' '.'23:59:59'])->get();
        foreach($registers as $register){
            array_push($users_id, $register->user_id);
        }
        $registers = DB::table('extend_scholarships')->select('user_id')->join('users', 'extend_scholarships.user_id', '=', 'users.id')->whereBetween('extend_scholarships.created_at', [$from_date.' '.'00:00:00', $to_date.' '.'23:59:59'])->get();
        foreach($registers as $register){
            array_push($users_id, $register->user_id);
        }
        if(!empty($users_id)){
            $users_id = array_unique($users_id);
            if($deptm == 'all'){
                return User::whereIn('id', $users_id)->paginate(15);
            }else{
                return User::whereIn('id', $users_id)->where('department_id', $deptm)->paginate(15);
            }
        }else{
           return [];
        }
    }
}