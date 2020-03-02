<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App;
use App\User;
use App\Model\User\RegisterScholarship;
use App\Model\User\Country;
use App\Model\User\University;
use App\Model\User\College;
use App\Model\User\Qualification;
use App\Model\User\Specialist;
use App\Model\User\Status;
use App\Model\User\RegisterationType;
use App\Model\User\CancelScholarship;
use App\Model\User\ExtendScholarship;

class RegisterScholarshipController extends Controller
{
    
    public function show($id)
    {
        //TODO:Important to improve this queries.
        $cancel_scholarship_on_progress_count = CancelScholarship::where('register_scholarship_id', $id)->where('user_id', Auth::id())->where('status_id', 3)->count();
        $cancel_scholarship_success_count = CancelScholarship::where('register_scholarship_id', $id)->where('user_id', Auth::id())->where('status_id', 1)->count();
        $extend_scholarship_on_progress_count = ExtendScholarship::where('register_scholarship_id', $id)->where('user_id', Auth::id())->where('status_id', 3)->count();
        $extend_scholarship_success_count = ExtendScholarship::where('register_scholarship_id', $id)->where('user_id', Auth::id())->where('status_id', 1)->count();
        $order = RegisterScholarship::where('id', $id)->where('user_id', Auth::id())->with(['user', 'country', 'university', 'college', 'qualification', 'specialist', 'status', 'registerationType'])->firstorfail();
        return view('user.scholarship.register.show', ['order' => $order, 'cancel_scholarship_on_progress_count' => $cancel_scholarship_on_progress_count, 'cancel_scholarship_success_count' => $cancel_scholarship_success_count, 'extend_scholarship_on_progress_count' => $extend_scholarship_on_progress_count, 'extend_scholarship_success_count' => $extend_scholarship_success_count]);
    }

    public function create()
    {
        $country_object = new Country;
        $university_object = new University;
        $college_object = new College;
        $qualification_object = new Qualification;
        $specialist_object = new Specialist;

        $user = User::select('highest_qualification')->where('id' ,Auth::id())->first();
        $countries = $country_object->getCountries(App::getlocale());
        $universities = $university_object->getUniversities(App::getlocale());
        $colleges = $college_object->getColleges(App::getlocale());
        $qualifications = $qualification_object->getQualifications(App::getlocale());
        $specialists = $specialist_object->getSpecialists(App::getlocale());

        return view('user.scholarship.register.create', ['countries' => $countries, 'universities' => $universities, 'colleges' => $colleges, 'qualifications' => $qualifications, 'specialists' => $specialists, 'user' => $user]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(), [
                "country" => 'required | exists:countries,id',
                "university" => 'required | exists:universities,id',
                "college" => 'required | exists:colleges,id',
                "qualification" => 'required | exists:qualifications,id',
                "specialist" => 'required | exists:specialists,id',
                "terms_and_condition" => 'accepted',
            ]
        );

        /**
         *  checks if there an error in validator above then return to same page with error messages
         *
         ***/
        if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();

        $register = new RegisterScholarship();
        $register->user_id = Auth::id();
        $register->country_id = $request->country;
        $register->university_id = $request->university;
        $register->college_id = $request->college;
        $register->qualification_id = $request->qualification;
        $register->specialist_id = $request->specialist;
        $register->registeration_type_id = 1;
        $register->created_by = Auth::id();
        $register->created_at = now();
        $register->save();
        return redirect()->route('user.home')->with('success', trans('public.successfullyـregistered'));
    }
}