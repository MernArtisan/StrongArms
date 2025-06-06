<?php

namespace App\Http\Controllers\frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function profile()
    {
        return view('Frontend.account.partail.profile');
    }

    public function order(){
        return view('Frontend.account.partail.order');
    }
}
