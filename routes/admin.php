<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\main\HomeController;



Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard');

Route::controller(HomeController::class)->prefix('Admin.pages')->as('pages.')->group(function () {
Route::get('index','index')->name('index');

});






















?>
