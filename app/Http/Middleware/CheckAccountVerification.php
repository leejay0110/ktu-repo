<?php

namespace App\Http\Middleware;

use Closure;

class CheckAccountVerification
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
        if (Auth::user()->isVerified())
        {
            return $next($request);
        }

        Auth::logout();
        return redirect()->route('login')->with('error', 'Your account has not been verified yet. Contact the admin.');
    }
}
