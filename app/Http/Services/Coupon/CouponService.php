<?php


namespace App\Http\Services\Coupon;

use App\Models\Coupon;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CouponService {
    public function getMenu()
    {
        return Menu::with('products')->where('active', 1)->get();
    }

    public function getProduct() {
        return Product::where('active', 1)->get();
    }

    protected function isValidDate($request) {
        if($request->input('start_date') >= $request->input('end_date')){
            Session::flash('error', 'Ngày bắt đầu phải nhỏ hơn ngày kết thúc');
            return false;
        }
        return true;
    }

    public function get() {
        return Coupon::with('menu')->orderByDesc('id')->get();
    }

    public function getCoupon() {
        return Coupon::with('menu')->with('product')->orderByDesc('id')->where('active', 1)->where('status', 'Còn hạn')->get();
    }

    public function insert($request) {
        $isValidDate = $this->isValidDate($request);
        if($isValidDate === false) {
            return false;
        }
        try {
            $request->except('_token');
            Coupon::create($request->all());
            Session::flash('success', 'Thêm khuyến mãi thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm khuyến mãi lỗi');
            return false;
        }
        return true;
    }

    public function update($request, $coupon) {
        $isValidDate = $this->isValidDate($request);
        if($isValidDate === false) {
            return false;
        }
        try {
            $coupon->fill($request->all());
            $coupon->save();
            Session::flash('success', 'Cập nhật khuyến mãi thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật khuyến mãi lỗi');
            return false;
        }
        return true;
    }

    
}