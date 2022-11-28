<?php

namespace App\Http\Services\Product;

use App\Models\Product;
class ProductService {
    const LIMIT =18;
    public function get($page = null){
        return Product::select('id', 'name', 'price_sale', 'original_price', 'image')
        ->orderByDesc('id')
        ->when($page != null, function($query) use ($page){
            $query->offset($page * self::LIMIT);
        })
        ->limit(self::LIMIT)
        ->get();
    }
}