<?php


namespace App\Http\Services\Order;

use App\Models\Customer;
use Illuminate\Support\Facades\Session;

class OrderService 
{
    public function getCustomer() {
        return Customer::orderByDesc('id')->paginate(10);
    }
}