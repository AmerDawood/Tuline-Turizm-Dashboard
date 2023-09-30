<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SectionsController extends Controller
{
    public function index()
    {
        $sections = Section::orderByDesc('id')->paginate(6);

        return view('dashboard.sections.index',[
            'sections' => $sections,
        ]);
    }


    public function create()
    {
        $section = new Section();
        return view('dashboard.sections.create',['section'=>$section]);
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string',
            'image' => 'required',
            'status' => 'nullable',
        ]);

        // Handle image upload
        $img_name = rand() . time() . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('uploads/sections'), $img_name);

        // Determine the status based on the checkbox value
        $status = $request->has('status') ? 'available' : 'notavailable';

        // Create a new section with the provided data
        Section::create([
            'name' => $request->name,
            'image' => $img_name,
            'status' => $status,
        ]);

        return redirect()->route('sections.index')->with('msg', 'Section Created Successfully');
    }


    public function edit($id)
    {
        $section = Section::findOrFail($id);
        return view('dashboard.sections.edit',[
            'section' => $section,
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable|string',
            'image' => 'nullable',
            'status' => 'nullable',
        ]);

        $section = Section::findOrFail($id);

        if ($request->hasFile('image')) {
            $img_name = rand() . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('uploads/sections'), $img_name);

            if (file_exists(public_path('uploads/sections/' . $section->image))) {
                unlink(public_path('uploads/sections/' . $section->image));
            }

            $section->image = $img_name;
        }

        $section->name = $request->name;

        // Update status based on checkbox
        $status = $request->has('status') ? 'available' : 'notavailable';
        $section->status = $status;

        // Save
        $section->save();

        return redirect()->route('sections.index')->with('msg', 'Section Updated Successfully');
    }




    public function destroy($id)
    {
        $section = Section::findOrFail($id);

        // Check if the image file exists and delete it
        if (Storage::exists('uploads/sections/' . $section->image)) {
            Storage::delete('uploads/sections/' . $section->image);
        }

        $section->delete();

        return redirect()->route('sections.index')->with('msg', 'Section Deleted Successfully');
    }




}
