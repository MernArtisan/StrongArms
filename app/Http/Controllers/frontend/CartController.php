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
        $cartItems = Cart::content();  // get all cart items
        $cartTotal = Cart::total();    // get cart total

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
        $cartTotal = Cart::subtotal();
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
}


    // public function index()
    // {
    //     $cart = session()->get('cart', []);
    //     return view('cart.index', compact('cart'));
    // }

    // public function add(Request $request)
    // {
    //     $product = Product::findOrFail($request->id);

    //     $cart = session()->get('cart', []);

    //     if (isset($cart[$product->id])) {
    //         $cart[$product->id]['quantity'] += 1;
    //     } else {
    //         $cart[$product->id] = [
    //             'name' => $product->name,
    //             'price' => $product->price,
    //             'quantity' => 1,
    //         ];
    //     }

    //     session()->put('cart', $cart);

    //     return response()->json(['success' => 'Product added to cart!']);
    // }

    // public function update(Request $request)
    // {
    //     $cart = session()->get('cart');
    //     $cart[$request->id]["quantity"] = $request->quantity;
    //     session()->put('cart', $cart);
    //     return redirect()->back()->with('success', 'Cart updated!');
    // }
    // public function remove(Request $request)
    // {
    //     $cart = session()->get('cart', []);

    //     if (isset($cart[$request->id])) {
    //         unset($cart[$request->id]);
    //         session()->put('cart', $cart);
    //         return response()->json(['success' => 'Item removed!']);
    //     }

    //     return response()->json(['error' => 'Item not found.'], 404);
    // }


    // public function clear()
    // {
    //     session()->forget('cart');
    //     return redirect()->back()->with('success', 'Cart cleared!');
    // }

    // public function miniCart()
    // {
    //     $cart = session()->get('cart', []);

    //     $subtotal = 0;

    //     $html = '<ul class="product_list_widget">';

    //     foreach ($cart as $id => $item) {
    //         $itemTotal = $item['price'] * $item['quantity'];
    //         $subtotal += $itemTotal;

    //         $html .= '
    //         <li class="mini_cart_item">
    //             <a href="#">
    //                 <img src="' . asset('assets/images/products/5.jpg') . '" alt="" />
    //                 <p class="product-name">' . $item['name'] . '</p>
    //             </a>
    //             <p class="quantity">' . $item['quantity'] . ' x <strong class="Price-amount">$' . number_format($item['price'], 2) . '</strong></p>
    //             <a href="#" class="remove" data-id="' . $id . '" title="Remove this item">x</a>
    //         </li>';
    //     }

    //     $html .= '</ul>';
    //     $html .= '<p class="total"><strong>Subtotal:</strong> <span class="amount">$' . number_format($subtotal, 2) . '</span></p>';
    //     $html .= '<p class="buttons">
    //                 <a href="' . route('cart.index') . '" class="btn1">View Cart</a>
    //                 <a href="#" class="btn2">Checkout</a>
    //             </p>';

    //     return response()->json(['html' => $html]);
    // }