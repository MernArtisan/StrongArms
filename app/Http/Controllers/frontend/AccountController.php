<?php

namespace App\Http\Controllers\frontend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{

    public function profile()
    {
        return view('Frontend.account.partail.profile');
    }

    public function orders()
    {
        $order = Order::where('user_id', Auth::user()->id)->get();
        // dd($order);
        return view('Frontend.account.partail.order', compact('order'));
    }

    public function booking()
    {
        $bookings = Booking::with(['service.provider', 'availability'])
            ->where('user_id', Auth::id())
            ->orderBy('date', 'desc')
            ->get();
        // return $bookings;
        return view('Frontend.account.partail.booking', compact('bookings'));
    }


    public function edit()
    {
        return view('Frontend.account.partail.edit');
    }


    public function editprofile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'nullable|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $user->name = $request->name;
        $user->country = $request->country;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address_line = $request->address;

        if ($request->hasFile('profile_picture')) {
            if ($user->image && File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }

            $image = $request->file('profile_picture');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('users'), $imageName);

            $user->image = 'users/' . $imageName;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function orderDetails($orderId)
    {
        $order = Order::where('orderId', $orderId)->with('items', 'user')->firstOrFail();
        return view('Frontend.account.partail.order-details-modal', compact('order'));
    }

    public function showResetForm()
    {
        return view('Frontend.account.partail.reset-password');
    }

    public function changePassword(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password is incorrect.');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Password changed successfully!');
    }
}
