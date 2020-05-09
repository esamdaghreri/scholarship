<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\User;

class RegisterScholarship extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'country_id', 'university_id', 'college_id', 'qualification_id', 'fellowship_id', 'registeration_type_id', 'created_by', 'created_at', 'updated_by', 'updated_at',
    ];

    protected $table = 'register_scholarships';

    public function getUsers(){
        return DB::table('register_scholarships')->join('users', 'users.id', '=', 'register_scholarships.user_id')->paginate(15);   
    }

    public function getUsersWithSpecificDeptm($deptm){
        return DB::table('register_scholarships')->join('users', 'users.id', '=', 'register_scholarships.user_id')->where('users.department_id', '=', $deptm)->paginate(15);   
    }
    
    public function getUsersWithDate($from_date, $to_date){
        return DB::table('register_scholarships')->join('users', 'users.id', '=', 'register_scholarships.user_id')->whereBetween('users.birthdate', [$from_date, $to_date])->paginate(15);   
    }
    
    public function getUsersWithSpecificDeptmAndDate($deptm, $from_date, $to_date){
        return DB::table('register_scholarships')->join('users', 'users.id', '=', 'register_scholarships.user_id')->where('users.department_id', '=', $deptm)->whereBetween('users.birthdate', [$from_date, $to_date])->paginate(15);   
    }
    
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

    public function files()
    {
        return $this->hasMany('App\Model\User\File');
    }
}
