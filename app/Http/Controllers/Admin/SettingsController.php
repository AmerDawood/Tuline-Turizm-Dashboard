<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fqas;
use App\Models\Privacy;
use Illuminate\Http\Request;

class SettingsController extends Controller
{


    // Privacy
    public function privacy()
    {
        $privacy = Privacy::latest()->first();

        return view('dashboard.settings.privacy.index',
    [
        'privacy' =>$privacy
    ]);
    }


    public function updatePrivacy()
    {
        $privacy = Privacy::latest()->first();

        return view('dashboard.settings.privacy.update',[
            'privacy' =>$privacy
        ]);

    }

    public function updateData(Request $request)
{
    $request->validate([
        'content' => 'required',
    ]);

    $privacy = Privacy::first();
    $privacy->update(['content' => $request->content]);

    return redirect()->route('privacy.index')->with('msg', 'Privacy Updated Successfully')->with('type', 'success');
}





    // FAQs

    public function faqs()
    {
        $faqs = Fqas::all();
        return view('dashboard.settings.faqs.index',[
            'faqs'=>$faqs,
        ]);
    }

    public function createFaqs()
    {
        return view('dashboard.settings.faqs.create');
    }

    public function storeFaqs(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',

        ]);

        Fqas::create([
            'question' => $request->question,
            'answer' => $request->answer,

        ]);

        return redirect()->route('faqs.index')->with('msg','FAQs Created Successfully');
    }


}
