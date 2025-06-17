<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->hasRole('admin')){
            $contents = Content::orderBy('id', 'ASC')->get();
            // return $contents;
            return view('admin.contents.index', [
                'contents' => $contents
            ]);
        }else{
            return redirect()->back()->with('error' , 'You do not have permission for this action');
        }
    }
    public function edit(string $id)
    {   
        if(Auth::user()->hasRole('admin')){
                $content = Content::where('id', $id)->firstOrFail();
            // return $content;
            return view('admin.contents.edit', [
                'content' => $content
            ]);    
        }else{
            return redirect()->back()->with('error' , 'You do not have permission for this action');
        }
        
    }
    public function update(Request $request, string $id)
    {
        $content = Content::where('id', $id)->firstOrFail();
        $imageNames = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $name = uniqid() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/contents');
                $image->move($destinationPath, $name);
                $imageNames[] = $name;
            }
            $content->images = json_encode($imageNames);
        }
        $content->update($request->except('images'));
        return redirect()->route('content.index')->with('success', 'Content Updated Successfully');
    }
}
