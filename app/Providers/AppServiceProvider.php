<?php

namespace App\Providers;

use App\Models\Coupon;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Bill_khachhang;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();

        view()->composer('*', function($view) {
            $product_count = Product::all()->count();
            $order_count = Bill_khachhang::all()->count();
            $customer_count = Customer::all()->count();
            $coupons = Coupon::with('menu')->with('product')->orderByDesc('id')->where('active', 1)->where('status', 'Còn hạn')->get();

            $view->with('product_count', $product_count)->with('order_count', $order_count)->with('customer_count', $customer_count)->with('coupons', $coupons);
        });
    }
}
