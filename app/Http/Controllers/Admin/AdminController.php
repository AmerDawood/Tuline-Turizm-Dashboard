<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }



    public function allAdmins()
    {
        return view('dashboard.index');
    }


    public function createAdmin()
    {
        return view('dashboard.index');
    }

}
