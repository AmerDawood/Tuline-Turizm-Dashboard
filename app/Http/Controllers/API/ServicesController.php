<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function services()
    {
        $services = Service::orderByDesc('id')->get();

        return response()->json([
            'data' => $services,
        ]);
    }
}
