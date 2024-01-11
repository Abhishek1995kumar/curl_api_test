<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sellers\Auth\RegistrationController;
use App\Http\Controllers\Admins\AdminController;
use App\Http\Controllers\Sellers\Auth\LoginController;

Route::group(['prefix'=>'seller'], function(){
    Route::get('/', [RegistrationController::class, "index"]);
    Route::post('/registration', [RegistrationController::class, "registration"]);
    Route::delete('/delete/{id}', [RegistrationController::class, "delete"]);
    // Route::get('/restore/{id}', [RegistrationController::class, "restore"]);
    // Route::get('/status/{id}', [RegistrationController::class, "status"]);
    Route::post('/login', [LoginController::class, "login"]);
    // Route::get('/logout', [LoginController::class, "logout"]);
});


