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
        $language = new AppLanguage();
        return view('dashboard.settings.language.create',
     [
        'language' =>$language,
     ]);
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

    public function edit($id)
{
    $language = AppLanguage::find($id);

    if (!$language) {
        return redirect()->route('languages.index')->with('error', 'Language not found.');
    }

    return view('dashboard.settings.language.index', compact('language'));
}

public function update(Request $request, $id)
{
    $language = AppLanguage::find($id);

    if (!$language) {
        return redirect()->route('languages.index')->with('error', 'Language not found.');
    }

    $request->validate([
        'title' => 'required|string',
        'abbreviation' => 'required|string',
    ]);

    $language->update([
        'title' => $request->title,
        'abbreviation' => $request->abbreviation,
    ]);

    return redirect()->route('languages.index')->with('msg', 'Language Updated Successfully');
}


public function destroy($id)
{
    $language = AppLanguage::find($id);

    if (!$language) {
        return redirect()->route('languages.index')->with('error', 'Language not found.');
    }

    $language->delete();

    return redirect()->route('languages.index')->with('msg', 'Language Deleted Successfully');
}


}
