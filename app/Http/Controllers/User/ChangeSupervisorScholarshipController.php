<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\ChangeSupervisorScholarship;
use App\Model\User\RegisterScholarship;
use App\Model\User\File;
use App\Model\User\File as FileTable;

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
                "file" => 'required',
                "file.*" => 'mimes:pdf,jpeg,bmp,png,docx,doc | max:2000',
                "terms_and_condition" => 'accepted',
            ]
        );

        /**
         *  checks if there an error in validator above then return to same page with error messages
         *
         ***/
        if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();

        $user_id = Auth::id();
        $date = now();

        $change_supervisor_scholarship_on_progress_count = ChangeSupervisorScholarship::where('register_scholarship_id', $request->register_id)->where('user_id', Auth::id())->where('status_id', 3)->count();
        $change_supervisor_scholarship_success_count = ChangeSupervisorScholarship::where('register_scholarship_id', $request->register_id)->where('user_id', Auth::id())->where('status_id', 1)->count();
        if($change_supervisor_scholarship_on_progress_count == 0 && $change_supervisor_scholarship_success_count == 0)
        {
            $change_supervisor_scholarship = new ChangeSupervisorScholarship();
            $change_supervisor_scholarship->user_id = $user_id;
            $change_supervisor_scholarship->reason = $request->reason;
            $change_supervisor_scholarship->register_scholarship_id = $request->register_id;
            $change_supervisor_scholarship->status_id = 3;
            $change_supervisor_scholarship->registeration_type_id = 4;
            $change_supervisor_scholarship->created_by = $user_id;
            $change_supervisor_scholarship->created_at = $date;
            $change_supervisor_scholarship->save();
            if($change_supervisor_scholarship->id != null){
                foreach ($request->file as $file) {
                    $title = time() . $file->getClientOriginalName();
                    $file->storeAs('/public/attachments', $title);
                    FileTable::create([
                        'path' => $title,
                        'title' => $title,
                        'change_supervisor_scholarship_id' => $change_supervisor_scholarship->id,
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
