<?php

use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\SliderController;
//use App\Http\Controllers\MenuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('admin/users/login', [LoginController::class, 'index']) -> name('login');

Route::get('/admin/users/register', [LoginController::class, 'register']) -> name('register');
Route::post('/admin/users/registerAuth', [LoginController::class, 'registerAuth']) -> name('registerAuth');

Route::post('/admin/users/login/store', [LoginController::class, 'store']);


Route::middleware(['auth']) -> group(function (){

    Route::prefix('admin')->group(function(){
        Route::get('/', [MainController::class, 'index']) -> name('admin');
        Route::get('/logout', [LoginController::class, 'logout']) -> name('logout');
        Route::post('/filter-by-date', [MainController::class, 'filterByDate']);
        Route::post('/days-order', [MainController::class, 'daysOrder']);
        // Category
        Route::prefix('menus')->group(function(){
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
        });

        // Product
        Route::prefix('products')->group(function() {
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'index']);
            Route::get('edit/{product}', [ProductController::class, 'show']);
            Route::post('edit/{product}', [ProductController::class, 'update']);
            Route::DELETE('destroy', [ProductController::class, 'destroy']);

        });

        // Slider
        Route::prefix('sliders')->group(function() {
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add', [SliderController::class, 'store']);
            Route::get('list', [SliderController::class, 'index']);
            Route::get('edit/{slider}', [SliderController::class, 'show']);
            Route::post('edit/{slider}', [SliderController::class, 'update']);
            Route::DELETE('destroy', [SliderController::class, 'destroy']);
        });

        // Upload
        Route::post('upload/services', [UploadController::class, 'store']);
        
        //Cart
        Route::get('orders', [OrderController::class, 'index']);
        Route::get('orders/view/{order}', [OrderController::class, 'show']);
        Route::get('print-order/{checkout_code}', [OrderController::class, 'printOrder']);

        //Customer
        Route::get('customers', [CustomerController::class, 'index']);
        Route::get('customers/view/{customer}', [CustomerController::class, 'show']);

        //coupon
        Route::prefix('coupons')->group(function() {
            Route::get('add', [CouponController::class, 'create']);
            Route::post('add', [CouponController::class, 'store']);
            Route::get('list', [CouponController::class, 'index']);
            Route::get('edit/{coupon}', [CouponController::class, 'show']);
            Route::post('edit/{coupon}', [CouponController::class, 'update']);
        });
    });

});

Route::get('/', [App\Http\Controllers\MainController::class, 'index']);
Route::post('/services/load-product', [App\Http\Controllers\MainController::class, 'loadProduct']);

Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\MenuController::class, 'index']);
Route::get('san-pham/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'index']);

Route::post('add-cart', [App\Http\Controllers\CartController::class, 'index']);
Route::get('carts', [App\Http\Controllers\CartController::class, 'show']);
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'update']);
Route::get('carts/delete/{id}', [App\Http\Controllers\CartController::class, 'remove']);
Route::post('carts', [App\Http\Controllers\CartController::class, 'addCart']);

