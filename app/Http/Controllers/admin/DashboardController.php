<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::wherenotin('id', [1])->count();
        $products = Product::count();
        return view('admin.index',compact('users','products'));
    }
}
