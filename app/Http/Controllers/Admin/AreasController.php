<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AreasController extends Controller
{
    public function index()
    {
        return view('dashboard.areas.index');
    }


    public function create()
    {
        return view('dashboard.areas.create');
    }
}
