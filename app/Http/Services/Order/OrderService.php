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
}