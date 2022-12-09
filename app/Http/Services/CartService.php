<?php


namespace App\Http\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class CartService{
    public function create($request)
    {
        $qty = (int)$request->input('num_product'); 
        $product_id = (int)$request->input('product_id');

        if ($qty <= 0 || $product_id <= 0)
        {
            Session::flash('error', 'Số lượng hoặc Sản phẩm không chính xác');
            return false;
        }

        // Session::forget('carts');

        $carts = Session::get('carts'); //Lay toan bo thong tin cart tra ve array cho bien $carts
        
        if(is_null($carts)){
            Session::put('carts', [
                $product_id =>$qty
            ]); 
            return true;
        }
        
        
        $exists = Arr::exists($carts, $product_id);
        if($exists){
            $carts[$product_id] = $carts[$product_id] + $qty;
            Session::put('carts', $carts);
            return true;
        }
        
        $carts[$product_id] = $qty;
        Session::put('carts', $carts); 
            return true;
    }


    public function getProduct(){
        $carts = Session::get('carts');
        if (is_null($carts))
            return [];

        $productId = array_keys($carts);
        return Product::select('id', 'name', 'original_price', 'price_sale', 'image')
            ->where('active', 1)
            ->whereIn('id', $productId)
            ->get();
    }

    public function update($request){
        Session::put('carts', $request->input('num_product'));
        return true; 

    }

    public function remove($id){
        $carts = Session::get('carts');
        unset($carts[$id]); //xoa roi cap nhat lai

        Session::put('carts', $carts);
        return true;
    }
}
