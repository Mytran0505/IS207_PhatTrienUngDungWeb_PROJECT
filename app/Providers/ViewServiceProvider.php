<?php
 
namespace App\Providers;

use App\Http\View\Composers\CartComposer;
use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\MenuComposer;
class ViewServiceProvider extends ServiceProvider
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
       View::composer('header', MenuComposer::class);
       View::composer('cart', CartComposer::class);
    }
}