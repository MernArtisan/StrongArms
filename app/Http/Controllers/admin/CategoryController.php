<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user-view')->only('index');
        $this->middleware('permission:user-create')->only(['create', 'store']);
        $this->middleware('permission:user-edit')->only(['edit', 'update']);
        $this->middleware('permission:user-delete')->only('destroy');
    }
    public function index()
    {
        try {
            $categories = Category::paginate(10);
            return view('admin.category.index', compact('categories'));
        } catch (\Throwable $th) {
            return back()->with('error', 'An unexpected error occurred: ' . $th->getMessage());
        }
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255'
            ]);

            Category::create(['name' => $request->name]);

            return back()->with('success', 'Category added successfully.');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255'
            ]);


            $category = Category::findOrFail($id);
            $category->update(['name' => $request->name]);

            return back()->with('success', 'Category updated successfully.');
        } catch (\Throwable $th) {
            return back()->with('error', 'An unexpected error occurred: ' . $th->getMessage());
        }
    }



    public function show($id)
    {
        Category::findOrFail($id)->delete();

        return back()->with('success', 'Category deleted.');
    }
}
