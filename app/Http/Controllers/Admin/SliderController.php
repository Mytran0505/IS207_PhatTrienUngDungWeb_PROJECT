<?php

namespace App\Http\Controllers\Admin;

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
}
