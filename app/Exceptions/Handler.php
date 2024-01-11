<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use \Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler {
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function unauthenticated($request, AuthenticationException $exception){
        if($request->expectsJson()) {
            return response()->json([
                'error' => 'Unauthenticated.',
                'message'=> $exception->getMessage(),
            ],401);
        }
        if($request->is('admin') || $request->is('admin/*')) {
            return redirect()->guest('/admin/login');
        }
        if($request->is('user') || $request->is('user/*')) {
            return redirect()->guest('/login');
        }
    }
}
