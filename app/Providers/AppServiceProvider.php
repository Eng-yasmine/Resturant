<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::automaticallyEagerLoadRelationships();
        Paginator::useBootstrapFive();
         View::composer('*', function ($view) {
        $count = 0;
        if (Auth::check()) {
            $user_id = Auth::id();
            $count = Cart::where('user_id', $user_id)->count();
        }
        $view->with('cartItemCount', $count);
    });
    }
}
