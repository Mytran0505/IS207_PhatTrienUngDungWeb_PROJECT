<?php

namespace App\Http\Services\Slider;

use App\Models\Banner;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
        return Banner::orderByDesc('id')->get();
    }

    public function update($request, $slider) {
        try {
            $slider->fill($request->input());
            $slider->save();
            Session::flash('success', 'Cập nhật Banner thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật Banner lỗi');
            return false;
        }
        return true;
    }

    public function destroy($request) {
        $slider = Banner::where('id', $request->input('id'))->first();
        if($slider) {
            $path = str_replace('storage', 'public', $slider->image);
            Storage::delete($path);
            $slider->delete();
            return true;
        }

        return false;
    }

    public function show(){
        return Banner::where('active', 1)->orderBy('sort_by')->get();
    }
}