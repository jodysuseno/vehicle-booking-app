<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        return view('user.index',[
            'users' => User::all(),
            'title' => 'User',
            'icon' => 'fa fa-user'
        ]);
    }

    public function create(){
        return view('user.create',[
            'title' => 'Create User',
            'icon' => 'fa fa-user-plus'
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required',
            'level' => 'required',
        ]);

        // dd($request);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'level' => $request->level,
        ]);

        return redirect()->route('user.index')->with('status', 'user has been created');

    }


    public function edit($id){
        return view('user.edit',[
            'user' => User::find($id),
            'title' => 'Edit User',
            'icon' => 'fa fa-user-edit'
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'level' => 'required',
        ]);

        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'level' => $request->level,
        ]);

        return redirect()->route('user.index')->with('status', 'user has been created');
    }

    public function destroy($id){
        User::find($id)->delete();

        return redirect()->route('user.index')->with('status', 'user has been deleted');
    }
}
