<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vehicle;

class VehicleController extends Controller
{
    public function index(){
        return view('vehicle.index',[
            'vehicles' => Vehicle::all(),
            'title' => 'Vehicle',
            'icon' => 'fa fa-truck'
        ]);
    }

    public function create(){
        return view('vehicle.create',[
            'title' => 'Vehicle',
            'icon' => 'fa fa-truck'
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'plate_number' => 'required|unique:vehicles',
            'name' => 'required',
            'type' => 'required',
            'ownership' => 'required',
            'years' => 'required',
        ]);

        Vehicle::create([
            'plate_number' => $request->plate_number,
            'name' => $request->name,
            'type' => $request->type,
            'ownership' => $request->ownership,
            'years' => $request->years,
        ]);

        return redirect()->route('vehicle.index')->with('status', 'vehicle has been created');
    }

    public function edit($id){
        return view('vehicle.edit',[
            'vehicle' => Vehicle::find($id),
            'title' => 'Vehicle',
            'icon' => 'fa fa-truck'
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'plate_number' => 'required',
            'name' => 'required',
            'type' => 'required',
            'ownership' => 'required',
            'years' => 'required',
        ]);

        Vehicle::find($id)->update([
            'plate_number' => $request->plate_number,
            'name' => $request->name,
            'type' => $request->type,
            'ownership' => $request->ownership,
            'years' => $request->years,
        ]);

        return redirect()->route('vehicle.index')->with('status', 'vehicle has been updated');
    }

    public function destroy($id){
        Vehicle::destroy($id);
        return redirect()->route('vehicle.index')->with('status', 'vehicle has been deleted');
    }


}
