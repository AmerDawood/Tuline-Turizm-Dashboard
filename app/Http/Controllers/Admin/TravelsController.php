<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Section;
use App\Models\Travel;
use Illuminate\Http\Request;

class TravelsController extends Controller
{
    public function index()
    {
        $travels = Travel::orderByDesc('id')->paginate(6);

        return view('dashboard.travels.index',[
            'travels' =>$travels,
        ]);
    }


    public function create()
    {
        $travel = new Travel();
        $sections = Section::orderByDesc('id')->get();
        $areas = Area::orderByDesc('id')->get();
        return view('dashboard.travels.create',[
            'sections' =>$sections,
            'areas' =>$areas,
        ]);
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'section_id' =>'required',
            'area_id' =>'required',
            'image' => 'required',
            'status' => 'nullable',
            'price' =>'nullable',
            'from' =>'required',
        ]);

        // Handle image upload
        $img_name = rand() . time() . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('uploads/travels'), $img_name);

        // Determine the status based on the checkbox value
        $status = $request->has('status') ? 'available' : 'notavailable';

        // Create a new section with the provided data
        Travel::create([
            'name' => $request->name,
            'description' => $request->description,
            'section_id' =>$request->section_id,
            'area_id' =>$request->area_id,
            'image' => $img_name,
            'status' => $status,
            'price' => $request->price,
            'from' => $request->from,

        ]);

        return redirect()->route('travels.index')->with('msg', 'Travel Created Successfully');
    }
}
