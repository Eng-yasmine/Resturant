<?php

use App\Http\Controllers\main\HomeController;
use App\Http\Controllers\main\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('User.pages.index');
});

Route::controller(PageController::class)->prefix('User.pages')->as('pages.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('contact', 'contact')->name('contact');
    Route::get('about', 'about')->name('about');
    Route::get('booking', 'booking')->name('booking');
    Route::get('menu', 'menu')->name('menu');
    Route::get('team', 'team')->name('team');
    Route::get('service', 'service')->name('service');
    Route::get('testimonial', 'testimonial')->name('testimonial');
});

Route::controller(HomeController::class)->prefix('Admin.pages')->as('pages.')->group(function () {
    Route::get('index', 'index')->name('dashboard');
});

Route::get('/dashboard', function () {
    return view('User.pages.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
