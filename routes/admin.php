<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\main\HomeController;



Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard');
























?>
