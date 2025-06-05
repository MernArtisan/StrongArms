<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\provider_detail;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class AuthConroller extends Controller
{

    public function login()
    {
        return view('Frontend.auth.login');
    }

    public function Authenticate(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (Auth::attempt($request->only('email', 'password'))) {
                $user = Auth::user();

                // ✅ Restore pre-login cart (if available)
                $preLoginCart = session('pre_login_cart', []);
                if (!empty($preLoginCart)) {
                    Cart::destroy();

                    foreach ($preLoginCart as $item) {
                        Cart::add([
                            'id' => $item['id'],
                            'name' => $item['name'],
                            'qty' => $item['qty'],
                            'price' => $item['price'],
                            'options' => $item['options'] ?? [],
                        ]);
                    }

                    session()->forget('pre_login_cart');
                }

                return redirect()->intended('/')->with('success', 'Welcome back!');
            }

            return back()->with('error', 'Invalid email or password. Please try again.');
        } catch (\Throwable $th) {
            return back()->with('error', 'An unexpected error occurred: ' . $th->getMessage());
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function register()
    {
        return view('Frontend.auth.register');
    }

    public function registerSubmit(Request $request)
    {

        try {
            $request->validate([
                'name'                  => 'required|string|max:255',
                'email'                 => 'required|email|unique:users,email',
                'password'              => 'required|string|min:6|confirmed', // checks password_confirmation
                'phone'                 => 'nullable|string|max:255',
                'company_name'          => 'nullable|string|max:255',
                'website'               => 'nullable|url|max:255',
                'address_line'          => 'nullable|string|max:255',
                'shipping-option'       => 'nullable|in:on',
            ]);

            DB::beginTransaction();

            $role = Role::where('id', 3)->first();

            $user = User::create([
                'name'         => $request->name,
                'email'        => $request->email,
                'password'     => Hash::make($request->password),
                'phone'        => $request->phone,
                'company_name' => $request->company_name,
                'website'      => $request->website,
                'address'      => $request->address_line,
                'shipping_option' => $request->has('shipping-option') ? true : false,
            ]);
            $user->roles()->attach($role->id);
            DB::commit();
            return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }


    public function profile()
    {
        $user = Auth::user();
        return view('admin.auth.profile', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        try {
            $user = Auth::user();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();

                // Create folder if not exists
                $destinationPath = public_path('users');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }
                $image->move($destinationPath, $imageName);

                // Save path to DB
                $imagePath = 'users/' . $imageName;
            } else {
                $imagePath = $user->image;
            }

            // Update user data
            $user->update([
                'name'          => $request->name,
                'email'         => $request->email,
                'phone'         => $request->phone,
                'company_name'  => $request->company_name,
                'website'       => $request->website,
                'address_line'  => $request->address_line,
                'city'          => $request->city,
                'state'         => $request->state,
                'country'       => $request->country,
                'zip'           => $request->zip,
                'gender'        => $request->gender,
                'image'         => $imagePath,
            ]);

            return redirect()->back()->with('success', 'Profile updated successfully.');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable',
            'website' => 'nullable',
            'address_line' => 'nullable',
            'city' => 'nullable',
            'state' => 'nullable',
            'country' => 'nullable',
            'zip' => 'nullable',
            'company_name' => 'nullable',
            'gender' => 'nullable',
        ]);

        auth()->user()->update($request->only('name', 'email', 'phone', 'website', 'address_line', 'city', 'state', 'country', 'zip', 'company_name', 'gender'));

        return back()->with('success', 'Profile updated successfully!');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:6',
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return back()->with('error', 'Current password is incorrect.');
        }

        auth()->user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password changed successfully.');
    }

    public function RegisterTrainer(Request $request)
    {
        return view('frontend.auth.register-trainer');
    }


    public function registerTrainerSubmit(Request $request)
    {
        // dd($request->all());
        // Validate request
        $validator = Validator::make($request->all(), [
            'store_name'        => 'required|string|max:255',
            'store_location'    => 'required|string|max:255',
            'owner_name'        => 'required|string|max:255',
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
                'name'     => $request->owner_name,
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
                'established_year'  => $request->established_since,
                'owner_name'        => $request->owner_name,
                'email'             => $request->email,
                'password'          => Hash::make($request->password),
                'phone_number'      => $request->phone,
                'zip_code'          => $request->zip,
                'country'           => $request->country,
                'state'             => $request->state,
                'city'              => $request->city,
                'website'           => $request->website,
                'store_description' => $request->store_description,
            ]);

            $user->roles()->attach($role->id);
            DB::commit();

            return back()->with('success', 'Trainer registered successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Trainer Registration Error: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
