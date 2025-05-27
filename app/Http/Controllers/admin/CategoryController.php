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
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        try{
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Category::create(['name' => $request->name]);

        return back()->with('success', 'Category added successfully.');
    }catch(\Throwable $th){
        return back()->with('error', $th->getMessage());
    }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]); 
        

        $category = Category::findOrFail($id);
        $category->update(['name' => $request->name]);

        return back()->with('success', 'Category updated successfully.');
    }



    public function show($id)
    {
        Category::findOrFail($id)->delete();

        return back()->with('success', 'Category deleted.');
    }
    
    

}
