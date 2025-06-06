<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    public function handle(Request $request, Closure $next, $permission = null)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }


        if ($user->hasRole('admin')) {
            return $next($request);
        }

        if ($user->hasRole('provider')) {
            if ($permission && !$user->can($permission)) {
                return redirect()->back()->with(
                    'error',
                    'You do not have permission to perform this action.'
                );
            }
            return $next($request);
        }

        // User has no required roles, either abort or redirect with error message
        if ($request->expectsJson()) {
            abort(403, 'Unauthorized');
        }

        return redirect()->back()->withErrors([
            'error' => 'You do not have permission to access this resource.'
        ]);
    }
}
