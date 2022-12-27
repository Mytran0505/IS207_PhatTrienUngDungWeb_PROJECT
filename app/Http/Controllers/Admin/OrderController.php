<?php

namespace App\Http\Controllers\Admin;

use App\Models\CTHD;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Bill_khachhang;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Services\Order\OrderService;

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

    public function showUpdate(Bill_khachhang $order) {
        return view('admin.order.edit', [
            'title' => 'Cập nhật trạng thái đơn hàng',
            'order' => $order,
        ]);
    }

    public function update(Request $request, Bill_khachhang $order) {
        $result = $this->order->update($request, $order);
        if($result) {
            return redirect('/admin/orders');
        }
        return redirect()->back();
    }

    public function printOrder($checkout_code) {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkout_code));
        return $pdf->stream();
    }

    public function print_order_convert($checkout_code) {
        $order = Bill_khachhang::where('id', $checkout_code)->get();
        foreach ($order as $key => $ord) {
            $customer_id = $ord->customer_id;
        }
        $customer = Customer::where('id', $customer_id)->first();
        $cthd = CTHD::with('product')->where('id', $checkout_code)->get();
        $total = 0;
        $output = '
            <style>
                body{
                    font-family: DejaVu Sans;
                }
                .table-styling{
                    border: 1px solid #000;
                    width: 100%;
                }
                .table-styling thead tr th{
                    border: 1px solid #000;
                }

                .table-styling tbody tr td{
                    border: 1px solid #000;
                }

            </style>
            <div class="container" style="font-size:22px;">
                <div class="row" style="margin-top: 40px;">
                    <div class="col-sm-10">
                        <b>CÔNG TY TNHH THƯƠNG MẠI DỊCH VỤ SPORTWEARSHOP</b>
                        <p>Tầng 5, Saigon Center, Quận 1, Thành Phố Hồ Chí Minh</p>
                    </div>
                </div>
            </div>
            <h1> <center> Cửa hàng thể thao Sportwearshop </center> </h1>
            <div class="col-md-12" style="text-align: right;">
                <p style="margin:30px 0px">Thời gian in: '.date('d-m-Y').'</p>
            </div>
            <p><b style="font-size: 18px;">Người đặt hàng</b></p>
            <table class="table table-styling table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
        ';
        $output .= '
                <tr>
                    <td>'. $customer->name .'</td>
                    <td>'. $customer->phone .'</td>
                    <td>'. $customer->address .'</td>
                    <td>'. $customer->email .'</td>
                </tr>
        ';

        $output .= '
                </tbody>
            </table>
            <p><b style="font-size: 18px;">Danh sách sản phẩm</b></p>
            <table class="table table-styling table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá sản phẩm</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
        ';
        foreach($cthd as $key => $ct){
            $output .= '
                <tr>
                    <td>'. $ct->product->id .'</td>
                    <td>'. $ct->product->name .'</td>
                    <td>'. $ct->amount .'</td>
                    <td>'. $ct->unit_price .'</td>
                    <td>'. $ct->unit_price * $ct->amount .'</td>
                </tr>
            ';
            $total += $ct->unit_price * $ct->amount;
        }

        $output .= '
                </tbody>
                <tbody>
                    <tr>
                        <p></p>
                    </tr>
                    <th>
                        <td colspan = "3">Tổng cộng: </td>
                        <td>'.$total.'</td>
                    </th>
                </tbody>
            </table>

            <br>
            <br>
            
            <table>
                <thead>
                    <tr>
                        <th width = "250px"> 
                            <p style="margin:20px 0px 80px 0px">
                                <b style="font-size: 18px;">Người lập phiếu</b><br>
                                <i style="font-weight: 400;">(Kí, đóng dấu và ghi rõ họ tên)</i>
                            </p>
                            <p>' . Session::get('name') . '</p>
                        </th>
                        <th width = "700px">
                            <p style="margin:20px 0px 80px 0px">
                                <b style="font-size: 18px;">Người nhận</b><br>
                                <i style="font-weight: 400;">(Kí, đóng dấu và ghi rõ họ tên)</i>
                            </p>
                        </th>
                    </tr>
                </thead>
            </table>
        ';
        return $output;
    }
}