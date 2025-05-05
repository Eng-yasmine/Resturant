<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\main\HomeController;



Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard');

Route::controller(HomeController::class)->prefix('Admin.users')->as('admin.')->group(function () {
Route::get('index','index')->name('index');
Route::get('create','create')->name('create');
Route::post('create','store')->name('store');
Route::get('/edit/{user}','edit')->name('edit');
Route::put('/{user}','update')->name('update');
Route::delete('/{user}','destroy')->name('delete');
});






















?>
