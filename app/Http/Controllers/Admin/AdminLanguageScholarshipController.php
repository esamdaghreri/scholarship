<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\RegisterScholarship;
use App\Model\User\File;

class AdminLanguageScholarshipController extends Controller
{
    public function show($id)
    {
        $request = RegisterScholarship::where('id', $id)->with(['user', 'country', 'university', 'college', 'qualification', 'fellowship', 'status', 'registerationType'])->firstorfail();
        $urls = File::where('register_scholarship_id', $id)->get();
        return view('admin.scholarship.language.show', ['request' => $request, 'urls' => $urls]);
    }

    public function approve(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "request_id" => "required | exists:register_scholarships,id",
        ]);
        /**
         *  checks if there an error in validator above then return to same page with error messages
         *
         ***/
        if ($validator->fails())
            return response()->json(['errors'=>$validator->errors()->all()]);
        
        $order = RegisterScholarship::where('id', $request->get('request_id'))->firstOrFail();
        if($order->status->id != 1)
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
            "request_id" => "required | exists:register_scholarships,id",
            "reason" => "required | min:3 | max:400",
        ]);
        /**
         *  checks if there an error in validator above then return to same page with error messages
         *
         ***/
        if ($validator->fails())
            return response()->json(['errors'=>$validator->errors()->all()]);
        
        $order = RegisterScholarship::where('id', $request->get('request_id'))->firstOrFail();
        if($order->status->id != 2)
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
