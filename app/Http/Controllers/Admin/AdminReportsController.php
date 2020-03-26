<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Model\User\Department;
use App\Model\User\RegisterScholarship;
use App\User;

class AdminReportsController extends Controller
{
    public function index(){
        $department_object = new Department;
        $departments = $department_object->getDepartments();
        return view('admin.report.index', ['departments' => $departments]);
    }

    public function search(Request $request){
        $users_id = [];
        $date_type = $request->date_type;
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $department = $request->department;


        $validator = Validator::make(
            $request->all(), [
                "from_date" => 'required_with:date_type',
                "to_date" => 'required_with:date_type',
                "department" => 'required',
            ]
        );

        /**
         *  checks if there an error in validator above then return to same page with error messages
         *
         ***/
        if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();

        if ((!empty($from_date) && !empty($to_date)) && !empty($date_type)) {
            if($date_type == 'born')
            {
                if($department != 'all'){
                    $users = User::select('id')->whereDate('birthdate', '>=' , $from_date)->whereDate('birthdate', '<=', $to_date)->where('department_id', $department)->get();
                }
                if($department == 'all'){
                    $users = User::select('id')->whereDate('birthdate', '>=' , $from_date)->whereDate('birthdate', '<=', $to_date)->get();
                }
                foreach($users as $user){
                    array_push($users_id, $user->id);
                }
            }
            if($date_type == 'request'){
                if($department != 'all'){
                    $users = User::select('id')->where('department_id', $department)->get();
                }
                if($department == 'all'){
                    $users = User::select('id')->get();
                }
                if(!empty($users)){
                    if($from_date != null && $to_date != null){
                        foreach($users as $user){
                            $users_has_scholarship = RegisterScholarship::select('user_id')->whereDate('created_at', '>=' , $from_date)->whereDate('created_at', '<=', $to_date)->where('user_id', $user->id)->first();
                            if(!is_null($users_has_scholarship)){
                                array_push($users_id, $users_has_scholarship->user_id);
                            }
                        }
                    }
                }
            }
        }
        else{
            if($department != 'all'){
                $users = User::select('id')->where('department_id', $department)->get();
            }
            if($department == 'all'){
                $users = User::select('id')->get();
            }
            foreach($users as $user){
                array_push($users_id, $user->id);
            }
        }
        $department_object = new Department;
        $departments = $department_object->getDepartments();
        $users = User::find($users_id);
        return view('admin.report.index', ['departments' => $departments, 'users' => $users]);
    }

    public function show($id){
        $user = User::where('id', $id)->with([
            'role',
            'gender',
            'nationality',
            'highestQualification',
            'graduationCountry',
            'graduationUniversity',
            'graduationCollege',
            'department',
            'generalSpecialization',
            'jobDescription', 
            'fellowship',
            'registerScholarships',
            'cancelscholarships',
            'changeFellowshipScholarships',
            'changeSupervisorScholarships',
            'extendScholarships',
        ])->firstOrFail();
        return view('admin.report.show', ['user' => $user]);    
    }
}
