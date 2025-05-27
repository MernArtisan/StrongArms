<?php 


use Illuminate\Auth\Events\Login;
use App\Listeners\SyncCart;

protected $listen = [
    Login::class => [
        SyncCart::class
    ]
]