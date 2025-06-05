<?php

namespace App\Http\Controllers\frontend;

use Stripe\Stripe;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\OrderPlacedMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Stripe\Checkout\Session as StripeSession;

class OrderController extends Controller
{

    // public function order(Request $request)
    // {
    //     $cartItems = Cart::content();
    //     $cartTotal = Cart::subtotal();

    //     try {
    //         $request->validate([
    //             'name'     => 'required|string|max:255',
    //             'email'    => 'required|email|max:255',
    //             'address'  => 'required|string|max:500',
    //             'city'     => 'required|string|max:100',
    //             'state'    => 'required|string|max:100',
    //             'zip'      => 'nullable|string|max:20',
    //             'country'  => 'nullable|string|max:100',
    //             'phone'    => 'required|string|max:20|regex:/^[0-9+\s()-]+$/',
    //             'note'     => 'nullable|string|max:1000',
    //         ]);

    //         $order = Order::create([
    //             'user_id'     => Auth::id(),
    //             'orderId'     => $this->orderIdgenerator(),
    //             'name'        => $request->name,
    //             'email'       => $request->email,
    //             'address'     => $request->address,
    //             'city'        => $request->city,
    //             'state'       => $request->state,
    //             'zip'         => $request->zip,
    //             'country'     => $request->country,
    //             'phone'       => $request->phone,
    //             'total'       => floatval(str_replace(',', '', $cartTotal)),
    //             'order_notes' => $request->note,
    //         ]);

    //         foreach ($cartItems as $item) {

    //             // dd($item->options);
    //             OrderItem::create([
    //                 'order_id'      => $order->id,
    //                 'product_id'    => $item->id,
    //                 'product_name'  => $item->name,
    //                 'quantity'      => $item->qty,
    //                 'price'         => $item->price,
    //                 'product_image' => $item->options->image ?? null, // fallback if image is missing
    //                 'total'         => $item->price * $item->qty,
    //             ]);
    //         }

    //         Cart::destroy();

    //         return redirect()->route('productview.index')->with('success', 'Order placed successfully!');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->withInput()->withErrors([
    //             'error' => 'Something went wrong while placing your order. Please try again.',
    //         ]);
    //     }
    // }

    public function orderIdgenerator()
    {
        return 'SA-ORD' . strtoupper(Str::random(6));
    }

    public function createStripeSession(Request $request)
    {
        $cartItems = Cart::content();
        $cartTotal = Cart::subtotal();

        if ($cartItems->count() === 0) {
            return redirect()->route('cart.index')->with('error', 'Cart is empty!');
        }

        Stripe::setApiKey(config('services.stripe.secret'));

        $lineItems = [];

        foreach ($cartItems as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $item->name,
                    ],
                    'unit_amount' => $item->price * 100, // Stripe expects cents
                ],
                'quantity' => $item->qty,
            ];
        }

        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'customer_email' => $request->email,
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('order.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('order.cancel'),
            'metadata' => [
                'user_id' => Auth::id(),
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
                'country' => $request->country,
                'phone' => $request->phone,
                'note' => $request->note,

            ]
        ]);

        return redirect($session->url);
    }

    public function stripeSuccess(Request $request)
    {
        $sessionId = $request->get('session_id');

        Stripe::setApiKey(config('services.stripe.secret'));
        $session = StripeSession::retrieve($sessionId);

        $metadata = $session->metadata ?? null;
        if (!$metadata) {
            return redirect()->route('cart.index')->with('error', 'Payment metadata missing.');
        }

        $cartItems = Cart::content();
        $cartTotal = Cart::subtotal();

        $order = Order::create([
            'user_id' => $metadata->user_id,
            'orderId' => $this->orderIdgenerator(),
            'name' => $metadata->name,
            'email' => $metadata->email,
            'address' => $metadata->address,
            'city' => $metadata->city,
            'state' => $metadata->state,
            'zip' => $metadata->zip,
            'country' => $metadata->country,
            'phone' => $metadata->phone,
            'order_notes' => $metadata->note,
            'payment_method' => 'online',
            'status' => 'paid',
            'total' => floatval(str_replace(',', '', $cartTotal)),
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'product_name' => $item->name,
                'quantity' => $item->qty,
                'price' => $item->price,
                'product_image' => $item->options->image ?? null,
                'total' => $item->price * $item->qty,
            ]);
        }
        
        Mail::to($order->email)->send(new OrderPlacedMail($order));

        Cart::destroy();

        return redirect()->route('productview.index')->with('success', 'Order placed successfully via Stripe!');
    }

    public function stripeCancel()
    {
        return redirect()->route('cart.checkout')->with('error', 'Payment was cancelled.');
    }
}
