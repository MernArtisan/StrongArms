<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $blogs = Blog::paginate(10);
            return view('admin.blogs.index', compact('blogs'));
        } catch (\Exception $e) {

            return back()->with('error', 'An unexpected error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        try {


            $imagePath = null;
            if ($request->hasFile('image')) {
                $filename = time() . '_' . Str::random(10) . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('blogs'), $filename);
                $imagePath = 'blogs/' . $filename;
            }

            Blog::create([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $imagePath ?? null,
                'slug' =>  str_replace(' ', '-', strtolower($request->title)),
                'status' => $request->status,
                'added_by' => auth()->user()->id
            ]);

            return redirect()->route('blogs-upload.index')->with('success', 'Blog created successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', 'An unexpected error occurred: ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $blog = Blog::find($id);
            return view('admin.blogs.edit', compact('blog'));
        } catch (\Throwable $th) {
            return back()->with('error', 'An unexpected error occurred: ' . $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        try {
            $blog = Blog::findOrFail($id);

            if ($request->hasFile('image')) {
                if ($blog->image && file_exists(public_path($blog->image))) {
                    unlink(public_path($blog->image));
                }

                $filename = time() . '_' . Str::random(10) . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('blogs'), $filename);
                $blog->image = 'blogs/' . $filename;
            }

            $blog->title = $request->title;
            $blog->content = $request->content;
            $blog->slug = str_replace(' ', '-', strtolower($request->title));
            $blog->status = $request->status;
            $blog->added_by = auth()->user()->id;
            $blog->save();

            return redirect()->route('blogs-upload.index')->with('success', 'Blog updated successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', 'An unexpected error occurred: ' . $th->getMessage());
        }
    }

    public function show(string $id)
    {
        //
    }



    public function destroy($id)
    {
        Blog::findOrFail($id)->delete();
        return back()->with('success', 'Blog deleted successfully.');
    }
}
