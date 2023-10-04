<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
{
    $services = Service::with('section', 'area')->orderByDesc('id')->take(10)->get();

    $sliders = Slider::orderByDesc('id')->take(10)->get();
    $offers = Offer::orderByDesc('id')->take(10)->get();


    if ($request->has('area_id')) {
        $services = $services->where('area_id', $request->input('area_id'));
        $sliders = $sliders->where('area_id', $request->input('area_id'));
        $offers = $offers->where('area_id', $request->input('area_id'));

    }

    return response()->json([
        'services' => $services,
        'sliders' => $sliders,
        'offers' => $offers,
    ]);
}

}
