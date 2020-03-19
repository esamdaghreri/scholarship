<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class AdminDashboardController extends Controller
{
    // Display home page
    public function index(){
        return view('admin.dashboard');
    }
}
