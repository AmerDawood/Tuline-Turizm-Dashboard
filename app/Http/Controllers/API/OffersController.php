<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    public function offers()
    {
        $offers = Offer::orderByDesc('id')->get();

        return response()->json([
            'data' => $offers,
        ]);
    }
}
