<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\CancelScholarship;
use App\Model\User\RegisterScholarship;
use App\Model\User\ScholarshipReason;

class CancelScholarshipController extends Controller
{
    public function create($id)
    {
        $register_id = RegisterScholarship::select('id')->where('id', $id)->where('user_id', Auth::id())->firstorfail();
        $scholarship_reasons = ScholarshipReason::getCancelScholarshipReasons();
        return view('user.scholarship.cancel.create', ['register_id' => $register_id, 'scholarship_reasons' => $scholarship_reasons]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(), [
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

            $register_scholarship_count = CancelScholarship::where('register_scholarship_id', $request->register_id)->where('user_id', Auth::id())->where('status_id', 3)->count();
            if($register_scholarship_count == 0)
        {
            $cancel_scholarship = new CancelScholarship();
            $cancel_scholarship->user_id = Auth::id();
            $cancel_scholarship->scholarship_reason_id = $request->reason;
            $cancel_scholarship->other_reason = $request->other_reason;
            $cancel_scholarship->register_scholarship_id = $request->register_id;
            $cancel_scholarship->status_id = 3;
            $cancel_scholarship->registeration_type_id = 3;
            $cancel_scholarship->created_by = Auth::id();
            $cancel_scholarship->created_at = now();
            $cancel_scholarship->save();
            return redirect()->route('personnel.showOrders')->with('success', trans('public.successfullyـregistered'));
        }
        else{
            return redirect()->back()->with('danger', trans('public.you_are_already_order_for_cancel_it'));
        }
    }

    public function show($id)
    {
        $order = CancelScholarship::where('id', $id)->where('user_id', Auth::id())->with(['user', 'registerScholarship', 'scholarshipReason'])->firstorfail();
        return view('user.scholarship.cancel.show', ['order' => $order]);
    }
}
