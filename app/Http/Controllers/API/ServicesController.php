<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function services()
    {
        $user = auth()->user();
        $favorites = $user->favorites->pluck('id')->toArray();

        $services = Service::orderByDesc('id')->get();
        foreach ($services as $service) {
            $service->is_favorite = in_array($service->id, $favorites);
        }

        return response()->json([
            'data' => $services,
        ]);
    }


    public function notLoggedInService()
    {

        $services = Service::orderByDesc('id')->take(10)->get();

        return response()->json([
            'data' => $services,
        ]);
    }



}
