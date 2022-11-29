<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Order\OrderService;
use App\Models\Bill_khachhang;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $order;
    public function __construct(OrderService $order) {
        $this->order = $order;
    }

    public function index(){
        return view('admin.order.customer', [
            'title' => 'Danh sách đơn đặt hàng',
            'orders' => $this->order->getOrder()
        ]);
    }

    // public function show(Customer $customer) {
    //     return view('admin.order.detail', [
    //         'title' => 'Chi tiết đơn hàng ' . $customer->name,
    //         'customer' => $customer,
    //         'orders' => $customer->orders()->get(),
    //         'cthds' => $customer->cthd()->with(['product' => function($query) {
    //             $query->select('id', 'name', 'image');
    //         }])->paginate(10)
    //     ]);
    // } 
    public function show(Bill_khachhang $order) {
        return view('admin.order.detail', [
            'title' => 'Chi tiết đơn hàng ' . $order->id,
            'order' => $order,
            'customer' => $order->customer()->get(),
            'cthds' => $order->cthd()->with(['product' => function($query) {
                $query->select('id', 'name', 'image', 'price_sale');
            }])->paginate(10)
        ]);
    }
}