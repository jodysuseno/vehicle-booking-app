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
}
