<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppLanguage;
use Illuminate\Http\Request;

class AppLanguageController extends Controller
{
    public function index()
    {
        $languages = AppLanguage::orderByDesc('id')->get();
        return view('dashboard.settings.language.index',[
            'languages' => $languages,
        ]);
    }

    public function create()
    {
        return view('dashboard.settings.language.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'abbreviation' => 'required|string',

        ]);

        AppLanguage::create([
            'title' => $request->title,
            'abbreviation' => $request->abbreviation,

        ]);

        return redirect()->route('languages.index')->with('msg','Language Created Successfully');
    }
}
