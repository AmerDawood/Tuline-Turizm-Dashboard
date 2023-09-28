<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppLanguageController extends Controller
{
    public function index()
    {
        return view('dashboard.settings.language.index');
    }

    public function create()
    {
        return view('dashboard.settings.language.create');
    }
}
