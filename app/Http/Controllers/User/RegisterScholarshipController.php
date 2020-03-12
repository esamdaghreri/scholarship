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
use App\Model\User\Fellowship;
use App\Model\User\Status;
use App\Model\User\RegisterationType;
use App\Model\User\CancelScholarship;
use App\Model\User\ExtendScholarship;
use App\Model\User\ChangeSupervisorScholarship;
use App\Model\User\ChangeFellowshipScholarship;
use App\Model\User\File;

class RegisterScholarshipController extends Controller
{
    
    public function show($id)
    {
        //TODO:Important to improve this queries.
        $cancel_scholarship_on_progress_count = CancelScholarship::where('register_scholarship_id', $id)->where('user_id', Auth::id())->where('status_id', 3)->count();
        $cancel_scholarship_success_count = CancelScholarship::where('register_scholarship_id', $id)->where('user_id', Auth::id())->where('status_id', 1)->count();
        $extend_scholarship_on_progress_count = ExtendScholarship::where('register_scholarship_id', $id)->where('user_id', Auth::id())->where('status_id', 3)->count();
        $extend_scholarship_success_count = ExtendScholarship::where('register_scholarship_id', $id)->where('user_id', Auth::id())->where('status_id', 1)->count();
        $change_supervisor_scholarship_on_progress_count = ChangeSupervisorScholarship::where('register_scholarship_id', $id)->where('user_id', Auth::id())->where('status_id', 3)->count();
        $change_fellowship_scholarship_on_progress_count = ChangeFellowshipScholarship::where('register_scholarship_id', $id)->where('user_id', Auth::id())->where('status_id', 3)->count();
        $order = RegisterScholarship::where('id', $id)->where('user_id', Auth::id())->with(['user', 'country', 'university', 'college', 'qualification', 'fellowship', 'status', 'registerationType'])->firstorfail();
        return view('user.scholarship.register.show', ['order' => $order,
         'cancel_scholarship_on_progress_count' => $cancel_scholarship_on_progress_count,
         'cancel_scholarship_success_count' => $cancel_scholarship_success_count,
         'extend_scholarship_on_progress_count' => $extend_scholarship_on_progress_count,
         'extend_scholarship_success_count' => $extend_scholarship_success_count,
         'change_supervisor_scholarship_on_progress_count' => $change_supervisor_scholarship_on_progress_count,
         'change_fellowship_scholarship_on_progress_count' => $change_fellowship_scholarship_on_progress_count,
         ]);
    }

    public function create()
    {
        $country_object = new Country;
        $university_object = new University;
        $college_object = new College;
        $qualification_object = new Qualification;
        $fellowship_object = new Fellowship;

        $user = User::select('highest_qualification_id')->where('id' ,Auth::id())->first();
        $countries = $country_object->getCountries(App::getlocale());
        $universities = $university_object->getUniversities(App::getlocale());
        $colleges = $college_object->getColleges(App::getlocale());
        $qualifications = $qualification_object->getQualifications(App::getlocale());
        $fellowships = $fellowship_object->getFellowships(App::getlocale());

        return view('user.scholarship.register.create', ['countries' => $countries, 'universities' => $universities, 'colleges' => $colleges, 'qualifications' => $qualifications, 'fellowships' => $fellowships, 'user' => $user]);
    }

    public function store(Request $request)
    {
        if($request->type == 'register_scholarship')
        {
            $validator = Validator::make(
                $request->all(), [
                    "country" => 'required | exists:countries,id',
                    "university" => 'required | exists:universities,id',
                    "college" => 'required | exists:colleges,id',
                    "qualification" => 'required | exists:qualifications,id',
                    "fellowship" => 'required | exists:fellowships,id',
                    "file.*" => 'required | mimes:pdf,jpeg,bmp,png,docx,doc | max:2000',
                    "terms_and_condition" => 'accepted',
                ]
            );
        }
        elseif($request->type == 'langugae_scholarship')
        {
            $validator = Validator::make(
                $request->all(), [
                    "country" => 'required | exists:countries,id',
                    "university" => 'required | exists:universities,id',
                    "college" => 'required | exists:colleges,id',
                    "file.*" => 'required | mimes:pdf | max:2000',
                    "terms_and_condition" => 'accepted',
                ]
            );
        }

        /**
         *  checks if there an error in validator above then return to same page with error messages
         *
         ***/
        if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();

        // Define variable
        $user_id = Auth::id();
        $date = now();

        $register = new RegisterScholarship();
        $register->user_id = Auth::id();
        $register->country_id = $request->country;
        $register->university_id = $request->university;
        $register->college_id = $request->college;
        if($request->type == 'register_scholarship')
        {
            $register->qualification_id = $request->qualification;
            $register->fellowship_id = $request->fellowship;
            $register->registeration_type_id = 1;
        }
        elseif($request->type == 'langugae_scholarship')
        {
            $register->registeration_type_id = 6;
        }
        $register->created_by = $user_id;
        $register->created_at = $date;
        $register->save();
        if($register->id != null){
            foreach ($request->file as $file) {
                $title = time() . $file->getClientOriginalName();
                File::create([
                    'title' => $title,
                    'path' => $file->store('public/storage/attachments'),
                    'register_scholarship_id' => $register->id,
                    'user_id' =>$user_id,
                    'created_by' => $user_id,
                    'created_at' => $date
                ]);
            }
            return redirect()->route('personnel.showOrders')->with('success', trans('public.successfullyـregistered'));
        }
        else{
            return redirect()->back()->with('danger', trans('public.Registration_was_not_successful'));
        }
    }
}