<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\Admin\Role;
use App\Model\User\Nationality;
use App\Model\User\Country;
use App\Model\User\University;
use App\Model\User\College;
use App\Model\User\Qualification;
use App\Model\User\Status;
use App\Model\User\Department;
use App\Model\User\Fellowship;
use App\Model\User\GeneralSpecialization;
use App\Model\User\JobDescription;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with(['gender', 'nationality'])->get();
        $nationalities = Nationality::all();
        $roles = Role::all();
        return view('admin.user.index', ['users' => $users, 'nationalities' => $nationalities, 'roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'email' => 'required | email | unique:users',
            'username' => 'required | min:4 | max:26 | unique:users',
            "role" => 'required | exists:roles,id',
            "gender" => 'required | exists:genders,id',
            "nationality" => 'required | exists:nationalities,id',
            'password' => ['required' , 'min:8' , 'max:26' , 'confirmed' , 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[a-zA-Z0-9_.-]{8,26}$/'], // regex is make sure the user add at least one small letter ,one capital letter and one number between 8 to 26 character
        ]);

        $newUser = new User();
        $newUser->username = request('username');
        $newUser->password = Hash::make(request('password'));
        $newUser->email = request('email');
        $newUser->role_id = request('role');
        $newUser->gender_id = request('gender');
        $newUser->nationality_id = request('nationality');
        $newUser->created_by = Auth::id();
        $newUser->created_at = date('Y-m-d H:i:s');
        $newUser->save();
        return redirect()->route('admin.user.index')->with('success', trans('public.successfullyـregistered'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->with(['role', 'gender', 'nationality', 'highestQualification', 'graduationCountry', 'graduationUniversity', 'graduationCollege', 'department', 'generalSpecialization', 'jobDescription', 'fellowship'])->firstOrFail();
        return view('admin.user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = $id;
        $role_object = new Role;
        $country_object = new Country;
        $university_object = new University;
        $college_object = new College;
        $qualification_object = new Qualification;
        $nationality_object = new Nationality;
        $department_object = new Department;
        $fellowship_object = new Fellowship;
        $general_specialization_object = new GeneralSpecialization;
        $jobDescription_object = new JobDescription;

        $user = User::where('id', $user_id)->firstOrFail();
        $roles = $role_object->getRoles();
        $countries = $country_object->getCountries();
        $universities = $university_object->getUniversities();
        $colleges = $college_object->getColleges();
        $qualifications = $qualification_object->getQualifications();
        $nationalities = $nationality_object->getNationalities();
        $departments = $department_object->getDepartments();
        $fellowships = $fellowship_object->getFellowships();
        $general_specializations = $general_specialization_object->getGeneralSpecializations();
        $job_descriptions = $jobDescription_object->getJobDescriptions();

        


        return view('admin.user.edit', [
            'user' => $user,
            'roles' => $roles,
            'countries' => $countries,
            'universities' => $universities,
            'colleges' => $colleges,
            'qualifications' => $qualifications,
            'nationalities' => $nationalities,
            'departments' => $departments,
            'fellowships' => $fellowships,
            'general_specializations' => $general_specializations,
            'job_descriptions' => $job_descriptions,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $user_id = $user->id;
        $validator = Validator::make(
            $request->all(), [
                "role" => 'required | exists:roles,id',
                "first_name" => "required | min:2 | max:25",
                "second_name" => "required | min:2 | max:25",
                "third_name" => "required | min:2 | max:25",
                "fourth_name" => "required | min:2 | max:25",
                "birthdate" => "required | date",
                "phone" => 'required | min:5 | max:20 | unique:users,phone,'.$user_id,
                "telephone" => 'required | min:5 | max:20',
                "national_number" => 'required | min:5 | max:20 | unique:users,national_number,'.$user_id,
                "nationality" => 'required | exists:nationalities,id',
                "employee_number" => "required | min:2 | max:25",
                "date_of_joining_the_university" => "required | date",
                "highest_qualification" => 'required | exists:qualifications,id',
                "gender" => 'required | exists:genders,id',
                "graduation_country" => 'required | exists:countries,id',
                "graduation_university" => 'required | exists:universities,id',
                "graduation_college" => 'required | exists:colleges,id',
                "department" => 'required | exists:departments,id',
                "job_description" => 'required | exists:job_descriptions,id',
                "general_specialization" => 'required | exists:general_specializations,id',
                "fellowship" => 'required | exists:fellowships,id',

            ]
        );

        /**
         *  checks if there an error in validator above then return to same page with error messages
         *
         ***/
        if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();

        $user->role_id = $request->role;
        $user->first_name = $request->first_name;
        $user->second_name = $request->second_name;
        $user->third_name = $request->third_name;
        $user->fourth_name	 = $request->fourth_name;
        $user->birthdate = $request->birthdate;
        $user->phone = $request->phone;
        $user->telephone = $request->telephone;
        $user->national_number = $request->national_number;
        $user->nationality_id = $request->nationality;
        $user->employee_number = $request->employee_number;
        $user->date_of_joining_the_university = $request->date_of_joining_the_university;
        $user->highest_qualification_id = $request->highest_qualification;
        $user->gender_id = $request->gender;
        $user->graduation_country_id = $request->graduation_country;
        $user->graduation_university_id = $request->graduation_university;
        $user->graduation_college_id = $request->graduation_college;
        $user->department_id = $request->department;
        $user->job_description_id = $request->job_description;
        $user->general_specialization_id = $request->general_specialization;
        $user->fellowship_id = $request->fellowship;
        $user->updated_by = Auth::id();
        $user->updated_at = now();
        $user->save();
        return redirect()->back()->with('success', trans('public.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function banned(Request $request)
    {
        $validator = Validator::make($request->all(), [

                "reason" => "required | min:4 | max:200",
                "user_id" => "required | exists:users,id",
            ]);
        /**
         *  checks if there an error in validator above then return to same page with error messages
         *
         ***/
        if ($validator->fails())
            return response()->json(['errors'=>$validator->errors()->all()]);

        $user = User::findOrFail($request->get('user_id'));

        if($user->is_banned == false)
        {
            $user->is_banned = true;
            $user->banned_reason = $request->input('reason');
        }
        else{
            $user->is_banned = false;
            $user->banned_reason = $request->input('reason');
        }
        $user->save();
        return response()->json(['success'=> trans('public.updated_successfully')]);
    }
}
