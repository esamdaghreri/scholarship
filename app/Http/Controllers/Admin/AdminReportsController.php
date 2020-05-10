<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Model\User\Department;
use App\Model\User\RegisterScholarship;
use App\Model\User\CancelScholarship;
use App\Model\User\ChangeFellowshipScholarship;
use App\Model\User\ChangeSupervisorScholarship;
use App\Model\User\ExtendScholarship;
use App\Model\User\RegisterationType;
use App\User;

class AdminReportsController extends Controller
{
    public function index(){
        $department_object = new Department;
        $registeration_type_object = new RegisterationType;
        $departments = $department_object->getDepartments();
        $registeration_type = $registeration_type_object->getRegisterationTypes();
        return view('admin.report.index', ['departments' => $departments, 'registeration_type' => $registeration_type]);
    }

    public function search(Request $request){
        $users;
        $users_id = [];
        $date_type = $request->date_type;
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $deptm = $request->department;
        $registeration = $request->registeration;
        $validator = Validator::make(
            $request->all(), [
                "date_type" => 'required_with:from_date|required_with:to_date',
                "from_date" => 'required_with:date_type',
                "to_date" => 'required_with:date_type',
                "department" => 'required',
                "registeration" => 'required',
            ]
        );

        /**
         *  checks if there an error in validator above then return to same page with error messages
         *
         ***/
        if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();

        if (!empty($date_type)) {
            if($date_type == 'born'){
                if($registeration == 'all' && $deptm == 'all'){
                    $users = User::whereBetween('birthdate', [$from_date.' '.'00:00:00', $to_date.' '.'23:59:59'])->paginate(15);
                }
                elseif($registeration != 'all' && $deptm == 'all'){
                    $model = "App\Model\User\\".$registeration;
                    $registeration_object = new $model;
                    $users = $registeration_object->getUsersWithDate($from_date, $to_date);
                }
                elseif($registeration == 'all' && $deptm != 'all'){
                    $users = User::whereBetween('birthdate', [$from_date.' '.'00:00:00', $to_date.' '.'23:59:59'])->where('department_id', '=', $deptm)->paginate(15);   
                }
                elseif($registeration != 'all' && $deptm != 'all'){
                    $model = "App\Model\User\\".$registeration;
                    $registeration_object = new $model;
                    $users = $registeration_object->getUsersWithSpecificDeptmAndDate($deptm, $from_date, $to_date);
                }
            }elseif($date_type == 'request'){
                if($registeration == 'all' && $deptm == 'all'){
                    $user_object = new User;
                    $users = $user_object->getUsersWithDateRqeust($from_date, $to_date, $deptm);
                }
                elseif($registeration != 'all' && $deptm == 'all'){
                    $model = "App\Model\User\\".$registeration;
                    $registeration_object = new $model;
                    $users = $registeration_object->getUsersReqeustDateAndType($from_date, $to_date, $deptm);
                }
                elseif($registeration == 'all' && $deptm != 'all'){
                    $user_object = new User;
                    $users = $user_object->getUsersWithDateRqeust($from_date, $to_date, $deptm);
                }
                elseif($registeration != 'all' && $deptm != 'all'){
                    $model = "App\Model\User\\".$registeration;
                    $registeration_object = new $model;
                    $users = $registeration_object->getUsersReqeustDateAndType($from_date, $to_date, $deptm);
                }
            }
        }
        else{
            if($registeration == 'all' && $deptm == 'all'){
                $users = User::paginate(15);
            }
            elseif($registeration != 'all' && $deptm == 'all'){
                $model = "App\Model\User\\".$registeration;
                $registeration_object = new $model;
                $users = $registeration_object->getUsers();
            }
            elseif($registeration == 'all' && $deptm != 'all'){
                $users = User::where('department_id', '=', $deptm)->paginate(15);   
            }
            elseif($registeration != 'all' && $deptm != 'all'){
                $model = "App\Model\User\\".$registeration;
                $registeration_object = new $model;
                $users = $registeration_object->getUsersWithSpecificDeptm($deptm);
            }
        }
        $department_object = new Department;
        $registeration_type_object = new RegisterationType;
        $departments = $department_object->getDepartments();
        $registeration_type = $registeration_type_object->getRegisterationTypes();
        return view('admin.report.index', ['departments' => $departments, 'registeration_type' => $registeration_type, 'users' => $users, 'date_type' => $date_type, 'from_date' => $from_date, 'to_date' => $to_date, 'registeration' => $registeration, 'deptm' => $deptm]);
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
