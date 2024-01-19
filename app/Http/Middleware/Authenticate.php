<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Middleware\AuthenticatesRequests;
use Illuminate\Contracts\Auth\Factory as Auth;
use Closure;
class Authenticate extends Middleware {

    protected $auth;

    public function __construct(Auth $auth) {
        $this->auth = $auth;
    }
    protected function redirectTo(Request $request): ?string {
        return $request->expectsJson() ? null : route('login');
    }

    public function handle(Request $request, Closure $next, ...$guards) {
        $this->authenticate($request, $guards);
        return $next($request);
    }

    public function authenticate(Request $request, array $guards) {
        if(empty($guards)) {
            $guards = [null];
        }
        foreach($guards as $guard) {
            if($this->auth()->guard($guard)->check()) {
                return $this->auth()->shouldUse($guard);
            }
        }
        $this->unauthenticated($request, $guards);
    }
}
