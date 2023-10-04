<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutApp;
use Illuminate\Http\Request;

class AboutAppController extends Controller
{
    public function aboutApp()
    {
        $about = AboutApp::latest()->first();

        return view('dashboard.settings.about_app.index',
        [
            'about' =>$about
        ]);
    }


    public function updateAboutApp()
    {
        $about = AboutApp::latest()->first();

        return view('dashboard.settings.about_app.update',[
            'about' =>$about
        ]);

    }

    public function updateData(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $about = AboutApp::first();
        $about->update(['content' => $request->content]);

        return redirect()->route('aboutApp.index')->with('msg', 'About App Updated Successfully')->with('type', 'success');
    }
}
