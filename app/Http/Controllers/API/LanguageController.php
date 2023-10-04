<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AppLanguage;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = AppLanguage::all();

        return response()->json([
            'data' => $languages,
        ]);
    }
}
