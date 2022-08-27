<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Wishlist;
use App\Models\Cart;
use App\Services\CartService;

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
            $cartTotal = 0;
            if(auth()->user()){
                $cartService = new CartService;
                $wishlist = Wishlist::where('user_id',auth()->user()->id)->count();
                $carts = Cart::where('user_id',auth()->user()->id)->get();
                if(count($carts) > 0){
                    $products = $cartService->product($carts);
                    foreach($products as $product){
                        $cartTotal  += $product['total'];
                    }
                }
            } else{
                $wishlist = 0;
                $cart = 0;
            }
            $view->with([
                'wishlist'=> $wishlist,
                'cart'=> count($carts),
                'cartTotal'=> $cartTotal
            ]);
        });
    }
}
