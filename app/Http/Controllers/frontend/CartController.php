<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{


    public function index()
    {
        $cartItems = Cart::content();
        // return $cartItems;  // get all cart items
        $cartTotal = Cart::subtotal();  
        // return $cartTotal;  // get cart total

        // dd($cartItems->all());
        return view('frontend.cart.index', compact('cartItems', 'cartTotal'));
    }

    // Add product to cart
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'sometimes|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);
        $quantity = $request->quantity ?? 1;

        // Check if item already exists in the cart
        $existingItem = Cart::search(function ($cartItem, $rowId) use ($product) {
            return $cartItem->id === $product->id;
        })->first();

        if ($existingItem) {
            Cart::update($existingItem->rowId, $existingItem->qty + $quantity);
            $status = 'updated';
            $message = 'Cart updated successfully.';
        } else {
            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $quantity,
                'price' => $product->price,
                'options' => [
                    'image' => $product->image,
                    'specification' => $product->specification,
                ],
            ]);
            $status = 'added';
            $message = 'Added to cart!';
        }

        $cartItems = Cart::content()->map(function ($item) {
            return [
                'rowId' => $item->rowId,
                'name' => $item->name,
                'qty' => $item->qty,
                'price' => $item->price,
                'options' => [
                    'image' => $item->options->image ?? 'default.jpg'
                ]
            ];
        })->values();

        return response()->json([
            'status' => $status,
            'message' => $message,
            'cartItems' => $cartItems,
            'cartTotal' => Cart::subtotal(),
            'cartCount' => Cart::count()
        ]);
    }



    // Update cart item quantity
    public function update(Request $request)
    {
        $rowId = $request->rowId;     // cart item row id
        $quantity = $request->quantity;

        Cart::update($rowId, $quantity);

        return response()->json([
            'message' => 'Cart updated successfully.'
        ]);
    }

    // Remove a cart item
    public function remove(Request $request)
    {
        $rowId = $request->rowId;

        Cart::remove($rowId);

        return response()->json([
            'message' => 'Product removed from cart.'
        ]);
    }

    // Clear entire cart
    public function clear()
    {
        Cart::destroy();

        return response()->json([
            'message' => 'Cart cleared successfully.'
        ]);
    }

    // Optional: get mini cart content (small summary, useful for header cart icon)
    public function miniCart()
    {
        $cartItems = Cart::content(); 
        $cartCount = Cart::count();

        $items = $cartItems->map(function ($item) {
            return [
                'rowId' => $item->rowId,
                'name' => $item->name,
                'qty' => $item->qty,
                'price' => $item->price,
                'options' => [
                    'image' => $item->options->image ?? 'default.jpg'
                ]
            ];
        })->values();

        return response()->json([
            'cartItems' => $items,
            'cartTotal' => number_format(Cart::subtotal(2, '.', ''), 2, '.', ''),
            'cartCount' => $cartCount
        ]);
    }

    public function checkout(){

        $cartItems = Cart::content();
        $cartTotal = Cart::subtotal(); 
         
        return view('Frontend.Cart.checkout', compact('cartItems', 'cartTotal'));

        
    }
}


    