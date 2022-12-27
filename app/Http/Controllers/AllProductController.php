<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Product\AllProductService;

class AllProductController extends Controller
{
    protected $productService;

    public function __construct(AllProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index($id= '', $slug = '') {
        $productsMore = $this->productService->more($id);
        return view('allpro', [
            'title' => 'Tất cả sản phẩm',
            'products' => $productsMore 
        ]);
    }


    

}
