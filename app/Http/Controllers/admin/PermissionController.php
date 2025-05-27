<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:permission-view')->only('index');
        $this->middleware('permission:permission-create')->only(['create', 'store']);
        $this->middleware('permission:permission-edit')->only(['edit', 'update']);
        $this->middleware('permission:permission-delete')->only('destroy');
    }
    public function index()
    {
        try {
            $permissions = Permission::orderBy('id','asc')->get();
            return view('admin.permission.index', compact('permissions'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name|max:255', 
            'details' => 'nullable', 
        ]);

        try {
            Permission::create([
                'name' => $request->name,
                'details' => $request->details,
            ]);
            return redirect()->route('permission.index')->with('success', 'Permission created successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function denied()
    {
        return view('admin.error.errors-403');
    }

}
