<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->roll !== 'admin') {
            return redirect('/login'); // Redirect to the login page if not an admin
        }

        return $next($request);
    }
}
