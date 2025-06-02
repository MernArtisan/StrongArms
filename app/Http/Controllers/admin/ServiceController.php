<?php

namespace App\Http\Controllers\admin;

use App\Models\Service;
use App\Models\provider_detail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        try {

            $user = Auth::user();

            if ($user->hasRole('admin')) {
                $services = Service::orderBy('created_at','desc')->get();
            } else {
                $provider = provider_detail::where('user_id', $user->id)->first();

                if ($provider) {
                    $services = Service::where('provider_id', $provider->id)->get();
                } else {
                    // No provider detail found, return empty collection
                    $services = collect(); // Empty collection
                }
            }

                
            return view('admin.services.index', compact('services'));
        } catch (\Throwable $e) {
            return back()->with('error', 'Something went wrong while loading services.');
        }
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

        $user = Auth::user()->id;
        $providerDetail = provider_detail::where('user_id', $user)->first();

        // dd($user->getRoleNames()->first());
        // return $providerDetail;

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

            // $provider = provider_detail::where('user_id', Auth::id())->first();
            // dd($provider);
            Service::create([
                'name' => $request->name,
                'provider_id' => $providerDetail->id,
                'description' => $request->description,
                'image' => $imagePath,
                'price' => $request->price,
                'type' => $request->type,
                'status' => $request->status,
                'added_by' => Auth::user()->id,
            ]);

            return redirect()->route('service.index')->with('success', 'Service added successfully.');
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)   
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
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
            $imageName = time() . '_' . $image->getClientOriginalName();
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

    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.show', compact('service'));
    }
}
