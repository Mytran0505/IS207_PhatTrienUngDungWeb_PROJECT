<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Coupon\CouponRequest;
use App\Http\Services\Coupon\CouponService;
use Carbon\Carbon;

class CouponController extends Controller
{
    protected $couponService;

    public function __construct(CouponService $couponService) {
        $this->couponService = $couponService;
    }

    public function index() {
        return view('admin.coupon.list', [
            'title' => 'Danh sách chương trình khuyến mãi',
            'coupon' => $this->couponService->get(),
            'today' => Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d')
        ]);
    }

    public function create() {
        return view('admin.coupon.add', [
            'title' => 'Thêm chương trình khuyến mãi',
            'menus' => $this->couponService->getMenu(),
            'products' => $this->couponService->getProduct()
        ]);
    }

    public function store(CouponRequest $request) {
        $this->couponService->insert($request);
        return redirect()->back();
    }

    public function show(Coupon $coupon) {
        return view('admin.coupon.edit', [
            'title' => 'Chỉnh sửa khuyến mãi',
            'coupon' => $coupon,
            'menus' => $this->couponService->getMenu(),
            'products' => $this->couponService->getProduct()
        ]);
    }

    public function update(Request $request, Coupon $coupon) {
        $result = $this->couponService->update($request, $coupon);
        if($result) {
            return redirect('/admin/coupons/list');
        }
        return redirect()->back();
    }
}
