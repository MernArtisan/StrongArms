<?php

namespace App\Http\Controllers\frontend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;

class AboutController extends Controller
{
    public function index()
    {
        $content = Content::where('page_name', 'about')->first();
        return view('Frontend.About.index',compact('content'));
    }
}
