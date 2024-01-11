<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins\Auth\RegistrationController;
use App\Http\Controllers\Admins\Auth\LoginController;
use App\Http\Controllers\Admins\AdminController;
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix'=>'admin'], function(){
    Route::get('/', [RegistrationController::class, "index"]);
    Route::post('/store', [RegistrationController::class, "store"]);
    Route::delete('/delete/{id}', [RegistrationController::class, "delete"]);
    Route::get('/restore/{id}', [RegistrationController::class, "restore"]);
    Route::get('/status/{id}', [RegistrationController::class, "status"]);
    Route::post('/login', [LoginController::class, "login"]);
    Route::get('/logout', [LoginController::class, "logout"]);
});




Route::get('/admin/getData', [AdminController::class, "getData"]);
Route::get('/admin/one/{id?}', [AdminController::class, "getOneToOne"]);
Route::get('/admin/checkAdmin/{id?}', [LoginController::class, "checkAdmin"]);



