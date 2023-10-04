<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AboutApp;
use App\Models\Fqas;
use App\Models\Privacy;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function privacy()
    {
        $privacy = Privacy::latest()->first();

        return response()->json([
            'data' => $privacy
        ]);

    }

    public function faqs()
    {
        $faqs = Fqas::latest()->first();

        return response()->json([
            'data' => $faqs
        ]);

    }

    public function aboutApp()
    {
        $about = AboutApp::latest()->first();

        return response()->json([
            'data' => $about
        ]);

    }
}
