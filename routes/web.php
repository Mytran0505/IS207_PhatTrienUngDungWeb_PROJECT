<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Services\UploadService;

Route::get('admin/users/login', [LoginController::class, 'index']) -> name('login');

Route::get('/admin/users/register', [LoginController::class, 'register']) -> name('register');
Route::post('/admin/users/registerAuth', [LoginController::class, 'registerAuth']) -> name('registerAuth');

Route::post('/admin/users/login/store', [LoginController::class, 'store']);


Route::middleware(['auth']) -> group(function (){

    Route::prefix('admin')->group(function(){
        Route::get('/', [MainController::class, 'index']) -> name('admin');
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

            Route::get('list', [ProductController::class, 'index']);
        });

        // Slider
        Route::prefix('sliders')->group(function() {
            Route::get('add', [ProductController::class, 'create']);

            Route::get('list', [ProductController::class, 'index']);
        });

        // Upload
        Route::post('upload/services', [UploadController::class, 'store']);
    });
});

