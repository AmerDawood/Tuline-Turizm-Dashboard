<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderByDesc('id')->where('type','user')->paginate(6);
        return view('dashboard.users.index',[
            'users' =>$users,
        ]);
    }


    public function create()
    {
        $user = new User();
        return view('dashboard.users.create',
    [
        'user' =>$user,
    ]
);
    }


    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password')); // Hash the password
        $user->type = 'user'; // Default user type
        $user->status = 'inactive'; // Default status

        $user->save();

        return redirect()->route('users.index')->with('msg', 'User Created successfully');
    }



    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.users.edit',['user'=>$user]);

    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable|string',
            'email' => 'nullable|email',
            // 'password' => 'nullable|string|min:8|confirmed',
            'type' => 'required|in:user,admin',
            'status' => 'required|in:active,inactive',
        ]);

        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found.');
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // if ($request->filled('password')) {
        //     $user->password = bcrypt($request->input('password'));
        // }

        $user->type = $request->input('type');
        $user->status = $request->input('status');

        $user->save();

        return redirect()->route('users.index')->with('msg', 'User Updated Successfully');
    }

    public function destroy($id)
    {
        // Find the user by its ID
        $user = User::find($id);

        // Check if the user exists
        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found.');
        }

        // Delete the user
        $user->delete();

        return redirect()->route('users.index')->with('msg', 'User Deleted Successfully');
    }

}
