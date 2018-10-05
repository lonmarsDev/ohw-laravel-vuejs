<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;

class Check2fAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     * @throws AuthenticationException
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $user = $request->user();

        if ($user->two_factor_authentication) {
            if ($request->session()->has('two_factor_authenticated')) {
                if (!$request->session()->get('two_factor_authenticated')) {
                    return redirect('/2fa');
                } else {
                    return $next($request);
                }
            }
            return redirect('/2fa');
        }
        return $next($request);
    }
}
