<?php

use App\Category;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\TableController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\main\HomeController;
use App\Http\Controllers\main\PageController;
use App\Http\Controllers\BookingController;



Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::controller(HomeController::class)->prefix('admin/users')->as('admin.')->group(function () {
    Route::get('create', 'create')->name('create');
    Route::post('create', 'store')->name('store');
    Route::get('index', 'index')->name('index');
    Route::get('edit/{user}', 'edit')->name('edit');
    Route::put('{user}', 'update')->name('update');
    Route::delete('{user}', 'destroy')->name('delete');

});

Route::resource('tables', TableController::class);
// Route::controller(PostController::class)->prefix('Admin/posts')->as('posts.')->group(function () {
//     Route::get('create', 'create')->name('create');
//     Route::post('create', 'store')->name('store');
//     Route::get('index', 'index')->name('index');
//     Route::get('edit/{post}', 'edit')->name('edit');
//     Route::put('{post}', 'update')->name('update');
//     Route::delete('{post}', 'destroy')->name('delete');
// });
Route::prefix('Admin/')->group(function () {

    Route::resource('posts', PostController::class);
    Route::resource('menus', MenuController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('menuItems', MenuItemController::class);
});

// routes/web.php

Route::prefix('Admin/bookings')->group(function () {
Route::get('{booking}/updateStatus', [BookingController::class, 'editStatus'])->name('booking.edit');

Route::put('{booking}/', [BookingController::class, 'updateStatus'])
    ->name('updateStatus');

});


// Route::controller(PageController::class)->prefix('Admin/pages')->as('admin.')->group(function(){
// Route::get('addCategory', 'add_category')->name('addCategory');
// Route::get('addEmployee', 'add_employee')->name('addEmployee');
// Route::get('addMenuItem', 'add_menu_item')->name('addMenuItem');
// });


Route::controller(ContactController::class)->prefix('Admin/users')->as('admin.')->group(function () {
    Route::get('ContactView', 'store')->name('ContactView');
    // Route::get('contact/{contact}', 'show')->name('show');
    // Route::delete('contact/{contact}', 'destroy')->name('deleteContact');
});
