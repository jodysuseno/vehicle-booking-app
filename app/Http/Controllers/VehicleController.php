<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    public function index(){
        return view('vehicle.index',[
            'vehicles' => Vehicle::all(),
            'title' => 'Vehicle',
            'icon' => 'fa fa-truck'
        ]);
    }
}
