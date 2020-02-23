<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $country_object = new Country;
        $university_object = new University;
        $college_object = new College;
        $qualification_object = new Qualification;
        $user_information = User::where('id', $id)->with('qualifications')->firstOrFail();
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
        $validator = Validator::make(
            $request->all(), [
                "first_name" => "required | min:2 | max:25",
                "second_name" => "required | min:2 | max:25",
                "third_name" => "required | min:2 | max:25",
                "fourth_name" => "required | min:2 | max:25",
                "phone" => 'required | min:5 | max:20 | unique:users,phone,'.$id,
                "telephone" => 'required | min:5 | max:20',
                "national_number" => 'required | min:5 | max:20',
                "save_number" => 'required | min:3 | max:20',
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

        $user = User::where('id', $id)->firstOrFail();
        $user->first_name = $request->first_name;
        $user->second_name = $request->second_name;
        $user->third_name = $request->third_name;
        $user->fourth_name	 = $request->fourth_name;
        $user->phone = $request->phone;
        $user->telephone = $request->telephone;
        $user->national_number = $request->national_number;
        $user->save_number = $request->save_number;
        $user->highest_qualification = $request->highest_qualification;
        $user->gender_id = $request->gender;
        $user->graduation_country_id = $request->graduation_country;
        $user->graduation_university_id = $request->graduation_university;
        $user->graduation_college_id = $request->graduation_college;
        $user->updated_by = Auth::id();
        $user->updated_at = now();
        $user->save();
        return redirect()->back()->with('success', trans('public.updated_successfully'));
    }
}