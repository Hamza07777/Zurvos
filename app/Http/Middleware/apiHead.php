<?php

namespace App\Http\Middleware;

use Closure;

class apiHead
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
        $val = $request->header('token');
        if ($val != "basickey123") {
            return response()->json(['error' => 'unauthorized access head token', 'status' => 'error' ], 404);
        }
        return $next($request);
    }
}
