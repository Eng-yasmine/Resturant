<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Apis\UserController;
use App\Http\Controllers\Apis\AdminController;
use App\Http\Controllers\Apis\menus\MenuController;
use App\Http\Controllers\Apis\Posts\PostController;
use App\Http\Controllers\Apis\menuItems\MenuItemController;
use App\Http\Controllers\Apis\categories\CategoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(UserController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::post('logout', action: 'logout')->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(AdminController::class)->prefix('Admin/users')->as(value: 'admin.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('create', 'store')->name('store');
        Route::put('{user}', 'update')->name('update');
        Route::delete('{user}', 'destroy')->name('delete');
    });
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('posts', PostController::class);
    Route::apiResource('menus', MenuController::class);
    Route::apiResource('categories',CategoryController::class);
    Route::apiResource('menuItems', MenuItemController::class);
});

