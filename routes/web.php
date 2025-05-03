<?php

use App\Http\Controllers\main\HomeController;
use App\Http\Controllers\main\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class,'index'])->name('pages.index');


Route::controller(PageController::class)->prefix('User.pages')->as('pages.')->group(function () {
    Route::get('contact', 'contact')->name('contact');
    Route::get('about', 'about')->name('about')->withoutMiddleware('auth');
    Route::get('booking', 'booking')->name('booking');
    Route::get('menu', 'menu')->name('menu');
    Route::get('team', 'team')->name('team');
    Route::get('service', 'service')->name('service');
    Route::get('testimonial', 'testimonial')->name('testimonial');
})->middleware('auth');

// Route::controller(HomeController::class)->prefix('Admin.pages`')->as('pages.')->group(function () {

// });



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__ . '/auth.php';
require __DIR__ .'/admin.php';
