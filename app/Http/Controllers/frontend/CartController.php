<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request)
    {
        $product = Product::findOrFail($request->id);

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += 1;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['success' => 'Product added to cart!']);
    }

    public function update(Request $request)
    {
        $cart = session()->get('cart');
        $cart[$request->id]["quantity"] = $request->quantity;
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Cart updated!');
    }
    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
            return response()->json(['success' => 'Item removed!']);
        }

        return response()->json(['error' => 'Item not found.'], 404);
    }


    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Cart cleared!');
    }

    public function miniCart()
    {
        $cart = session()->get('cart', []);

        $subtotal = 0;
        
        $html = '<ul class="product_list_widget">';

        foreach ($cart as $id => $item) {
            $itemTotal = $item['price'] * $item['quantity'];
            $subtotal += $itemTotal;

            $html .= '
            <li class="mini_cart_item">
                <a href="#">
                    <img src="' . asset('assets/images/products/5.jpg') . '" alt="" />
                    <p class="product-name">' . $item['name'] . '</p>
                </a>
                <p class="quantity">' . $item['quantity'] . ' x <strong class="Price-amount">$' . number_format($item['price'], 2) . '</strong></p>
                <a href="#" class="remove" data-id="' . $id . '" title="Remove this item">x</a>
            </li>';
        }

        $html .= '</ul>';
        $html .= '<p class="total"><strong>Subtotal:</strong> <span class="amount">$' . number_format($subtotal, 2) . '</span></p>';
        $html .= '<p class="buttons">
                    <a href="' . route('cart.index') . '" class="btn1">View Cart</a>
                    <a href="#" class="btn2">Checkout</a>
                </p>';

        return response()->json(['html' => $html]);
    }

}
