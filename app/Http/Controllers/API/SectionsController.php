<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionsController extends Controller
{

    public function sections()
    {
        $sections = Section::orderByDesc('id')->get();

        return response()->json([
            'data' => $sections,
        ]);
    }
}
