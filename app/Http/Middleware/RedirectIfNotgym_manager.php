<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotgym_manager
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = 'gym_manager')
	{
	    if (!Auth::guard($guard)->check()) {
	        return redirect('gym_manager/login');
	    }

	    return $next($request);
	}
}
