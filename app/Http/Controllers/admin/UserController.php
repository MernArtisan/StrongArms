<?php

namespace App\Http\Controllers\admin;

use Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
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
            $users = User::wherenotin('id', [1])->get();
            return view('admin.users.index', compact('users'));
        } catch (\Exception $th) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function create()
    {
        try {
            $roles = DB::table('roles')->wherenotin('id', [1])->get();
            return view('admin.users.create', compact('roles'));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        // return $request->all();
        $rules = [
            'role' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'country' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'zip' => 'nullable|string|max:20',
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];

        $request->validate($rules);

        DB::beginTransaction();

        try {
            if ($request->role === 'provider') {
                $role = Role::where('name', 'provider')->first();
            } else {
                $role = Role::where('name', 'customer')->first();
            }
            $imagePath = null;
            if ($request->hasFile('image')) {
                $filename = time() . '_' . Str::random(10) . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('users'), $filename);
                $imagePath = 'users/' . $filename;
            }

            // Create user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_type' => $request->user_type,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'zip' => $request->zip,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'image' => $imagePath,
                'address_line' => $request->address_line,
                'website' => $request->website,
                'company_name' => $request->company_name
            ]);


            // Attach role
            $user->roles()->attach($role->id);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'User created successfully.',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('User creation failed: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function edit($id)
    {
        try {
            $user = User::find($id);
            $roles = DB::table('roles')->wherenotin('id', [1])->get();
            return view('admin.users.edit', compact('user', 'roles'));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $user = User::find($id);
            // Upload image if updated
            if ($request->hasFile('image')) {
                $filename = time() . '_' . Str::random(10) . '.' . $request->image->extension();
                $request->image->move(public_path('users'), $filename);
                $user->image = 'users/' . $filename;
            }

            $user->update($request->only([
                'name',
                'email',
                'phone',
                'country',
                'state',
                'city',
                'zip',
                'website',
                'company_name',
                'gender',
                'address_line'
            ]));

            // Update role
            if ($request->role) {
                $role = Role::where('name', $request->role)->first();
                $user->roles()->sync([$role->id]);
            }

            DB::commit();
            return response()->json(['success' => true, 'message' => 'User updated successfully.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Update failed.', 'error' => $e->getMessage()], 500);
        }
    }



    public function show()
    {
        try {
            return view('admin.users.show');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            User::findOrFail($id)->delete();
            return back()->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
