<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App;
use App\User;
use App\Model\User\ChangeFellowshipScholarship;
use App\Model\User\RegisterScholarship;
use App\Model\User\Fellowship;
use App\Model\User\ScholarshipReason;

class ChangeFellowshipScholarshipController extends Controller
{
    public function create($id)
    {
        $fellowship_object = new Fellowship;

        $register_id = RegisterScholarship::select(['id'])->where('id', $id)->where('user_id', Auth::id())->firstorfail();
        $fellowships = $fellowship_object->getFellowships(App::getlocale());
        $scholarship_reasons = ScholarshipReason::getCancelScholarshipReasons();
        return view('user.scholarship.change_fellowship.create', ['register_id' => $register_id, 'fellowships' => $fellowships, 'scholarship_reasons' => $scholarship_reasons]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(), [
                "reason" => 'required',
                "other_reason" => ' min:5 | max:200',
                "fellowship" => 'required | exists:fellowships,id',
                "register_id" => 'required | exists:register_scholarships,id',
                "terms_and_condition" => 'accepted',
            ]
        );

        /**
         *  checks if there an error in validator above then return to same page with error messages
         *
         ***/
        if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();

        $change_fellowship_scholarship_on_progress_count = ChangeFellowshipScholarship::where('register_scholarship_id', $request->register_id)->where('user_id', Auth::id())->where('status_id', 3)->count();
        if($change_fellowship_scholarship_on_progress_count == 0)
        {
            $change_fellowship_scholarship = new ChangeFellowshipScholarship();
            $change_fellowship_scholarship->user_id = Auth::id();
            $change_fellowship_scholarship->scholarship_reason_id = $request->reason;
            $change_fellowship_scholarship->other_reason = $request->other_reason;
            $change_fellowship_scholarship->fellowship_id = $request->fellowship;
            $change_fellowship_scholarship->register_scholarship_id = $request->register_id;
            $change_fellowship_scholarship->status_id = 3;
            $change_fellowship_scholarship->registeration_type_id = 5;
            $change_fellowship_scholarship->created_by = Auth::id();
            $change_fellowship_scholarship->created_at = now();
            $change_fellowship_scholarship->save();
            return redirect()->route('personnel.showOrders')->with('success', trans('public.successfullyـregistered'));
        }
        else{
            return redirect()->back()->with('danger', trans('public.you_are_already_order_for_changing_fellowship'));
        }
    }

    public function show($id)
    {
        $order = ChangeFellowshipScholarship::where('id', $id)->where('user_id', Auth::id())->with(['user', 'fellowship', 'status', 'registerationType', 'registerScholarship'])->firstorfail();
        return view('user.scholarship.change_fellowship.show', ['order' => $order]);
    }
}
