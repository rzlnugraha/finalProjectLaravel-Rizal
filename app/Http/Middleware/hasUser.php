<?php

namespace App\Http\Middleware;

use Closure, Sentinel, Alert;

class hasUser
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
        if (Sentinel::getUser()->roles()->first()->slug == 'visitor') {
            return $next($request);
        } else {
            if (Sentinel::getUser()->roles()->first()->slug == 'admin') {
                Alert::warning('Kamu ga punya hak akses', 'Error');
                return redirect()->route('admin.index');
            } else {
                Alert::warning('Kamu ga punya hak akses', 'Error');
                return redirect()->route('signin');
            }
        }
    }
}
