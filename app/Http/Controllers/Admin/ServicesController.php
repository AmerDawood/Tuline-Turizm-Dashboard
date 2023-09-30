<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Section;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $service = new Service();
        $sections = Section::orderByDesc('id')->get();
        $areas = Area::orderByDesc('id')->get();
        return view('dashboard.services.create',[
            'sections' => $sections,
            'areas' => $areas,
            'service' =>$service,
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


    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $sections = Section::orderByDesc('id')->get();
        $areas = Area::orderByDesc('id')->get();
        return view('dashboard.services.edit',[
            'service' => $service,
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
                'days_number' => 'nullable',
                'from' => 'required',
            ]);

            // Find the service by its ID
            $service = Service::find($id);

            // Check if the service exists
            if (!$service) {
                return redirect()->route('services.index')->with('error', 'Service not found.');
            }

            // Handle image upload if a new image is provided
            if ($request->hasFile('image')) {
                // Delete the old image, if it exists
                if (file_exists(public_path('uploads/services/' . $service->image))) {
                    // unlink(public_path('uploads/services/' . $service->image));
                    Storage::delete('uploads/services/' . $service->image);
                }

                // Upload the new image
                $img_name = rand() . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('uploads/services'), $img_name);

                // Update the image field in the database
                $service->image = $img_name;
            }

            // Determine the status based on the checkbox value
            $status = $request->has('status') ? 'available' : 'notavailable';

            // Update the service with the provided data
            $service->name = $request->name;
            $service->description = $request->description;
            $service->section_id = $request->section_id;
            $service->area_id = $request->area_id;
            $service->status = $status;
            $service->price = $request->price;
            $service->days_number = $request->days_number;
            $service->from = $request->from;

            $service->save();

            return redirect()->route('services.index')->with('msg', 'Service Updated Successfully');
        }





    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        // Check if the image file exists and delete it
        if (Storage::exists('uploads/services/' . $service->image)) {
            Storage::delete('uploads/services/' . $service->image);
        }

        $service->delete();

        return redirect()->route('services.index')->with('msg', 'Service Deleted Successfully');
    }


}
