<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use App\Models\Seller;
use Cache;
class SellerAuthentication {
    public function handle(Request $request, Closure $next) : Response{
        if(Auth::guard("seller")->check()){
            $expireLogin = now()->addMinutes(2);
            $sellerId = Auth::guard("seller");
            Cache::put("seller_is_online", $sellerId, true, $expireLogin);
            Seller::where("id", $sellerId)->update(['login_status' => 2]);
        }
        return $next($request);
    }
}