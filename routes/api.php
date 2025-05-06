<?php

use App\Http\Controllers\Apis\AdminController;
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

Route::controller(AdminController::class)->prefix('Admin/users')->as(value: 'admin.')->group(function () {
Route::get('/','index')->name('index');
Route::post('create', 'store')->name('store');
Route::put('{user}', 'update')->name('update');

});
