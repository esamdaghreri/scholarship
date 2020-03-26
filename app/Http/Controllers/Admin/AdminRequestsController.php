<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\RegisterScholarship;
use App\Model\User\CancelScholarship;
use App\Model\User\ExtendScholarship;
use App\Model\User\ChangeSupervisorScholarship;
use App\Model\User\LanguageScholarship;
use App\Model\User\ChangeFellowshipScholarship;

class AdminRequestsController extends Controller
{
    public function index(){
        $registers = RegisterScholarship::with(['status', 'registerationType'])->orderBy('created_at', 'desc')->get();
        $cancels = CancelScholarship::with(['status', 'registerationType'])->orderBy('created_at', 'desc')->get();
        $extends = ExtendScholarship::with(['status', 'registerationType'])->orderBy('created_at', 'desc')->get();
        $change_supervisors = ChangeSupervisorScholarship::with(['status', 'registerationType'])->orderBy('created_at', 'desc')->get();
        $change_fellowships = ChangeFellowshipScholarship::with(['status', 'registerationType'])->orderBy('created_at', 'desc')->get();
        $language_scholarships = LanguageScholarship::with(['status', 'registerationType'])->orderBy('created_at', 'desc')->get();
        $requests = [$change_fellowships, $registers, $change_supervisors, $extends, $cancels, $language_scholarships];
        return view('admin.request.index', ['requests' => $requests]);
    }
}
