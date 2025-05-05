<?php

use App\Http\Controllers\Apis\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(UserController::class)->group(function () {
Route::post('register','register');
Route::post('login','login');
Route::post('logout',action: 'logout')->middleware('auth:sanctum');
});

