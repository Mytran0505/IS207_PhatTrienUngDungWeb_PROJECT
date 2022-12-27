<?php


namespace App\Http\Services\Order;

use App\Models\Bill_khachhang;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;

class OrderService 
{
    public function getOrder() {
        return Bill_khachhang::orderByDesc('created_at')->get();
    }

    public function update($request, $order) {
        try {
            $order->fill($request->input());
            $order->save();
            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật lỗi');
            return false;
        }

        return true;
    }
}