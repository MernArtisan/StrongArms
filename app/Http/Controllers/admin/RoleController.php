<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:role-view')->only('index');
        $this->middleware('permission:role-create')->only(['create', 'store']);
        $this->middleware('permission:role-edit')->only(['edit', 'update']);
        $this->middleware('permission:role-delete')->only('destroy');
    }
    public function index()
    {
        $roles = Role::whereNotIn('name', ['admin','user'])->get();
        return view('admin.role.index', compact('roles'));
    }


    public function create()
    {
        $permissions = Permission::all();
        return view('admin.role.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name',
            'permissions' => 'required|array',
        ]);

        $role = Role::create(['name' => $request->name]);

        $role->permissions()->sync($request->permissions);

        return redirect()->route('role.index')->with('success', 'Role created successfully!');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::orderBy('id', 'ASC')->get();
        return view('admin.role.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id, // Ensure unique name except for the current role
            'permissions' => 'required|array', // Ensure permissions array is provided
            'permissions.*' => 'exists:permissions,id', // Ensure each permission exists in the database
        ]);

        try {
            $role->update([
                'name' => $request->name,
            ]);
            $role->permissions()->sync($request->permissions);

            return redirect()->route('role.index')->with('success', 'Role updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Role $role)
    {
        try {
            $role->delete();
            return redirect()->route('role.index')->with('success', 'Role deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
