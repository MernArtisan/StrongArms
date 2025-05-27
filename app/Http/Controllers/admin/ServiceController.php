<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Controllers\Controller;
class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:services-view')->only('index');
        $this->middleware('permission:services-create')->only(['create', 'store']);
        $this->middleware('permission:services-edit')->only(['edit', 'update']);
        $this->middleware('permission:services-delete')->only('destroy');
    }
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'price' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'status' => 'required|string',
        ]);


        try {
            // Image Upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('services'), $imageName);
                $imagePath = 'services/' . $imageName;
            } else {
                $imagePath = null;
            }
        
            Service::create([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $imagePath,
                'price' => $request->price,
                'type' => $request->type,
                'status' => $request->status,
                'added_by' => auth()->user()->id,
            ]);

            return redirect()->route('service.index')->with('success', 'Service added successfully.');
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit',compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'status' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('services'), $imageName);
            $service->image = 'services/' . $imageName;
        }

        $service->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'type' => $request->type,
            'status' => $request->status,
            'image' => $service->image,
        ]);

        return redirect()->route('service.index')->with('success', 'Service updated successfully.');
    } 

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->route('service.index')->with('success', 'Service deleted successfully.');
    }
}
