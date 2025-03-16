<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VersionUpdate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Ignore all checks and proceed to the next middleware or request handler
        return $next($request);
    }
}