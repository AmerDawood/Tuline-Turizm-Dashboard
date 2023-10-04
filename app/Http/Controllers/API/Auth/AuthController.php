<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('myapptoken')->plainTextToken;

            return response()->json([
                'user' => $user,
                'token' => $token,
            ]);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }


    // Register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        $user->save();

        return response()->json(['message' => 'User registered successfully'], 201);
    }



    // Profile

    public function getUserData(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'user' => $user,
        ]);
    }



    // Update User Profile

    public function updateUserData(Request $request)
    {
        $user = $request->user(); // Get the authenticated user

        // Validate and update user data, including image upload
        $request->validate([
            'name' => 'string|max:255',
            'email' => 'email|unique:users,email,' . $user->id,
            'type' => 'string|in:user,admin',
            'status' => 'string|in:active,inactive',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules for image upload
        ]);

        // Update user data based on request fields
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->type = $request->input('type');
        $user->status = $request->input('status');

        // Handle image upload if an image is provided in the request
        if ($request->hasFile('image')) {
            // $img_name = rand() . time() . '.' . $request->file('image')->getClientOriginalExtension();
            // $request->file('image')->storeAs('public/uploads/offers', $img_name);
            $img_name = rand() . time() . $request->file('image')->getClientOriginalExtension();
          $request->file('image')->move(public_path('uploads/users'), $img_name);
            $user->image = $img_name;
        }

        // Save the updated user
        $user->save();

        return response()->json(['message' => 'User data updated successfully', 'user' => $user]);
    }



}
