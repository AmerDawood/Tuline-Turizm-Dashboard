<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;

class AreasController extends Controller
{
    public function areas()
    {
        $areas = Area::orderByDesc('id')->get();

        return response()->json([
            'data' => $areas,
        ]);
    }
}
