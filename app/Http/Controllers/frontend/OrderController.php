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
        $cartTotal = Cart::subtotal(); // This is a string like "100.00"

        // dd([
        //     $request->all(),
        //     $cartItems,
        //     $cartTotal
        // ]);
        // Save order
        $order = Order::create([
            'user_id'    => Auth::id(),
            'name' => $request->name,
            'email'      => $request->email,
            'address'    => $request->address,
            'orderId' =>  $this->orderIdgenerator(),
            // 'address2'   => $request->address2,
            'city'       => $request->city,
            'state'      => $request->state,
            'zip'        => $request->zip,
            'country'    => $request->country,
            'phone'      => $request->phone,
            'total'      => floatval(str_replace(',', '', $cartTotal)),
        ]);

        // Save order items
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id'     => $order->id,
                'product_id'   => $item->id,
                'product_name' => $item->name,
                'quantity'     => $item->qty,
                'price'        => $item->price,
                'product_image' => $item->image,
                'total'        => $item->price * $item->qty,
            ]);
        }


        Cart::destroy();

        return redirect()->route('productview.index')->with('success', 'Order placed successfully!');
    }

    public function orderIdgenerator()
    {
        return 'SA-ORD' . strtoupper(Str::random(6));
    }

    public function getOrders(){
        $orders = Order::with('items.product.images')->get();
        return $orders;
    }
}
