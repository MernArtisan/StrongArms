<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminGuestMiddleware
{

    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->hasRole('admin')) {
            return redirect('/admin/dashboard');
        }

        return $next($request);
    }
}
