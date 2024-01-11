<?php

// namespace App\Providers;

// use Illuminate\Cache\RateLimiting\Limit;
// use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\RateLimiter;
// use Illuminate\Support\Facades\Route;

// class RouteServiceProvider extends ServiceProvider
// { 
    // public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
//     public function boot(): void {
//         RateLimiter::for('api', function (Request $request) {
//             return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
//         });

//         $this->routes(function () {
//             Route::middleware('api')
//                 ->prefix('api')
//                 ->group(base_path('routes/api.php'));


//         });
//     }
// }


namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider { 
    public const HOME = '/home';

    protected $namespace = "App\Http\Controllers";

    public function boot(): void {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }

    public function map(){
        $this->mapAdminApiRoutes();
        $this->mapSellerApiRoutes();
        $this->mapWebRoutes();
    }

    public function mapAdminApiRoutes(){
        Route::prefix('api')
             ->middleware('api')->namespace($this->namespace)->group(base_path('routes/Admin/adminApi.php'));
    }

    public function mapSellerApiRoutes(){
        Route::prefix('api')
             ->middleware('api')->namespace($this->namespace)->group(base_path('routes/seller/sellers.php'));
    }

    public function mapWebRoutes(){
        Route::middleware('web')->group(base_path('routes/web.php'));
    }

}

