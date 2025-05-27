<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\blog_comments;

class BlogViewController extends Controller
{
    public function all_blogs()
    {
        
        $blogs = Blog::All();
        $recent_blogs = Blog::orderBy('created_at','desc')->limit(6)->get();
        return view('Frontend.blogs.all_blogs',compact('blogs','recent_blogs'));
    }

    public function detail($id)
    {
        $blog = Blog::find($id);
        $recent_blogs = Blog::orderBy('created_at','desc')->limit(6)->get();
        $blog_comments = blog_comments::where('blog_id','=',$id)->get();
        return view('Frontend.blogs.blog_details',compact('blog','recent_blogs','blog_comments'));
    }

    public function comments(Request $request)
    {
        try {

            blog_comments::create([
                'blog_id' => $request->blog_id,
                'comment' => $request->comment,
                'name' => $request->name,
                'email' => $request->email
            ]);
            return redirect()->back();

        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
