<?php

namespace App\Http\Services\Product;

use App\Models\Product;
class AllProductService {
    const LIMIT =18;
    public function get($page = null){
        return Product::select('id', 'name', 'menu_id', 'price_sale', 'original_price', 'image')
        ->orderByDesc('id')
        ->when($page != null, function($query) use ($page){
            $query->offset($page * self::LIMIT);
        })
        ->limit(self::LIMIT)
        ->get();
    }

    public function show($id)
    {
        return Product::where('id', $id)
            ->where('active', 1)
            ->with('menu')
            ->firstOrFail();
    }

    public function more($id)
    {
        return Product::select('id', 'name','menu_id', 'price_sale', 'original_price', 'image')
            ->where('active', 1)
            ->where('id', '!=', $id)
            ->orderByDesc('id')
            ->limit(1000)
            ->get();
    }
}