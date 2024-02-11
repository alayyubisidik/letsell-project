<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class NavbarComposerServiceProvider extends ServiceProvider
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
        View::composer('layout.navbar', function ($view) {
            $categories = Category::all();
            $view->with('categories', $categories);

            if (Auth::user() && Auth::user()->role == 'customer') {
                $cart = Cart::where('user_id', Auth::user()->id)->first();
                $cartItems = CartItem::where('cart_id', $cart->id);
                $wishlists = Wishlist::all();
                // Misalnya, menyediakan data nama pengguna
                $view->with('cart_count', $cartItems->count());
                $view->with('wishlist_count', $wishlists->count());
            }
        });
    }
}
