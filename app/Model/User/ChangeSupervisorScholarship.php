<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\User;

class ChangeSupervisorScholarship extends Model
{
    protected $table = "change_supervisor_scholarships";

    public function getUsers(){
        return DB::table('change_supervisor_scholarships')->join('users', 'users.id', '=', 'change_supervisor_scholarships.user_id')->paginate(15);   
    }

    public function getUsersWithSpecificDeptm($deptm){
        return DB::table('change_supervisor_scholarships')->join('users', 'users.id', '=', 'change_supervisor_scholarships.user_id')->where('users.department_id', '=', $deptm)->paginate(15);   
    }

    public function getUsersWithDate($from_date, $to_date){
        return DB::table('change_supervisor_scholarships')->join('users', 'users.id', '=', 'change_supervisor_scholarships.user_id')->whereBetween('users.birthdate', [$from_date, $to_date])->paginate(15);   
    }
    
    public function getUsersWithSpecificDeptmAndDate($deptm, $from_date, $to_date){
        return DB::table('change_supervisor_scholarships')->join('users', 'users.id', '=', 'change_supervisor_scholarships.user_id')->where('users.department_id', '=', $deptm)->whereBetween('users.birthdate', [$from_date, $to_date])->paginate(15);   
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function registerScholarship()
    {
        return $this->belongsTo('App\Model\User\RegisterScholarship');
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
