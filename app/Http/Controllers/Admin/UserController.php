<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderByDesc('id')->where('type','user')->paginate(6);
        return view('dashboard.users.index',[
            'users' =>$users,
        ]);
    }


    public function create()
    {
        return view('dashboard.users.create');
    }
}
