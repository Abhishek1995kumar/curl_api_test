<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins\Auth\RegistrationController;
use App\Http\Controllers\Admins\Auth\LoginController;
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::prefix('admin')->group(function(){
//     Route::get('/admin', [RegistrationController::class, "index"]);
//     Route::post('/store', [RegistrationController::class, "store"]);
//     Route::delete('/delete/{id}', [RegistrationController::class, "delete"]);
//     Route::get('/restore/{id}', [RegistrationController::class, "restore"]);
//     Route::get('/status/{id}', [RegistrationController::class, "status"]);
// });

// Route::post('/admin/login', [LoginController::class, "login"]);
