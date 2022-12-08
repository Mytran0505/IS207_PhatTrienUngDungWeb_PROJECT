<?php


namespace App\Http\Services\Coupon;

use App\Models\Coupon;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;

class CouponService {
    public function getMenu()
    {
        return Menu::where('active', 1)->get();
    }

    protected function isValidDate($request) {
        if($request->input('start_date') >= $request->input('end_date')){
            Session::flash('error', 'Ngày bắt đầu phải nhỏ hơn ngày kết thúc');
            return false;
        }
        return true;
    }

    public function insert($request) {
        // dd($request->all());
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
}