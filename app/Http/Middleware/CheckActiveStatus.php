<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckActiveStatus
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
        if (Auth::user()->isActive())
        {
            return $next($request);
        }

        Auth::logout();
        return redirect()->route('login.show')->with('error', 'Your account is deactivated. Contact the admin.');
    }
}
