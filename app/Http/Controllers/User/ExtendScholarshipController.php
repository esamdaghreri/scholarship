<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\CancelScholarship;
use App\Model\User\ExtendScholarship;
use App\Model\User\RegisterScholarship;
use App\Model\User\ScholarshipReason;

class ExtendScholarshipController extends Controller
{
    public function create($id)
    {
        $register_id = RegisterScholarship::select('id')->where('id', $id)->where('user_id', Auth::id())->firstorfail();
        $scholarship_reasons = ScholarshipReason::getExtendScholarshipReasons();
        return view('user.scholarship.extend.create', ['register_id' => $register_id, 'scholarship_reasons' => $scholarship_reasons]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(), [
                "number_for_extend" => 'required | min:1 | max:2',
                "reason" => 'required | exists:scholarship_reasons,id',
                "other_reasoner" => ' min:5 | max:200',
                "register_id" => 'required | exists:register_scholarships,id',
                "user_id" => 'required | exists:users,id',
                "terms_and_condition" => 'accepted',
            ]
        );

        /**
         *  checks if there an error in validator above then return to same page with error messages
         *
         ***/
        if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();

        $extend_scholarship_on_progress_count = ExtendScholarship::where('register_scholarship_id', $request->register_id)->where('user_id', Auth::id())->where('status_id', 3)->count();
        $extend_scholarship_success_count = ExtendScholarship::where('register_scholarship_id', $request->register_id)->where('user_id', Auth::id())->where('status_id', 1)->count();
        if($extend_scholarship_on_progress_count == 0 && $extend_scholarship_success_count < 2)
        {
            $extend_scholarship = new ExtendScholarship();
            $extend_scholarship->user_id = Auth::id();
            $extend_scholarship->number_for_extend = $request->number_for_extend;
            $extend_scholarship->scholarship_reason_id = $request->reason;
            $extend_scholarship->other_reason = $request->other_reason;
            $extend_scholarship->register_scholarship_id = $request->register_id;
            $extend_scholarship->status_id = 3;
            $extend_scholarship->registeration_type_id = 2;
            $extend_scholarship->created_by = Auth::id();
            $extend_scholarship->created_at = now();
            $extend_scholarship->save();
            return redirect()->route('personnel.showOrders')->with('success', trans('public.successfullyـregistered'));
        }
        else{
            return redirect()->back()->with('danger', trans('public.you_are_already_order_for_extend_it_or_number_of_extend_'));
        }
    }

    public function show($id)
    {
        $order = ExtendScholarship::where('id', $id)->where('user_id', Auth::id())->with(['user', 'registerScholarship', 'scholarshipReason'])->firstorfail();
        return view('user.scholarship.extend.show', ['order' => $order]);
    }
}
