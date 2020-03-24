<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\Department;
use App\User;

class AdminReportsController extends Controller
{
    public function index(){
        $department_object = new Department;
        $departments = $department_object->getDepartments();
        return view('admin.report.index', ['departments' => $departments]);
    }
}
