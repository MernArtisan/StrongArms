<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:product-view')->only('index');
        $this->middleware('permission:product-create')->only(['create', 'store']);
        $this->middleware('permission:product-edit')->only(['edit', 'update']);
        $this->middleware('permission:product-delete')->only('destroy');
    }
    public function index()
    { 
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
     
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|array',
            'image.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        DB::beginTransaction();

        try {
        $imagePaths = [];
    
     
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('products'), $filename);
                $imagePaths[] = 'products/' . $filename; // Save relative path
            }
        }


        $product = Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'cut_price' => $request->cut_price  ,
            'off' => $request->off,
            'quantity' => $request->quantity,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'specification' => $request->specification,
            'image' => $imagePaths[0] ?? null,
            'added_by' => auth()->user()->id
        ]);
    
        // Save all images in product_images table
        foreach ($imagePaths as $path) {
            ProductImage::create([
                'product_id' => $product->id,
                'image' => $path,
            ]);
        }
        DB::commit();

        return response()->json([
            'success' => true,
            'message' => 'Product added successfully!'
        ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Product store failed: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function edit($id)  
    {
        $product = Product::where('id', $id)->with('category')->first();
        $categories = Category::all();
        return view('admin.product.edit', compact('product','categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        DB::beginTransaction();

        try {
            $product->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'price' => $request->price,
                'cut_price' => $request->cut_price,
                'off' => $request->off,
                'quantity' => $request->quantity,
                'status' => $request->status,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'specification' => $request->specification,
            ]);

            // Handle image uploads
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $file) {
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('products'), $filename);

                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => 'products/' . $filename,
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('product.index')->with('success', 'Product updated successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Product update failed: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return back()->with('success', 'Product deleted successfully.');
    }

    public function show($id)
    {
        $product = Product::with('category', 'images')->findOrFail($id);
        return view('admin.product.show', compact('product'));
    }

    public function deleteImage($id)
    {
        $image = ProductImage::findOrFail($id);

        // Delete file from public folder
        if (file_exists(public_path($image->image))) {
            unlink(public_path($image->image));
        }

        $image->delete();

        return back()->with('success', 'Image deleted successfully.');
    }

}
