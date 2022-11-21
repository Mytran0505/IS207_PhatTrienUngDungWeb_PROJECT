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

    }

    public function create() {
        return view('admin.slider.add', [
            'title' => 'Thêm slider'
        ]);
    }
}
