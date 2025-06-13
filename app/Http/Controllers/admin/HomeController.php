<?php

namespace App\Http\Controllers\admin;

use App\Models\Blog;
use App\Models\Content;
use App\Models\General;
use App\Models\Product;
use App\Models\service;
use App\Models\Category;
use App\Models\home_banners;
use Illuminate\Http\Request;
use App\Models\provider_detail;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $banners = home_banners::where('status', 1)->get();
        $Product = Product::limit(10)->get();
        $Content = Content::where('id', 1)->first();
        $categories = Category::all();
        $blogs = Blog::limit(3)->get();
        $providers = provider_detail::inRandomOrder()->take(3)->get();
        $contacts = General::findOrFail(1);
        return view('frontend.index', compact('banners', 'Product', 'Content', 'categories', 'blogs', 'providers', 'contacts'));
    }

    public function getByCategory($id)
    {
        $products = Product::where('category_id', $id)->get();

        return response()->json([
            'html' => view('Frontend.partials.product-cards', compact('products'))->render()
        ]);
    }

    public function trainerservices($id)
    {
        $services = service::where('provider_id', $id)->where('status', 'active')->get();
        return view('Frontend.services.providerservice', compact('services'));
    }

    public function trainers()
    {
        $providers = provider_detail::get();
        return view('Frontend.trainer.index', compact('providers'));
    }
}
