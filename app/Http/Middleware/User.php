<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class User
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
        if(Auth::check()) {         // check if user logon
            if(Auth::user()->isUser()){
                return $next($request);
            }
        }

        abort(403, 'Unauthorized action.');
    }
}
