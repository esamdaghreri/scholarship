<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\ChangeFellowshipScholarship;
use App\Model\User\File;

class AdminChangeFellowshipController extends Controller
{
    public function index(){
        $requests = ChangeFellowshipScholarship::with(['status', 'registerationType'])->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.request.fellowship', ['requests' => $requests]);
    }

    public function show($id)
    {
        $request = ChangeFellowshipScholarship::where('id', $id)->with(['user', 'fellowship', 'status', 'registerationType', 'registerScholarship'])->firstorfail();
        $urls = File::where('change_fellowship_scholarship_id', $id)->get();
        return view('admin.scholarship.change_fellowship.show', ['request' => $request, 'urls' => $urls]);
    }

    public function approve(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "request_id" => "required | exists:change_fellowship_scholarships,id",
        ]);
        /**
         *  checks if there an error in validator above then return to same page with error messages
         *
         ***/
        if ($validator->fails())
            return response()->json(['errors'=>$validator->errors()->all()]);
        
        $order = ChangeFellowshipScholarship::where('id', $request->get('request_id'))->with('registerScholarship')->firstOrFail();
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
            "request_id" => "required | exists:change_fellowship_scholarships,id",
            "reason" => "required | min:3 | max:400",
        ]);
        /**
         *  checks if there an error in validator above then return to same page with error messages
         *
         ***/
        if ($validator->fails())
            return response()->json(['errors'=>$validator->errors()->all()]);
        
        $order = ChangeFellowshipScholarship::where('id', $request->get('request_id'))->firstOrFail();
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
