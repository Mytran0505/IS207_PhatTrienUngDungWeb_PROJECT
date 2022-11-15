<?php


namespace App\Http\Services\Product;


use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductAdminService {
    public function getMenu()
    {
        return Menu::where('active', 1)->get();
    }

    public function get() {
        return Product::with('menu')->orderByDesc('id')->get();
    }
}