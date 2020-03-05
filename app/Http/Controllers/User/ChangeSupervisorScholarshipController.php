<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\ChangeSupervisorScholarship;
use App\Model\User\RegisterScholarship;

class ChangeSupervisorScholarshipController extends Controller
{
    public function create($id)
    {
        $register_id = RegisterScholarship::select('id')->where('id', $id)->where('user_id', Auth::id())->firstorfail();
        return view('user.scholarship.change_supervisor.create', ['register_id' => $register_id]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(), [
                "reason" => 'required | min:5 | max:200',
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

        $change_supervisor_scholarship_on_progress_count = ChangeSupervisorScholarship::where('register_scholarship_id', $request->register_id)->where('user_id', Auth::id())->where('status_id', 3)->count();
        $change_supervisor_scholarship_success_count = ChangeSupervisorScholarship::where('register_scholarship_id', $request->register_id)->where('user_id', Auth::id())->where('status_id', 1)->count();
        if($change_supervisor_scholarship_on_progress_count == 0 && $change_supervisor_scholarship_success_count == 0)
        {
            $change_supervisor_scholarship = new ChangeSupervisorScholarship();
            $change_supervisor_scholarship->user_id = Auth::id();
            $change_supervisor_scholarship->reason = $request->reason;
            $change_supervisor_scholarship->register_scholarship_id = $request->register_id;
            $change_supervisor_scholarship->status_id = 3;
            $change_supervisor_scholarship->registeration_type_id = 4;
            $change_supervisor_scholarship->created_by = Auth::id();
            $change_supervisor_scholarship->created_at = now();
            $change_supervisor_scholarship->save();
            return redirect()->route('personnel.showOrders')->with('success', trans('public.successfullyـregistered'));
        }
        else{
            return redirect()->back()->with('danger', trans('public.you_are_already_order_for_changing_supervisor'));
        }
    }

    public function show($id)
    {
        $order = ChangeSupervisorScholarship::where('id', $id)->where('user_id', Auth::id())->with(['user', 'registerScholarship'])->firstorfail();
        return view('user.scholarship.change_supervisor.show', ['order' => $order]);
    }
}
