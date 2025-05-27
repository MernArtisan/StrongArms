<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\home_banners;
use App\Models\Product;
use App\Models\Content;
use App\Models\Category;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        $banners = home_banners::where('status', 1)->get();
        $Product = Product::limit(10)->get();
        $Content = Content::where('id',1)->first();
        $categories = Category::all();
        $blogs = Blog::limit(3)->get();
        return view('frontend.index', compact('banners','Product','Content','categories','blogs'));
    }

    public function getByCategory($id)
    {
        $products = Product::where('category_id', $id)->get();

        return response()->json([
            'html' => view('Frontend.partials.product-cards', compact('products'))->render()
        ]);
    }
}
