<?php
 
namespace App\Http\Middleware;
 
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 
class CheckPermission
{
    public function handle(Request $request, Closure $next, $permission)
    {
        if (Auth::user()->hasRole('admin')) {
            return $next($request);
        }
        if (!Auth::user()->can($permission)) {
            return redirect()->route('permission-denied');
        }
 
        return $next($request);
    }
}