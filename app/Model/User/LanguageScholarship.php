<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\User;

class LanguageScholarship extends Model
{
    protected $fillable = [
        'user_id', 'country_id', 'university_id', 'college_id', 'created_by', 'created_at',
    ];

    protected $table = 'register_scholarships';

    public function getUsers(){
        return DB::table('register_scholarships')->join('users', 'users.id', '=', 'register_scholarships.user_id')->where('register_scholarships.registeration_type_id', '=', 6)->paginate(15);   
    }

    public function getUsersWithSpecificDeptm($deptm){
        return DB::table('register_scholarships')->join('users', 'users.id', '=', 'register_scholarships.user_id')->where('register_scholarships.registeration_type_id', '=', 6)->where('users.department_id', '=', $deptm)->paginate(15);   
    }

    public function getUsersWithDate($from_date, $to_date){
        return DB::table('register_scholarships')->join('users', 'users.id', '=', 'register_scholarships.user_id')->where('register_scholarships.registeration_type_id', '=', 6)->whereBetween('users.birthdate', [$from_date, $to_date])->paginate(15);   
    }
    
    public function getUsersWithSpecificDeptmAndDate($deptm, $from_date, $to_date){
        return DB::table('register_scholarships')->join('users', 'users.id', '=', 'register_scholarships.user_id')->where('register_scholarships.registeration_type_id', '=', 6)->where('users.department_id', '=', $deptm)->whereBetween('users.birthdate', [$from_date, $to_date])->paginate(15);   
    }
    
    public static function getUsersReqeustDateAndType($from_date, $to_date, $deptm){
        $users_id = DB::table('register_scholarships')->select('user_id')->join('users', 'register_scholarships.user_id', '=', 'users.id')->where('register_scholarships.registeration_type_id', '=', 6)->whereBetween('register_scholarships.created_at', [$from_date.' '.'00:00:00', $to_date.' '.'23:59:59'])->get();
        if($deptm == 'all'){
            return User::whereIn('id', $users_id)->paginate(15);
        }
        else{
            return User::whereIn('id', $users_id)->where('department_id', $deptm)->paginate(15);
        }
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
