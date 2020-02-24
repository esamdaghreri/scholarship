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

class PersonnelController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = Auth::id();
        $country_object = new Country;
        $university_object = new University;
        $college_object = new College;
        $qualification_object = new Qualification;
        $user_information = User::where('id', $user_id)->with('qualifications')->firstOrFail();
        $countries = $country_object->getCountries(App::getlocale());
        $universities = $university_object->getUniversities(App::getlocale());
        $colleges = $college_object->getColleges(App::getlocale());
        $qualifications = $qualification_object->getQualifications(App::getlocale());

        return view('user.personnel.index', ['user_information' => $user_information, 'countries' => $countries, 'universities' => $universities, 'colleges' => $colleges, 'qualifications' => $qualifications]);
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
        $user_id = Auth::id();
        $validator = Validator::make(
            $request->all(), [
                "first_name" => "required | min:2 | max:25",
                "second_name" => "required | min:2 | max:25",
                "third_name" => "required | min:2 | max:25",
                "fourth_name" => "required | min:2 | max:25",
                "phone" => 'required | min:5 | max:20 | unique:users,phone,'.$user_id,
                "telephone" => 'required | min:5 | max:20',
                "national_number" => 'required | min:5 | max:20 | unique:users,national_number,'.$user_id,
                "save_number" => 'required | min:3 | max:20',
                "release_date" => 'required | date',
                "expiry_date" => 'required | date',
                "highest_qualification" => 'required | exists:qualifications,id',
                "gender" => 'required | exists:genders,id',
                "graduation_country" => 'required | exists:countries,id',
                "graduation_university" => 'required | exists:universities,id',
                "graduation_college" => 'required | exists:colleges,id',
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
        $user->phone = $request->phone;
        $user->telephone = $request->telephone;
        $user->national_number = $request->national_number;
        $user->save_number = $request->save_number;
        $user->release_date = $request->release_date;
        $user->expiry_date = $request->expiry_date;
        $user->qualifications()->sync($request->highest_qualification);
        $user->highest_qualification = $request->highest_qualification;
        $user->gender_id = $request->gender;
        $user->graduation_country_id = $request->graduation_country;
        $user->graduation_university_id = $request->graduation_university;
        $user->graduation_college_id = $request->graduation_college;
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
}
