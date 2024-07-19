<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        $users = User::where('admin',0)->get();
        return view('admin.users.index',compact('users'));
    }
}
