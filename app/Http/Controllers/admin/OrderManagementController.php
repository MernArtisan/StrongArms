<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderManagementController extends Controller
{
    public function index()
    {
        $isAdmin = Auth::user()->hasRole('admin');
        if ($isAdmin) {
            $orders = Order::orderBy('created_at', 'desc')->get();
            return view('admin.order.index', compact('orders'));
        } else {
            return redirect()->route('permission-denied');
        }
    }

    public function show($id)
    {

        if (Auth::user()->hasRole('admin')) {
            $order = Order::with('items')->findOrFail($id);

            return view('admin.order.show', compact('order'));
        }else{
            return redirect()->route('permission-denied');
        }
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'order_status' => 'required'
        ]);

        $order = Order::findOrFail($id);
        $order->order_status = $request->order_status;
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }
}
