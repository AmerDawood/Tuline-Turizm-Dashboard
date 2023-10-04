<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UserPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserPlaceController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $places = UserPlace::where('user_id',$user->id)->get();

        return response()->json([
            'data' => $places
        ]);
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        // Define validation rules
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ];

        // Create a validator instance
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400); // Use an appropriate HTTP status code (e.g., 400 Bad Request)
        }

        // If validation passes, create the UserPlace
        UserPlace::create([
            'user_id' => $user->id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json([
            'message' => 'User Place Created Successfully',
        ]);
    }

    public function destroy(UserPlace $userPlace)
    {
        // Check if the authenticated user is the owner of the UserPlace
        $user = auth()->user();

        if ($user->id !== $userPlace->user_id) {
            return response()->json([
                'error' => 'Unauthorized. You do not have permission to delete this UserPlace.',
            ], 403); // Use an appropriate HTTP status code (e.g., 403 Forbidden)
        }

        // Delete the UserPlace
        $userPlace->delete();

        return response()->json([
            'message' => 'User Place Deleted Successfully',
        ]);
    }



}
