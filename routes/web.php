<?php


use App\Http\Controllers\BookingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\main\HomeController;
use App\Http\Controllers\main\PageController;

Route::get('/', [PageController::class,'index'])->name('pages.index');


Route::controller(PageController::class)->prefix('User/pages')->as('pages.')->group(function () {
    Route::get('contact', 'contact')->name('contact');
    Route::get('about', 'about')->name('about')->withoutMiddleware('auth');
    Route::get('booking', 'booking')->name('booking');
    Route::get('menu', 'menu')->name('menu');
    Route::get('team', 'team')->name('team');
    Route::get('service', 'service')->name('service');
    Route::get('testimonial', 'testimonial')->name('testimonial');
    Route::get('ContactView', 'ContactView')->name('ContactView');
    // Route::get('cart', 'Cart')->name('Cart');

});

    Route::post('contact', [ContactController::class,'store'])->name('StoreContact');
Route::resource('bookings',BookingController::class);
Route::get('/bookings/{id}/pdf', [BookingController::class, 'generatePDF'])->name('bookings.pdf');
Route::resource('carts',CartController::class);
Route::post('cart/increase/{cart}', [CartController::class, 'increaseQuantity'])->name('cart.increase');
Route::post('cart/decrease/{cart}', [CartController::class, 'decreaseQuantity'])->name('cart.decrease');
Route::get('User/carts/checkout', [CartController::class,'checkout'])->name('cart.checkout');
Route::resource('orders',OrderController::class);
Route::post('orders/confirm',[OrderController::class,'confirm_order'])->name('order.confirm');
Route::get('orders/confirm/{order}', [OrderController::class, 'showConfirmation'])->name('order.confirm.show');
Route::get('orders/track/{order}',[OrderController::class,'trcking_order'])->name('order.tracking');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__ . '/auth.php';
require __DIR__ .'/admin.php';
