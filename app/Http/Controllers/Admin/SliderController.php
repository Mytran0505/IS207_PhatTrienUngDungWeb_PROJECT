<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Slider\SliderService;

class SliderController extends Controller
{

    protected $slider;

    public function __construct(SliderService $slider) {
        $this->slider = $slider;
    }

    public function index(){
        return view('admin.slider.list', [
            'title' => 'Danh sách banner',
            'sliders' => $this->slider->get()
        ]);
    }

    public function create() {
        return view('admin.slider.add', [
            'title' => 'Thêm Banner'
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            'url' => 'required'
        ]);
        $this->slider->insert($request);
        return redirect()->back();
    }

    public function show(Banner $slider) {
        return view('admin.slider.edit', [
            'title' => 'Cập nhật banner',
            'slider' => $slider
        ]);
    }

    public function update(Request $request, Banner $slider) {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            'url' => 'required'
        ]);

        $result = $this->slider->update($request, $slider);
        if($result) {
            return redirect('/admin/sliders/list');
        }

        return redirect()->back();
    }

    public function destroy(Request $request) {
        $result = $this->slider->destroy($request);
        if($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công banner'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
}
