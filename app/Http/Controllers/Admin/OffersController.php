<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    public function index()
    {
        return view('dashboard.offers.index');
    }


    public function create()
    {
        return view('dashboard.offers.create');
    }
}
