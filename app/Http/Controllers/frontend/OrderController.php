<?php

namespace App\Http\Controllers\frontend;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{

    public function order(Request $request)
    {
        $cartItems = Cart::content();
        $cartTotal = Cart::subtotal(); // e.g., "100.00"

        try {
            $request->validate([
                'name'     => 'required|string|max:255',
                'email'    => 'required|email|max:255',
                'address'  => 'required|string|max:500',
                'city'     => 'required|string|max:100',
                'state'    => 'required|string|max:100',
                'zip'      => 'nullable|string|max:20',
                'country'  => 'nullable|string|max:100',
                'phone'    => 'required|string|max:20|regex:/^[0-9+\s()-]+$/',
                'note'     => 'nullable|string|max:1000',
            ]);

            $order = Order::create([
                'user_id'     => Auth::id(),
                'orderId'     => $this->orderIdgenerator(),
                'name'        => $request->name,
                'email'       => $request->email,
                'address'     => $request->address,
                'city'        => $request->city,
                'state'       => $request->state,
                'zip'         => $request->zip,
                'country'     => $request->country,
                'phone'       => $request->phone,
                'total'       => floatval(str_replace(',', '', $cartTotal)),
                'order_notes' => $request->note,
            ]);

            foreach ($cartItems as $item) {

                // dd($item->options);
                OrderItem::create([
                    'order_id'      => $order->id,
                    'product_id'    => $item->id,
                    'product_name'  => $item->name,
                    'quantity'      => $item->qty,
                    'price'         => $item->price,
                    'product_image' => $item->options->image ?? null, // fallback if image is missing
                    'total'         => $item->price * $item->qty,
                ]);
            }

            Cart::destroy();

            return redirect()->route('productview.index')->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors([
                'error' => 'Something went wrong while placing your order. Please try again.',
            ]);
        }
    }

    public function orderIdgenerator()
    {
        return 'SA-ORD' . strtoupper(Str::random(6));
    }

    public function getOrders()
    {
        $orders = Order::with('items.product.images')->get();
        return $orders;
    }
}
