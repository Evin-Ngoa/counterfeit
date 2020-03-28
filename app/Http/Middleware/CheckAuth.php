<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if the logged in is an Admin
        if (User::checkAuth()) {
            return $next($request);
        }
        return redirect('/auth/login');
    }
}
