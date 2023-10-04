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

        // Validate and update user data
        $request->validate([
            'name' => 'string|max:255', // You can add more validation rules if needed
            'email' => 'email|unique:users,email,' . $user->id,
            // 'type' => 'string|in:user,admin', // Assuming 'type' can be 'user' or 'admin'
            // 'status' => 'string|in:active,inactive', // Assuming 'status' can be 'active' or 'inactive'
        ]);

        // Update user data based on request fields
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // $user->type = $request->input('type');
        // $user->status = $request->input('status');

        // Save the updated user
        $user->save();

        return response()->json(['message' => 'User data updated successfully', 'user' => $user]);
    }


    
}
