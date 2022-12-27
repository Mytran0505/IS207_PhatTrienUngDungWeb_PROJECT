<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use GuzzleHttp\Handler\Proxy;
use App\Http\Services\Product\ProductService;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index($id= '', $slug = '')
    {
        $product = $this->productService->show($id);
        $productsMore = $this->productService->more($id);
        return view('products.content', [
            'title' => $product->name,
            'product' => $product,
            'products' => $productsMore
        ]);
    }

    public function quickview(Request $request){
        $product_id = $request->product_id;
        $product = Product::where('id', $product_id)->first();
        $output['product_name'] = $product->name;
        $output['product_id'] = $product->id;
        $output['product_desc'] = $product->description;
        $output['product_image1'] = '<img src=" '.$product->image.'/item1.jpeg" alt="IMG-PRODUCT">';
        $output['product_image2'] = '<img src=" '.$product->image.'/item2.jpeg" alt="IMG-PRODUCT">';
        $output['product_image3'] = '<img src=" '.$product->image.'/item3.jpeg" alt="IMG-PRODUCT">';
        $output['product_image1_1'] = "'.$product->image.'/item1.jpeg";
        $output['product_image2_2'] = "'.$product->image.'/item2.jpeg";
        $output['product_image3_3'] = "'.$product->image.'/item3.jpeg";
        $output['product_price'] = number_format($product->price_sale).' '.'₫';
        echo json_encode($output);
    }
}
