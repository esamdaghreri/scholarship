<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App;
use App\User;
use App\Model\User\Country;
use App\Model\User\University;
use App\Model\User\College;
use App\Model\User\Qualification;
use App\Model\User\RegisterScholarship;
use App\Model\User\CancelScholarship;
use App\Model\User\ExtendScholarship;
use App\Model\User\Status;
use App\Model\User\Nationality;
use App\Model\User\Department;
use App\Model\User\Fellowship;
use App\Model\User\GeneralSpecialization;
use App\Model\User\JobDescription;


class PersonnelController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPersonnelData()
    {
        $user_id = Auth::id();
        $country_object = new Country;
        $university_object = new University;
        $college_object = new College;
        $qualification_object = new Qualification;
        $nationality_object = new Nationality;
        $department_object = new Department;
        $fellowship_object = new Fellowship;
        $generalSpecialization_object = new GeneralSpecialization;
        $jobDescription_object = new JobDescription;

        $user_information = User::where('id', $user_id)->firstOrFail();
        $countries = $country_object->getCountries(App::getlocale());
        $universities = $university_object->getUniversities(App::getlocale());
        $colleges = $college_object->getColleges(App::getlocale());
        $qualifications = $qualification_object->getQualifications(App::getlocale());
        $nationalities = $nationality_object->getNationalities(App::getlocale());
        $departments = $department_object->getDepartments();
        $fellowships = $fellowship_object->getFellowships();
        $generalSpecializations = $generalSpecialization_object->getGeneralSpecializations();
        $jobDescriptions = $jobDescription_object->getJobDescriptions();

        


        return view('user.personnel.personnel_data', [
            'user_information' => $user_information,
            'countries' => $countries,
            'universities' => $universities,
            'colleges' => $colleges,
            'qualifications' => $qualifications,
            'nationalities' => $nationalities,
            'departments' => $departments,
            'fellowships' => $fellowships,
            'generalSpecializations' => $generalSpecializations,
            'jobDescriptions' => $jobDescriptions,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePersonnelData(Request $request, $id)
    {
        $user_id = Auth::id();
        $validator = Validator::make(
            $request->all(), [
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
                "jobـdescription" => 'required | exists:job_descriptions,id',
                "generalـspecialization" => 'required | exists:general_specializations,id',
                "fellowship" => 'required | exists:fellowships,id',

            ]
        );

        /**
         *  checks if there an error in validator above then return to same page with error messages
         *
         ***/
        if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();

        $user = User::where('id', $user_id)->firstOrFail();
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
        $user->job_description_id = $request->jobـdescription;
        $user->general_specialization_id = $request->generalـspecialization;
        $user->fellowship_id = $request->fellowship;
        $user->updated_by = $user_id;
        $user->updated_at = now();
        $user->save();
        return redirect()->back()->with('success', trans('public.updated_successfully'));
    }

    // Privacy page for each user
    public function showPrivacy()
    {
        $user_id = Auth::id();
        $user = User::where('id', $user_id)->select(['username', 'email'])->firstOrFail();
        return view('user.personnel.show_privacy', ['user' => $user]);
    }

    public function updatePrivacy(Request $request)
    {
        $user_id = Auth::id();
        $validator = Validator::make(
            $request->all(), [
                'email' => 'required | email |unique:users,email,'.$user_id,
                'username' => 'required | min:4 | max:26 | unique:users,username,'.$user_id,
                'password' => ['min:8' , 'max:26', 'required_with:password_confirmation', 'same:password_confirmation', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[a-zA-Z0-9_.-]{8,26}$/', 'nullable'], // regex is make sure the user add at least one small letter ,one capital letter and one number between 8 to 26 character
                'password_confirmation' => ['min:8' , 'max:26', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[a-zA-Z0-9_.-]{8,26}$/', 'nullable'], // regex is make sure the user add at least one small letter ,one capital letter and one number between 8 to 26 character
            ]
        );

        /**
         *  checks if there an error in validator above then return to same page with error messages
         *
         ***/
        if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();

        $user = User::where('id', $user_id)->firstOrFail();
        $user->username = $request->username;
        if($user->email != $request->email)
        {
            $user->email = $request->email;
            $user->email_verified_at = null;
        }
        if(!is_null($request->password)){
            $user->password = Hash::make(request('password'));
        }
        $user->updated_by = $user_id;
        $user->updated_at = now();
        $user->save();
        return redirect()->back()->with('success', trans('public.updated_successfully'));
    }

    public function showOrders()
    {
        $registers = RegisterScholarship::where('user_id', Auth::id())->with(['status', 'registerationType'])->orderBy('created_at', 'desc')->get();
        $cancels = CancelScholarship::where('user_id', Auth::id())->with(['scholarshipReason', 'registerScholarship', 'status', 'registerationType'])->orderBy('created_at', 'desc')->get();
        $extends = ExtendScholarship::where('user_id', Auth::id())->with(['scholarshipReason', 'registerScholarship', 'status', 'registerationType'])->orderBy('created_at', 'desc')->get();
        $orders = [$extends, $cancels, $registers];
        return view('user.personnel.orders', ['orders' => $orders]);
    }
}
