<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Service;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function getFavoriteServices()
    {
        $user = auth()->user();

        // Retrieve all favorite services for the user
        $favoriteServices = $user->favorites;

        return response()->json([
            'data' => $favoriteServices,
        ]);
    }


    public function storeServicesToFavorite(Service $service)
    {
        $user = auth()->user();

        // Check if the service is already a favorite
        if ($user->favorites->contains('id', $service->id)) {
            return response()->json([
                'error' => 'Service is already in favorites.',
            ], 400); // Use an appropriate HTTP status code (e.g., 400 Bad Request)
        }

        // If not already a favorite, add it to favorites
        Favorite::create([
            'user_id' => $user->id,
            'service_id' => $service->id,
        ]);

        return response()->json([
            'data' => 'Service added successfully to favorites.',
        ]);
    }


    public function removeFromFavorites(Service $service)
    {
        $user = auth()->user();

        // Check if the service is a favorite
        if ($user->favorites->contains($service->id)) {
            $user->favorites()->detach($service->id);
            return response()->json([
                'message' => 'Service removed from favorites successfully.',
            ]);
        } else {
            return response()->json([
                'message' => 'Service is not in favorites.',
            ], 400); // Use an appropriate HTTP status code (e.g., 400 Bad Request)
        }
    }




}
