<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Wishlist;

class HeaderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.header', function ($view) {
            if(auth()->user()){
                $wishlist = Wishlist::where('user_id',auth()->user()->id)->count();
            } else{
                $wishlist = 0;
            }
            $view->with('wishlist', $wishlist);
        });
    }
}
