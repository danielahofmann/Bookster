<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
    	switch ($guard) {
		    case 'admin':
			    if (Auth::guard($guard)->check()) {
				    return redirect()->route('admin.dashboard');
			    }
			    break;

		    default:
			    if (Auth::guard($guard)->check()) {
				    if ( Session::has( 'ageGroup' ) ) {
					    if ( Session::get( 'ageGroup' ) == 'kids' || Session::get( 'ageGroup' ) == 'toddlers' ) {
						    $path = '/' . Session::get( 'ageGroup' );
					    } else {
						    $path = '/' . Session::get( 'ageGroup' ) . '/dashboard';
					    }

					    return redirect($path);
				    }
			    }
			    break;
	    }
	    return $next($request);
    }
}
