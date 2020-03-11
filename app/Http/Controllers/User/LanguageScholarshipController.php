<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App;
use App\User;
use App\Model\User\LanguageScholarship;
use App\Model\User\Country;
use App\Model\User\University;
use App\Model\User\College;
use App\Model\User\Status;
use App\Model\User\RegisterationType;
use App\Model\User\RegisterScholarship;
use App\Model\User\CancelScholarship;
use App\Model\User\ExtendScholarship;
use App\Model\User\ChangeSupervisorScholarship;

class LanguageScholarshipController extends Controller
{
    
    public function create()
    {
        $country_object = new Country;
        $university_object = new University;
        $college_object = new College;
        
        $countries = $country_object->getCountries(App::getlocale());
        $universities = $university_object->getUniversities(App::getlocale());
        $colleges = $college_object->getColleges(App::getlocale());
        
        return view('user.scholarship.language_scholarship.create', ['countries' => $countries, 'universities' => $universities, 'colleges' => $colleges]);
    }


    public function show($id)
    {
        //TODO:Important to improve this queries.
        $cancel_scholarship_on_progress_count = CancelScholarship::where('register_scholarship_id', $id)->where('user_id', Auth::id())->where('status_id', 3)->count();
        $cancel_scholarship_success_count = CancelScholarship::where('register_scholarship_id', $id)->where('user_id', Auth::id())->where('status_id', 1)->count();
        $extend_scholarship_on_progress_count = ExtendScholarship::where('register_scholarship_id', $id)->where('user_id', Auth::id())->where('status_id', 3)->count();
        $extend_scholarship_success_count = ExtendScholarship::where('register_scholarship_id', $id)->where('user_id', Auth::id())->where('status_id', 1)->count();
        $change_supervisor_scholarship_on_progress_count = ChangeSupervisorScholarship::where('register_scholarship_id', $id)->where('user_id', Auth::id())->where('status_id', 3)->count();
        $order = RegisterScholarship::where('id', $id)->where('user_id', Auth::id())->with(['user', 'country', 'university', 'college', 'status', 'registerationType'])->firstorfail();
        return view('user.scholarship.language_scholarship.show', ['order' => $order,
            'cancel_scholarship_on_progress_count' => $cancel_scholarship_on_progress_count,
            'cancel_scholarship_success_count' => $cancel_scholarship_success_count,
            'extend_scholarship_on_progress_count' => $extend_scholarship_on_progress_count,
            'extend_scholarship_success_count' => $extend_scholarship_success_count,
            'change_supervisor_scholarship_on_progress_count' => $change_supervisor_scholarship_on_progress_count
            ]);
    }
}