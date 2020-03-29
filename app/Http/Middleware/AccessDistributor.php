<?php

namespace App\Http\Middleware;

use App\Http\Traits\UserConstants;
use App\User;
use Closure;

class AccessDistributor
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
        // Check if the logged in is an DISTRIBUTOR
        if (User::getUserRole() == UserConstants::DISTRIBUTOR) {
            return $next($request);
        }
        return redirect('dashboard');
    }
}
