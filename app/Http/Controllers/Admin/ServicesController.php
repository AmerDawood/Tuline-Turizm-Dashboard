<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        return view('dashboard.services.index');
    }


    public function create()
    {
        return view('dashboard.services.create');
    }
}
