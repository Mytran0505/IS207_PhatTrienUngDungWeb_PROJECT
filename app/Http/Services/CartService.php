<?php


namespace App\Http\Services;

use App\Models\Customer;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Cart;
use App\Jobs\SendMail;
use App\Models\Bill_khachhang;
use App\Models\Bill_vanglai;
use App\Models\CTHD;
use Illuminate\Support\Facades\DB;

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

    public function removeInHome($id){
        $carts = Session::get('carts');
        unset($carts[$id]); //xoa roi cap nhat lai

        Session::put('carts', $carts);
        return true;
    }

    public function addCart($request){
        try{
            DB::beginTransaction();
            // Trong quá trình chạy try mà lỗi thì rollback lại không lỗi thì commit
            $carts = Session::get('carts');
            if (is_null($carts))
                return false;

            $customer = Customer::create([
                'name'=> $request->input('name'),
                'email'=> $request->input('email'),
                'phone'=> $request->input('phone'),
                'address'=> $request->input('address'),
                'content'=> $request->input('content'),
                'spend'=> $request->input('total')
                
            ]);
            $this->infoProductCart($carts, $customer->id, $request);

            DB::commit();
            Session::flash('success', 'Đặt Hàng Thành Công');
            Session::forget('carts');
            
            #Queue
            SendMail::dispatch($request->input('email'))->delay(now()->addSeconds(2));
            // dispatch truyeen vao email khach hang
        }catch(\Exception $err) {
            DB::rollBack();
            Session::flash('error', 'Đặt Hàng Không Thành Công, Vui lòng thử lại sau');
            return false;
        }

        return true;
    }

    protected function infoProductCart($carts, $customer_id, $request){
        $productId = array_keys($carts);
            $products = Product::select('id', 'name', 'original_price', 'price_sale', 'image')
                ->where('active', 1)
                ->whereIn('id', $productId)
                ->get();

        $data = [];
        $total = 0;
        Bill_khachhang::create([
            'customer_id' => $customer_id,
            // 'price' => $product->price_sale != 0 ? $product->price_sale : $product->price
            'total_money' =>$request->input('total'),
            'status' => 'Chưa nhận đơn'
        ]);
        $bill_id = Bill_khachhang::select('id')->orderByDesc('id')->first();
        foreach ($products as $product){
            // $product->price_sale != 0 ? $total += $product->price_sale * $carts[$product->id] : $total += $product->original_price * $carts[$product->id];
            $data[] = [
                'id' => $bill_id->id,
                'product_id' => $product->id,
                // 'pty' => $carts[$product->id],
                'amount' => $carts[$product->id]
            ];
        }
        
        CTHD::insert($data);
    }
}
