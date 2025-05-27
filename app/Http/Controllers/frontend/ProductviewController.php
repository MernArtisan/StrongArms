<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\product;

class ProductviewController extends Controller
{

    public function index(Request $request)
    {
     
        $query = Product::query()->where('status', 'active');

        if ($request->filled('q')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->q . '%')
                ->orWhere('description', 'like', '%' . $request->q . '%');
            });
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }
        

        $products = $query->paginate(9)->appends($request->all());

        $category = Category::all();

        return view('frontend.products.product-view', compact('products','category'));
    }


    public function productdetail($slug)
    {
        $product = Product::where('slug', $slug)->with('category','images')->first();
        $relatedProducts = Product::where('category_id', $product->category_id)
        ->where('id', '!=', $product->id)
        ->where('status', 'active')
        ->latest()
        ->take(4)
        ->get();
        return view('frontend.products.product-detail', compact('product','relatedProducts'));
    }

    


}
