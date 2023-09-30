<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Offer;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OffersController extends Controller
{
    public function index()
    {
        $offers = Offer::orderByDesc('id')->paginate(6);
        return view('dashboard.offers.index',[
            'offers' => $offers,
        ]);
    }


    public function create()
    {
        $offer = new Offer();
        $sections = Section::orderByDesc('id')->get();
        $areas = Area::orderByDesc('id')->get();
        return view('dashboard.offers.create',[
            'sections' =>$sections,
            'areas' =>$areas,
            'offer' => $offer,
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
            'days_numaber' =>'nullable',

        ]);

        // Handle image upload
        $img_name = rand() . time() . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('uploads/offers'), $img_name);

        // Determine the status based on the checkbox value
        $status = $request->has('status') ? 'available' : 'notavailable';

        // Create a new section with the provided data
        Offer::create([
            'name' => $request->name,
            'description' => $request->description,
            'section_id' =>$request->section_id,
            'area_id' =>$request->area_id,
            'image' => $img_name,
            'status' => $status,
            'price' => $request->price,
            'days_number' => $request->days_number,
        ]);

        return redirect()->route('offers.index')->with('msg', 'Offer Created Successfully');
    }


    public function edit($id)
    {
        $offer = Offer::findOrFail($id);
        $sections = Section::orderByDesc('id')->get();
        $areas = Area::orderByDesc('id')->get();
        return view('dashboard.offers.edit',[
            'offer' => $offer,
            'sections' =>$sections,
            'areas' =>$areas,
        ]);
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable|string',
            'description' => 'nullable|string',
            'section_id' =>'nullable',
            'area_id' =>'nullable',
            'image' => 'nullable',
            'status' => 'nullable',
        ]);

        $offer = Offer::findOrFail($id);

        if ($request->hasFile('image')) {
            $img_name = rand() . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('uploads/offers'), $img_name);

            if (file_exists(public_path('uploads/offers/' . $offer->image))) {
                unlink(public_path('uploads/offers/' . $offer->image));
            }

            $offer->image = $img_name;
        }

        $offer->name = $request->name;
        $offer->description = $request->description;
        $offer->section_id = $request->section_id;
        $offer->area_id = $request->area_id;


        // Update status based on checkbox
        $status = $request->has('status') ? 'available' : 'notavailable';
        $offer->status = $status;

        // Save
        $offer->save();

        return redirect()->route('offers.index')->with('msg', 'Offer Updated Successfully');
    }


    public function destroy($id)
    {
        $offer = Offer::findOrFail($id);

        // Check if the image file exists and delete it
        if (Storage::exists('uploads/offers/' . $offer->image)) {
            Storage::delete('uploads/offers/' . $offer->image);
        }

        $offer->delete();

        return redirect()->route('offers.index')->with('msg', 'Offer Deleted Successfully');
    }


}
