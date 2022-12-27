<?php

namespace App\Http\Controllers;

use App\Http\Services\Coupon\CouponService;
use Illuminate\Http\Request;

use App\Http\Services\Slider\SliderService;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
use App\Models\Blog;

class MainController extends Controller
{
    protected $slider;
    protected $menu;
    protected $product;
    public function __construct(SliderService $slider, MenuService $menu,
    ProductService $product, CouponService $coupon)
    {
        $this->slider = $slider;
        $this->menu = $menu;
        $this->product = $product;
        $this->coupon = $coupon;
    }

    public function index() {
        $blogs = Blog::newBlog()->get();
        // dd($blogs);
        return view('home', [
            'title' => 'Sportwearshop - Cửa hàng thể thao',
            'slider' => $this->slider->show(),
            'menu' => $this->menu->show(),
            'products' => $this->product->get(),
            'coupons' => $this->coupon->getCoupon(),
            'blogs' => $blogs
        ]);
    }

    public function loadProduct(Request $request){
        $page = $request->input('page',0);
        $result = $this->product->get($page);
        if(count($result) != 0){
            $html = view('products.list', ['products' => $result])->render();
            return response()->json([
                'html' => $html
            ]);
        }
        return response()->json([
            'html' => ''
        ]);
    }

    public function blogDetail($blog){
        // dd($blog);
        $resultBlog = Blog::where('status',1)->where('id',$blog)->get();
        return view('blog-detail',[
            'title' => 'Blog',
            'blogs' => $resultBlog,
            compact('blog')
            ]
        );
    }
    
}
