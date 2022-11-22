<?php

namespace App\Http\Services\Slider;

use App\Models\Banner;
use Illuminate\Support\Facades\Session;

class SliderService 
{
    public function insert($request) {
        try {
            Banner::create($request->input());
            Session::flash('success', 'Thêm banner mới thành công');
        } catch (\Exception $err) {
            Session::flash('error','Thêm banner lỗi');
            return false;
        }

        return true;
    }

    public function get() {
        return Banner::orderByDesc('id')->paginate(10);
    }
}