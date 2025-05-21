<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CustomAuthMidleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\ContaboResponseInstance|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $userToken = Cookie::get('user_token');

        if (!$userToken) {
            return redirect()->route('login');
        }

        if ($userToken && !auth()->guard('web')->user()) {
            auth()->guard('web')->loginUsingId(1);
        }

        // kalau status usernya tidak aktif maka langsung logoutkan

        if(\auth()->guard('web')->user()->status != 'active') {
            \auth()->guard('web')->logout();

            return redirect()->route('login');
        }

        return $next($request);
    }
}
