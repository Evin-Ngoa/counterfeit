<?php

namespace App\Http\Middleware;

use App\Http\Traits\UserConstants;
use App\User;
use Closure;

class AccessAdmin
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
        if(User::getUserRole() == UserConstants::ADMIN){
            return $next($request);
        }
        return redirect('book');
    }
}
