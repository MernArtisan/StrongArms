<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\provider_detail;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            if (Auth::user()->hasRole('admin')) {
                $users = User::role('customer')->count();
                $providers = User::role('provider')->count();

                // dd($users);
                $products = Product::count();
                $orders = Order::count();
                $services = service::count();
                $revenue = Order::sum('total');
                $bookings = Booking::count();
                return view('admin.index', compact('users', 'services', 'products', 'orders', 'revenue', 'providers' ,'bookings'))->with('success', 'Welcome');
            } else {
                // dd($users);
                $provider = provider_detail::where('user_id', Auth::user()->id)->value('id');
                $services = service::where('provider_id', $provider)->count();
                $bookings = Booking::where('provider_id', $provider)->count();
                $revenue = Payment::sum('amount');
                return view('admin.index', compact('services', 'revenue' , 'bookings'))->with('success', 'Welcome');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to fetch details');
        }
    }
}
