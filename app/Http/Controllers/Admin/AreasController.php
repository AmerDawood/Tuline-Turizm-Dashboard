<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;

class AreasController extends Controller
{
    public function index()
    {
        $areas = Area::orderByDesc('id')->paginate(7);
        return view('dashboard.areas.index',[
            'areas' => $areas,
        ]);
    }


    public function create()
    {
        $area = new Area();
        return view('dashboard.areas.create',[
            'area'=>$area,
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        Area::create([
            'title' => $request->title,
            'description' => $request->description,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect()->route('areas.index')->with('msg','Area Created Successfully');
    }



    public function edit($id)
    {
        $area = Area::findOrFail($id);
        return view('dashboard.areas.edit',[
            'area' => $area,
        ]);
    }


    public function update(Request $request, string $id)
    {

            $area = Area::findOrFail($id);

            $data = $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'latitude' => 'nullable|numeric',
                'longitude' => 'nullable|numeric',

            ]);

            $area->update($data);

            return redirect()->route('areas.index')->with('msg', 'Area updated successfully');

    }



    public function destroy($id)
    {
        $area = Area::findOrFail($id);

        $area->delete();


        return redirect()->route('areas.index')->with('msg' ,'Area Deleted Successfully');
    }
}
