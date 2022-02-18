<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;

class DriverController extends Controller
{
    public function index(){
        return view('driver.index',[
            'drivers' => Driver::all(),
            'title' => 'Driver',
            'icon' => 'fa fa-user'
        ]);
    }
}
