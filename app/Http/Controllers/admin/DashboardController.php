<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
                return view('admin.index', compact('users', 'services', 'products', 'orders', 'revenue', 'providers'))->with('success', 'Welcome');
            } else {
                // dd($users);
                $provider = provider_detail::where('user_id', Auth::user()->id)->value('id');
                $services = service::where('provider_id', $provider)->count();
                $orders = 0;
                $revenue = 200;
                return view('admin.index', compact('services', 'revenue'))->with('success', 'Welcome');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to fetch details');
        }
    }
}
