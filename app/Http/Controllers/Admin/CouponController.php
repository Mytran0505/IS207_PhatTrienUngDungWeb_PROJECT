<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Coupon\CouponRequest;
use App\Http\Services\Coupon\CouponService;

class CouponController extends Controller
{
    protected $couponService;

    public function __construct(CouponService $couponService) {
        $this->couponService = $couponService;
    }

    public function create() {
        return view('admin.coupon.add', [
            'title' => 'Thêm chương trình khuyến mãi',
            'menus' => $this->couponService->getMenu(),
        ]);
    }

    public function store(CouponRequest $request) {
        $this->couponService->insert($request);
        return redirect()->back();
    }
}
