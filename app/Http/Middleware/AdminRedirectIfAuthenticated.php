<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class AdminRedirectIfAuthenticated {
    public function handle(Request $request, Closure $next): Response {
        if (Auth::guard("admin")->check()) {
            // return redirect(RouteServiceProvider::HOME);
        }
        return $next($request);
    }
}
