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
        return view('dashboard.sections.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string',
            'image' => 'required',
            'status' => 'nullable',
        ]);

        $img_name = rand() . time() . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('uploads/sections'), $img_name);

        Section::create([
            'name' => $request->name,
            'image' => $img_name,
            'status' => $request->status,

        ]);

        return redirect()->route('sections.index')->with('msg','Section Created Successfully');
    }

    public function edit($id)
    {
        $section = Section::findOrFail($id);
        return view('dashboard.sections.edit',[
            'section' => $section,
        ]);
    }


    public function update(Request $request, string $id)
    {

            $area = Section::findOrFail($id);

            $data = $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'latitude' => 'nullable|numeric',
                'longitude' => 'nullable|numeric',

            ]);

            $area->update($data);

            return redirect()->route('sections.index')->with('msg', 'Section updated successfully');

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
