<?php

namespace App\Http\Middleware;

use App\Events\RegisterTwoFactor;
use Closure;
use Illuminate\Http\Request;

class ValidateTwoFactor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (auth()->check() && !is_null(auth()->user()->two_factor)) {
            return $next($request);
        }

        event(new RegisterTwoFactor(auth()->user()));
        return redirect('/two-factor');
    }
}
