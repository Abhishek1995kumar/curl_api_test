<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Contracts\Auth\Middleware\AuthenticatesRequests;
use Illuminate\Contracts\Auth\Factory as Auth;

class AdminAuthenticate{    
    protected function redirectTo(Request $request): ?string {
        return $request->expectsJson() ? null : route('admin.login');
    }
    public function authenticate(Request $request, array $guards) {
        if($this->auth()->guard("admin")->check()) {
            return $this->auth()->shouldUse("admin");
        }
        $this->unauthenticated($request, ["admin"]);
    }
}
