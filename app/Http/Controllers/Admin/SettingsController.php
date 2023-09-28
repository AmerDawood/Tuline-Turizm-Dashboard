<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{


    // Privacy
    public function privacy()
    {
        return view('dashboard.settings.privacy.index');
    }


    public function updatePrivacy()
    {
        return view('dashboard.settings.privacy.update');

    }




    // FAQs

    public function faqs()
    {
        return view('dashboard.settings.faqs.index');
    }

    public function createFaqs()
    {
        return view('dashboard.settings.faqs.create');
    }

}
