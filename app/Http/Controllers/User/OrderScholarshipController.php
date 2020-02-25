<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App;
use App\User;
use App\Model\User\OrderScholarship;
use App\Model\User\Country;
use App\Model\User\University;
use App\Model\User\College;
use App\Model\User\Qualification;
use App\Model\User\Specialist;
use App\Model\User\Status;
use App\Model\User\RegisterationType;

class OrderScholarshipController extends Controller
{
    public function index()
    {
        $orders = User::findorfail(auth::id())->orderScholarships;
        $status_object = new Status;
        $statuses = $status_object->getStatuses(App::getlocale());
        return view('user.orders.index', ['orders' => $orders, 'statuses' => $statuses]);
    }

    public function show($id)
    {
        $order = OrderScholarship::where('id', $id)->where('user_id', Auth::id())->with(['user', 'country', 'university', 'college', 'qualification', 'specialist', 'status', 'registerationType'])->firstorfail();
        return view('user.orders.show', ['order' => $order]);
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

        return view('user.orders.create', ['countries' => $countries, 'universities' => $universities, 'colleges' => $colleges, 'qualifications' => $qualifications, 'specialists' => $specialists, 'user' => $user]);
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

        $register = new OrderScholarship();
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