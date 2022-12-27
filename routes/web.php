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
use App\Http\Controllers\AjaxLoginController;

Route::get('admin/users/login', [App\Http\Controllers\Admin\Users\LoginController::class, 'index']) -> name('login');
Route::post('/admin/users/login/store', [App\Http\Controllers\Admin\Users\LoginController::class, 'store']);
Route::get('admin/users/logout', [App\Http\Controllers\Admin\Users\LoginController::class, 'logout']);


Route::middleware(['auth']) -> group(function (){

    Route::prefix('admin')->group(function(){
        Route::get('/', [MainController::class, 'index']) -> name('admin');
        Route::get('/logout', [LoginController::class, 'logout']) -> name('logout');
        Route::post('/filter-by-date', [MainController::class, 'filterByDate']);
        Route::post('/days-order', [MainController::class, 'daysOrder']);
        Route::get('/print-revenue-report', [MainController::class, 'printRevenueReport']);
        Route::get('/print-revenue-report/{from_date}/{to_date}', [MainController::class, 'printRevenueReportDate']);
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
        Route::get('orders/edit/{order}', [OrderController::class, 'showUpdate']);
        Route::post('orders/edit/{order}', [OrderController::class, 'update']);
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

//login client
Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('clientLogin');
Route::post('/login/store', [App\Http\Controllers\LoginController::class, 'store']);
Route::post('/registerAuth', [App\Http\Controllers\LoginController::class, 'registerAuth']) -> name('registerAuth');
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout']);
Route::get('/profile/{customerId}', [App\Http\Controllers\LoginController::class, 'profile']);
Route::get('/my-orders', [App\Http\Controllers\LoginController::class, 'myOrder']);
Route::get('/my-order-details/{orderId}', [App\Http\Controllers\LoginController::class, 'myOrderDetail']);

//trang chu
Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('home');
Route::post('/services/load-product', [App\Http\Controllers\MainController::class, 'loadProduct']);

Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\MenuController::class, 'index']);
Route::get('san-pham/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'index']);

Route::post('add-cart', [App\Http\Controllers\CartController::class, 'index']);
Route::get('carts', [App\Http\Controllers\CartController::class, 'show']);
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'update']);
Route::get('carts/delete/{id}', [App\Http\Controllers\CartController::class, 'remove']);
Route::get('delete/{id}', [App\Http\Controllers\CartController::class, 'removeInHome']);
Route::post('carts', [App\Http\Controllers\CartController::class, 'addCart']);
Route::get('login-checkout', [App\Http\Controllers\CartController::class, 'login_checkout']);
Route::post('login-checkout-store', [App\Http\Controllers\CartController::class, 'store']);
Route::post('register-checkout', [App\Http\Controllers\CartController::class, 'registerCheckout']);

Route::get('/contact.html', [App\Http\Controllers\ContactController::class, 'contactus']);
Route::get('/danh-muc/contact.html', [App\Http\Controllers\ContactController::class, 'contactus']);
Route::get('/blog-detail/contact.html', [App\Http\Controllers\ContactController::class, 'contactus']);

Route::get('/all-product.html', [App\Http\Controllers\AllProductController::class, 'index']);

Route::post('/quickview', [App\Http\Controllers\ProductController::class, 'quickview']);



// Blog
Route::get('blog-detail/{blog}-{slug}', [App\Http\Controllers\MainController::class, 'blogDetail'])->name('home.blogDetail');

// Quick-login
Route::group(['prefix'=>'ajax'],function(){
Route::post('/login', [App\Http\Controllers\AjaxLoginController::class, 'login'])->name('ajax.login');
Route::post('/comment/{blog_id}', [App\Http\Controllers\AjaxLoginController::class, 'comment'])->name('ajax.comment');
Route::get('/logout', [App\Http\Controllers\AjaxLoginController::class, 'logout'])->name('ajax.logout');
});

