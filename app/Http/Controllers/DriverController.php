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

    public function create(){
        return view('driver.create',[
            'title' => 'Driver',
            'icon' => 'fa fa-user'
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'id_card' => 'required|unique:drivers',
            'name' => 'required',
            'phone' => 'required|unique:drivers',
            'address' => 'required',
        ]);

        // dd($request);
        Driver::create([
            'id_card' => $request->id_card,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('driver.index')->with('success','Data berhasil ditambahkan');
            
    }

    public function edit($id){
        return view('driver.edit',[
            'driver' => Driver::find($id),
            'title' => 'Driver',
            'icon' => 'fa fa-user'
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'id_card' => 'required|unique:drivers,id_card,'.$id,
            'name' => 'required',
            'phone' => 'required|unique:drivers,phone,'.$id,
            'address' => 'required',
        ]);

        Driver::find($id)->update([
            'id_card' => $request->id_card,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('driver.index')->with('success','Data berhasil diubah');
    }

    public function destroy($id){
        Driver::find($id)->delete();
        return redirect()->route('driver.index')->with('success','Data berhasil dihapus');
    }
}