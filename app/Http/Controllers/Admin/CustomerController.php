<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function index() {
        return view('admin.customer.list', [
            'title' => 'Danh sách khách hàng',
            'customers' => Customer::orderByDesc('created_at')->get()
        ]);
    }

    public function show(Customer $customer) {
        return view('admin.customer.detail', [
            'title' => 'Chi tiết khách hàng ' . $customer->id,
            'customer' => $customer,
            'orders' => $customer->orders()->paginate(10)
        ]);
    }
}
