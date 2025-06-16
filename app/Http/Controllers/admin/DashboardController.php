<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Product;
use App\Models\service;
use Illuminate\Http\Request;
use App\Models\provider_detail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            if (Auth::user()->hasRole('admin')) {
                $users = User::role('customer')->count();
                $providers = User::role('provider')->count();
                $products = Product::count();
                $orders = Order::count();
                $services = Service::count();
                $revenue = Order::sum('total');
                $bookings = Booking::count();

                // Group monthly revenue by Month + Year
                $revenueChartData = Order::selectRaw("DATE_FORMAT(created_at, '%b %Y') as month_year, SUM(total) as revenue")
                    ->groupBy('month_year')
                    ->orderByRaw("MIN(created_at)")
                    ->get();

                return view('admin.index', compact(
                    'users',
                    'services',
                    'products',
                    'orders',
                    'revenue',
                    'providers',
                    'bookings',
                    'revenueChartData'
                ))->with('success', 'Welcome');
            } else {
                $provider = provider_detail::where('user_id', Auth::user()->id)->value('id');
                $services = service::where('provider_id', $provider)->count();
                $bookings = Booking::where('provider_id', $provider)->count();
                $revenue = Payment::sum('amount');

                $revenueChartData = Payment::selectRaw("DATE_FORMAT(created_at, '%b %Y') as month_year, SUM(amount) as revenue")
                    ->groupBy('month_year')
                    ->orderByRaw("MIN(created_at)")
                    ->get();

                return view('admin.index', compact('services', 'revenue', 'bookings', 'revenueChartData'))->with('success', 'Welcome');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to fetch details' . $e->getMessage());
        }
    }
}
