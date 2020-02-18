<?php

namespace App\Http\Middleware;

use Closure;
Use Alert;
use Illuminate\Support\Facades\Auth;


class CheckUserStatus
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
        $response = $next($request);
        if(Auth::check() && Auth::user()->status != 'active'){

            Auth::logout();
            toast('Your Account is not activated yet.','error');

            return redirect('/');

        }

        return $response;
    }
}
