<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index() {
        return view('employee.index',[
            'employees' => Employee::all(),
            'title' => 'Employee',
            'icon' => 'fa fa-users'
        ]);
    }
}
