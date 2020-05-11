<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\User;

class CancelScholarship extends Model
{
    protected $table = "cancel_scholarships";

    public function getUsers(){
        return DB::table('cancel_scholarships')->join('users', 'users.id', '=', 'cancel_scholarships.user_id')->paginate(15);   
    }

    public function getUsersWithSpecificDeptm($deptm){
        return DB::table('cancel_scholarships')->join('users', 'users.id', '=', 'cancel_scholarships.user_id')->where('users.department_id', '=', $deptm)->paginate(15);   
    }

    public function getUsersWithDate($from_date, $to_date){
        return DB::table('cancel_scholarships')->join('users', 'users.id', '=', 'cancel_scholarships.user_id')->whereBetween('users.birthdate', [$from_date, $to_date])->paginate(15);   
    }
    
    public function getUsersWithSpecificDeptmAndDate($deptm, $from_date, $to_date){
        return DB::table('cancel_scholarships')->join('users', 'users.id', '=', 'cancel_scholarships.user_id')->where('users.department_id', '=', $deptm)->whereBetween('users.birthdate', [$from_date, $to_date])->paginate(15);   
    }

    public static function getUsersReqeustDateAndType($from_date, $to_date, $deptm){
        $users_id = CancelScholarship::select('user_id')->join('users', 'cancel_scholarships.user_id', '=', 'users.id')->whereBetween('cancel_scholarships.created_at', [$from_date.' '.'00:00:00', $to_date.' '.'23:59:59'])->get();
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
