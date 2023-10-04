<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UserRequest;
use Illuminate\Http\Request;

class UserRequestController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $requestes = UserRequest::where('user_id',$user->id)->orderByDesc('id')->get();

        return response()->json([
            'data' => $requestes,
        ]);
    }



    public function store(Request $request)
    {
        $user = auth()->user();


        $request->validate([
            'user_id' => 'required',
            'service_id' => 'required',
            'price' => 'required',
            'date_time' =>'required',
            'full_name' =>'required',
            'phone_number' =>'required',
            'place' =>'nullable',
        ]);


        UserRequest::create([
            'user_id' => $user->id,
            'service_id' => $request->service_id,
            'price' => $request->price,
            'date_time' =>$request->date_time,
            'full_name' =>$request->full_name,
            'phone_number' =>$request->phone_number,
            'place' =>$request->place,
        ]);

        return response()->json([
            'message' => 'User Request Created Successfully',
        ]);

    }




}
