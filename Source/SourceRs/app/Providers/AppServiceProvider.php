<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ProductType;
use Session;
use App\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('heard',function($view){
            $loai_sp = ProductType::all();
            $view->with('loai_sp',$loai_sp);
          });

        view()->composer('heard',function($view){
        if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=> $cart->totalPrice,'totalQty'=> $cart->totalQty]);
            }
        });
        view()->composer('page.dathang',function($view){
            if(Session('cart')){
                    $oldCart = Session::get('cart');
                    $cart = new Cart($oldCart);
                    $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=> $cart->totalPrice,'totalQty'=> $cart->totalQty]);
                }
            });
    }
}
