<?php
namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use App\Models\Cart;

class SyncCart
{
    public function handle(Login $event)
    {
        $user = $event->user;
        $sessionCart = session('cart', []);

        if (!empty($sessionCart)) {
            Cart::updateOrCreate(
                ['user_id' => $user->id],
                ['items' => $sessionCart]
            );
        }

        session()->forget('cart');
    }
}
