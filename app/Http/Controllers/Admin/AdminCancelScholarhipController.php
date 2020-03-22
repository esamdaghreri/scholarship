<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\CancelScholarship;
use App\Model\User\File;

class AdminCancelScholarhipController extends Controller
{
    public function show($id)
    {
        $request = CancelScholarship::where('id', $id)->with(['user', 'registerScholarship', 'scholarshipReason'])->firstorfail();
        return view('admin.scholarship.cancel.show', ['request' => $request]);
    }

    public function approve(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "request_id" => "required | exists:cancel_scholarships,id",
        ]);
        /**
         *  checks if there an error in validator above then return to same page with error messages
         *
         ***/
        if ($validator->fails())
            return response()->json(['errors'=>$validator->errors()->all()]);
        
        $order = CancelScholarship::where('id', $request->get('request_id'))->with('registerScholarship')->firstOrFail();
        if($order->status->id != 1 && $order->registerScholarship->status_id == 1)
        {
            $order->status_id = 1;
            $order->reject_reason = null;
            $order->updated_by = Auth::id();
            $order->updated_at = now();
            $order->save();
            return response()->json(['success'=> trans('public.updated_successfully')]);
        }
        else
        {
            return response()->json(['success'=> trans('public.sorry_this_request_already_approved')]);
        }
    }

    public function reject(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "request_id" => "required | exists:cancel_scholarships,id",
            "reason" => "required | min:3 | max:400",
        ]);
        /**
         *  checks if there an error in validator above then return to same page with error messages
         *
         ***/
        if ($validator->fails())
            return response()->json(['errors'=>$validator->errors()->all()]);
        
        $order = CancelScholarship::where('id', $request->get('request_id'))->firstOrFail();
        if($order->status->id != 2 && $order->registerScholarship->status_id == 1)
        {
            $order->status_id = 2;
            $order->reject_reason = $request->get('reason');
            $order->updated_by = Auth::id();
            $order->updated_at = now();
            $order->save();
            return response()->json(['success'=> trans('public.updated_successfully')]);
        }
        else
        {
            return response()->json(['success'=> trans('public.sorry_this_request_already_rejected')]);
        }
    }
}
