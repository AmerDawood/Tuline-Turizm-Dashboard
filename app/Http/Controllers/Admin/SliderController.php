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

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        $sections = Section::orderByDesc('id')->get();
        $areas = Area::orderByDesc('id')->get();
        return view('dashboard.slider.edit',[
            'slider' => $slider,
            'sections' =>$sections,
            'areas' =>$areas,
        ]);
    }



    public function update(Request $request, $id)
{
    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string',
        'description' => 'required|string',
        'section_id' => 'required',
        'area_id' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation as needed
        'status' => 'nullable',
        'price' => 'nullable',
    ]);

    // Find the Slider by its ID
    $slider = Slider::find($id);

    // Check if the Slider exists
    if (!$slider) {
        return redirect()->route('sliders.index')->with('error', 'Slider not found.');
    }

    // Handle image upload if a new image is provided
    if ($request->hasFile('image')) {
        // Delete the old image using the Storage facade
        Storage::disk('public')->delete('uploads/sliders/' . $slider->image);

        // Upload the new image
        $img_name = rand() . time() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('uploads/sliders', $img_name, 'public');

        // Update the image field in the database
        $slider->image = $img_name;
    }

    // Determine the status based on the checkbox value
    $status = $request->has('status') ? 'available' : 'notavailable';

    // Update the Slider with the provided data
    $slider->name = $request->name;
    $slider->description = $request->description;
    $slider->section_id = $request->section_id;
    $slider->area_id = $request->area_id;
    $slider->status = $status;
    $slider->price = $request->price;

    $slider->save();

    return redirect()->route('sliders.index')->with('msg', 'Slider Updated Successfully');
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
