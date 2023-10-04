<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SlidersController extends Controller
{
    public function sliders()
    {
        $sliders = Slider::orderByDesc('id')->get();

        return response()->json([
            'data' => $sliders,
        ]);
    }

    
}
