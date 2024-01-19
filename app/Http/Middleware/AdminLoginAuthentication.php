<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use App\Models\Admin;
use Cache;
class AdminLoginAuthentication {
    public function handle(Request $request, Closure $next): Response {
        // jab use browser close karega tab login_status update ho jayega
        if(Auth::guard("admin")->check()) {
            $expireLogin = now()->addMinutes(2);
            $adminId = Auth::guard("admin");
            Cache::put('admin_is_online',$adminId, true, $expireLogin);
            Admin::where("id", $adminId)->update(['login_status'=>2]);
        }
        return $next($request);
    }
}
