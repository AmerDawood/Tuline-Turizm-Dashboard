<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Section;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::orderByDesc('id')->paginate(6);

        return view('dashboard.services.index',[
            'services' =>$services,
        ]);
    }


    public function create()
    {
        $sections = Section::orderByDesc('id')->get();
        $areas = Area::orderByDesc('id')->get();
        return view('dashboard.services.create',[
            'sections' => $sections,
            'areas' => $areas,
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
            'days_number' =>'nullable',

            'from' =>'required',
        ]);

        // Handle image upload
        $img_name = rand() . time() . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('uploads/services'), $img_name);

        // Determine the status based on the checkbox value
        $status = $request->has('status') ? 'available' : 'notavailable';

        // Create a new section with the provided data
        Service::create([
            'name' => $request->name,
            'description' => $request->description,
            'section_id' =>$request->section_id,
            'area_id' =>$request->area_id,
            'image' => $img_name,
            'status' => $status,
            'price' => $request->price,
            'days_number' => $request->days_number,
            'from' => $request->from,

        ]);

        return redirect()->route('services.index')->with('msg', 'Service Created Successfully');
    }
}
