<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        return view('dashboard.index');
    }



    public function allAdmins()
    {
        $admins = User::orderByDesc('id')->where('type','admin')->paginate(6);

        return view('dashboard.admins.index',['admins'=>$admins]);
    }


    public function createAdmin()
    {
        return view('dashboard.admins.create');
    }

}
