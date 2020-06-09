<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\User\CancelScholarship;
use App\Model\User\ChangeFellowshipScholarship;
use App\Model\User\ChangeSupervisorScholarship;
use App\Model\User\LanguageScholarship;
use App\Model\User\RegisterScholarship;
use App\Model\User\ExtendScholarship;

class AdminDashboardController extends Controller
{
    // Display home page
    public function index(){
        $user_count = User::count();
        $cancel_count = CancelScholarship::count();
        $extend_count = ExtendScholarship::count();
        $change_supervisor_count = ChangeSupervisorScholarship::count();
        $change_fellowship_count = ChangeFellowshipScholarship::count();
        $register_scholarship_count = RegisterScholarship::count();
        $language_scholarship_count = RegisterScholarship::where('registeration_type_id', 6)->count();
        $total_requests = CancelScholarship::count() + ChangeFellowshipScholarship::count() + ChangeSupervisorScholarship::count() + LanguageScholarship::where('registeration_type_id', 6)->count() + RegisterScholarship::count() + ExtendScholarship::count();
        return view('admin.dashboard', 
            ['user_count' => $user_count,
            'cancel_count' => $cancel_count,
            'extend_count' => $extend_count,
            'change_supervisor_count' => $change_supervisor_count,
            'change_fellowship_count' => $change_fellowship_count,
            'register_scholarship_count' => $register_scholarship_count,
            'language_scholarship_count' => $language_scholarship_count,
            'total_requests' => $total_requests,
            ]);
    }
}
