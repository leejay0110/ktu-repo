<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class PepUpload
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
        if ( Auth::user()->roles->pluck('name')->contains('pep upload') ) {
            return $next($request);
        }
        Abort(403, 'Unauthorized.');
    }
}
