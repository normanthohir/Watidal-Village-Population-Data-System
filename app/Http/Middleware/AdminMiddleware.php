<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->status_user == 'admin') {
            return $next($request);
        }

        // Jika bukan admin, arahkan ke halaman error404
        return response()->view('users.error404', [], 403);
    }
}
