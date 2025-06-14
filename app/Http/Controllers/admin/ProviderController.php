<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\provider_detail;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $providers = provider_detail::with('user')->get();
        // $provider = User::with('provider')->get();

        return view('admin.provider.index', compact('providers'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.provider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Validate request
        $validator = Validator::make($request->all(), [
            'store_name'        => 'required|string|max:255',
            'store_location'    => 'required|string|max:255',
            'name'              => 'required|string|max:255',
            'email'             => 'required|email|unique:users,email',
            'password'          => 'required|string|min:6|confirmed',
            'phone'             => 'required|string|max:20',
            'zip'               => 'nullable|string|max:10',
            'country'           => 'required|string|max:100',
            'state'             => 'required|string|max:100',
            'city'              => 'required|string|max:100',
            'store_description' => 'nullable|string|max:1000',
            'logo'              => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'role'              => 'required'
        ]);

        // dd($request->all());
        if ($validator->fails()) {
            // dd($request->all());
            return back()->withErrors($validator)->withInput();
        }
        // dd($request->all());
        DB::beginTransaction();

        try {
            // Handle logo upload to public folder
            $logoPath = null;
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logoName = time() . '_' . uniqid() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('users'), $logoName);
                $logoPath = 'users/' . $logoName; // relative public path
            }

            // Create user
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'phone'    => $request->phone,
                'image'    => $logoPath,
                'status'   => 'in_active',
            ]);
            if ($request->role === 'provider') {
                $role = Role::where('name', 'provider')->first();
            } else {
                $role = Role::where('name', 'customer')->first();
            }

            // Create provider details
            provider_detail::create([
                'user_id'           => $user->id,
                'logo'              => $logoPath,
                'store_name'        => $request->store_name,
                'store_location'    => $request->store_location,
                'lat'               => $request->latitude,
                'long'              => $request->longitude,
                'established_since'  => $request->established_since,
                'owner_name'        => $request->name,
                'email'             => $request->email,
                'password'          => Hash::make($request->password),
                'phone_number'      => $request->phone,
                'zip'          => $request->zip,
                'country'           => $request->country,
                'state'             => $request->state,
                'city'              => $request->city,
                'website'           => $request->website,
                'store_description' => $request->store_description,
            ]);

            $user->roles()->attach($role->id);
            DB::commit();

            return redirect()->route('provider.index')->with('success', 'Trainer registered successfully.');
        } catch (\Exception $e) {

            DB::rollBack();
            Log::error('Trainer Registration Error: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }


    public function edit($id)
    {
        $provider = provider_detail::with('user')->findOrFail($id);
        // dump($id);
        return view('admin.provider.edit', compact('provider'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $provider = provider_detail::with('user')->findOrFail($id);
        // dd($provider->id);

        if (!$provider->user) {
            return back()->with('error', 'User related to provider not found.');
        }


        $validator = Validator::make($request->all(), [
            'store_name'        => 'required|string|max:255',
            'store_location'    => 'required|string|max:255',
            'name'              => 'required|string|max:255',
            'email'             => 'required|email|unique:users,email,' . $provider->user->id,
            'password'          => 'nullable|string|min:6|confirmed',
            'phone'             => 'required|string|max:20',
            'zip'               => 'nullable|string|max:10',
            'country'           => 'required|string|max:100',
            'state'             => 'required|string|max:100',
            'city'              => 'required|string|max:100',
            'store_description' => 'nullable|string|max:1000',
            'logo'              => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'role'              => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $logoPath = $provider->logo;

            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logoName = time() . '_' . uniqid() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('users'), $logoName);
                $logoPath = 'users/' . $logoName;
            }

            $user = $provider->user;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->image = $logoPath;
            $user->status = 'in_active';

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            $user->save();

            $provider->update([
                'logo'              => $logoPath,
                'store_name'        => $request->store_name,
                'store_location'    => $request->store_location,
                'lat'               => $request->latitude,
                'long'              => $request->longitude,
                'established_year'  => $request->established_since,
                'owner_name'        => $request->name,
                'email'             => $request->email,
                'password'          => $request->filled('password') ? Hash::make($request->password) : $provider->password,
                'phone_number'      => $request->phone,
                'zip_code'          => $request->zip,
                'country'           => $request->country,
                'state'             => $request->state,
                'city'              => $request->city,
                'website'           => $request->website,
                'store_description' => $request->store_description,
            ]);

            $role = Role::where('name', $request->role)->first();
            if ($role) {
                $user->syncRoles([$role->id]);
            }

            DB::commit();
            return back()->with('success', 'Trainer updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Trainer Update Error: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            // Find provider by user_id and eager load user
            $provider = provider_detail::where('user_id', $id)->first();

            if (!$provider) {
                return redirect()->back()->with('error', 'Provider not found.');
            }

            // Delete associated user
            $user = User::find($id);
            if ($user) {
                $user->delete();
            }

            // Delete provider record


            DB::commit();

            return redirect()->back()->with('success', 'Provider deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Provider Deletion Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
}
