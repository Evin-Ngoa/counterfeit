<?php

namespace App\Http\Middleware;

use App\Http\Traits\UserConstants;
use App\User;
use Closure;

class AccessCustomer
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
        // Check if the logged in is an CUSTOMER
        if (User::getUserRole() == UserConstants::CUSTOMER) {
            return $next($request);
        }
        return redirect('dashboard');
    }
}
