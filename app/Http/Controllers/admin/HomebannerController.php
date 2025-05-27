<?php

namespace App\Http\Controllers\admin;
use App\Models\home_banners;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HomebannerController extends Controller
{
    public function index(){
        $home_banners = home_banners::all();
        return view('admin.home-banner.index', compact('home_banners'));
    }

    public function create(){
        return view('admin.home-banner.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'status' => 'required',
        ]);
        try {
            $homeBanner = new home_banners();
            $homeBanner->title = $request->title;
            $homeBanner->description = $request->description;
            $homeBanner->status = $request->status;
            $homeBanner->redirect_url = $request->redirect_url;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();

                $image->move(public_path('uploads/homebanners/'), $imageName);

                $homeBanner->image = $imageName;
            }

            $homeBanner->save();

            return redirect()->route('homebanner.index')->with('success', 'HomeBanner created successfully!');
        } catch (\Exception $exception) {
            Log::error($exception);
            return redirect()->back()->withErrors(['error' => 'Something went wrong while creating the HomeBanner.']);
        }
    }
    public function edit($id){
        $homeBanner = home_banners::find($id);
        return view('admin.home-banner.edit',compact('homeBanner'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image',
            'status' => 'required',
        ]);

        try {
            $homeBanner = home_banners::findOrFail($id);

            $homeBanner->title = $request->title;
            $homeBanner->description = $request->description;
            $homeBanner->status = $request->status;
            $homeBanner->redirect_url = $request->redirect_url;
           
            if ($request->hasFile('image')) { 
                $image = $request->file('image');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                
                $image->move(public_path('uploads/homebanners/'), $imageName);
                
                if ($homeBanner->image && file_exists(public_path('uploads/homebanners/' . $homeBanner->image))) {
                    unlink(public_path('uploads/homebanners/' . $homeBanner->image));
                }
            
                $homeBanner->image = $imageName;
            }
            
        
            $homeBanner->save();
            return redirect()->route('homebanner.index')->with('success', 'HomeBanner updated successfully!');

           
        } catch (\Exception $exception) {
            Log::error($exception);
            return redirect()->back()->with('error', 'Something went wrong: ' . $exception->getMessage());
        }
    }   

    public function show($id){
        $homeBanner = home_banners::find($id);
        return view('admin.home-banner.show',compact('homeBanner'));
    }

    public function destroy($id){
        try {
            $homeBanner = home_banners::findOrFail($id);
            $homeBanner->delete();
            return redirect()->route('homebanner.index')->with('success', 'HomeBanner deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }  
    }
}
