<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    public function index()
    {
        return view('dashboard.sections.index');
    }


    public function create()
    {
        return view('dashboard.sections.create');
    }
}
