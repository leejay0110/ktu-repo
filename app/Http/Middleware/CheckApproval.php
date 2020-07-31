<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckApproval
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
        if (Auth::user()->isApproved())
        {
            return $next($request);
        }

        Auth::logout();
        return redirect()->route('login.show')->with('error', 'Your account has not yet been approved.');
    }
}
