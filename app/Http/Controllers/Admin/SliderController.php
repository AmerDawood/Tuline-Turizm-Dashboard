<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Section;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderByDesc('id')->paginate(6);
        return view('dashboard.slider.index',[
            'sliders'=>$sliders,
        ]);
    }

    public function create()
    {
        $slider = new Slider();
        $sections = Section::orderByDesc('id')->get();
        $areas = Area::orderByDesc('id')->get();
        return view('dashboard.slider.create',[
            'areas' => $areas,
            'sections' => $sections,
            'slider' => $slider,
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

        ]);

        // Handle image upload
        $img_name = rand() . time() . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('uploads/sliders'), $img_name);

        // Determine the status based on the checkbox value
        $status = $request->has('status') ? 'available' : 'notavailable';

        // Create a new section with the provided data
        Slider::create([
            'name' => $request->name,
            'description' => $request->description,
            'section_id' =>$request->section_id,
            'area_id' =>$request->area_id,
            'image' => $img_name,
            'status' => $status,
            'price' => $request->price,
        ]);

        return redirect()->route('sliders.index')->with('msg', 'Slider Created Successfully');
    }




    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

        // Check if the image file exists and delete it
        if (Storage::exists('uploads/sliders/' . $slider->image)) {
            Storage::delete('uploads/sliders/' . $slider->image);
        }

        $slider->delete();

        return redirect()->route('sliders.index')->with('msg', 'Slider Deleted Successfully');
    }

    
}
