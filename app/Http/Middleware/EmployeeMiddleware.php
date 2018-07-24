<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class EmployeeMiddleware
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
	    if ($request->user() && $request->user()->role != 3) {
		    return redirect()->back();
	    }
	    return $next($request);
    }
}
