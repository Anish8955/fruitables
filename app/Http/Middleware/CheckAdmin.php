<?php

namespace App\Http\Middleware;


use Auth;
use Closure;
use Illuminate\Http\Request;


class CheckAdmin
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
        if (auth()->check() && Auth::user()->user_type == 0) {

            return $next($request); // Pass the request further
        }

        return redirect()->route('home');
    }
}

