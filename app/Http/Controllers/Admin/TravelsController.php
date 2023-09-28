<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TravelsController extends Controller
{
    public function index()
    {
        return view('dashboard.travels.index');
    }


    public function create()
    {
        return view('dashboard.travels.create');
    }
}
