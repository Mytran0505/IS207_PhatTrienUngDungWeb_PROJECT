<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Bill_khachhang;
use App\Http\Controllers\Controller;
use App\Models\CTHD;

class MainController extends Controller
{
    public function index(){
        $product = Product::all()->count();
        $order = Bill_khachhang::all()->count();
        $customer = Customer::all()->count();
        $customer_spend = Customer::orderBy('spend', 'DESC')->take(20)->get();
        $cthd = CTHD::with('product')->selectRaw('sum(amount) as sum, product_id')
            ->groupBy('product_id')
            ->orderBy('sum','DESC')
            ->take(20)->get();

        return view('admin.home', [
            'title' => 'Trang quản trị Admin',
            'product' => $product,
            'order' => $order,
            'customer' => $customer,
            'customer_spend' => $customer_spend,
            'cthd' => $cthd
        ]);
    }

    public function filterByDate(Request $request){
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];
        $status = "Đã nhận đơn";
        $result = Bill_khachhang::selectRaw('sum(total_money) as sum, bill_khachhangs.created_at')
            ->whereBetween('bill_khachhangs.created_at', [$from_date, $to_date])
            ->where('bill_khachhangs.status', $status)
            ->groupBy('bill_khachhangs.created_at')
            ->orderBy('bill_khachhangs.created_at', 'ASC')
            ->get();
        foreach($result as $key => $val){
            $chart_data[] = array(
                'period' => $val->created_at,
                'sales' => $val->sum
            );
        }
        echo $data = json_encode($chart_data);
    }

    public function daysOrder(){
        $from_date = Carbon::now('Asia/Ho_Chi_Minh')->subdays(60)->toDateString();
        $to_date = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        $status = "Đã nhận đơn";
        $result = Bill_khachhang::selectRaw('sum(total_money) as sum, bill_khachhangs.created_at')
            ->whereBetween('bill_khachhangs.created_at', [$from_date, $to_date])
            ->where('bill_khachhangs.status', $status)
            ->groupBy('bill_khachhangs.created_at')
            ->orderBy('bill_khachhangs.created_at', 'ASC')
            ->get();
        foreach($result as $key => $val){
            $chart_data[] = array(
                'period' => $val->created_at,
                'sales' => $val->sum
            );
        }
        echo $data = json_encode($chart_data);
    }

    public function printRevenueReport() {
        $from_date = Carbon::now('Asia/Ho_Chi_Minh')->subdays(60)->toDateString();
        $to_date = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $status = "Đã nhận đơn";
        $result = Bill_khachhang::selectRaw('sum(total_money) as sum, bill_khachhangs.created_at')
            ->whereBetween('bill_khachhangs.created_at', [$from_date, $to_date])
            ->where('bill_khachhangs.status', $status)
            ->groupBy('bill_khachhangs.created_at')
            ->orderBy('bill_khachhangs.created_at', 'ASC')
            ->get();
        return view('admin.report.revenue_report', [
            'from_date' => $from_date,
            'to_date' => $to_date,
            'statistic_info' => $result
        ]);
    }

    public function printRevenueReportDate($from_date, $to_date) {
        $status = "Đã nhận đơn";
        $result = Bill_khachhang::selectRaw('sum(total_money) as sum, bill_khachhangs.created_at')
            ->whereBetween('bill_khachhangs.created_at', [$from_date, $to_date])
            ->where('bill_khachhangs.status', $status)
            ->groupBy('bill_khachhangs.created_at')
            ->orderBy('bill_khachhangs.created_at', 'ASC')
            ->get();
        return view('admin.report.revenue_report', [
            'from_date' => $from_date,
            'to_date' => $to_date,
            'statistic_info' => $result
        ]);
    }
}
