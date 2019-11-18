<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
use Alert;

class SentinelMiddleware
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
        if (Sentinel::guest()) {
            if ($request->ajax()) {
                return respones('Unauthorize', 401);
            } else {
                Alert::info('Kamu harus login', 'Info');
                return redirect()->route('signin');
            }
        }
        return $next($request);
    }
}
