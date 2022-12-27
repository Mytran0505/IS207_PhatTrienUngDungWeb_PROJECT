@extends('main')
<head>
	@include('head')
</head>
@section('content')
<div id="loader">
    <div class="loader-inner">
        <div class="loader-line-wrap">
            <div class="loader-line"></div>
        </div>
        <div class="loader-line-wrap">
            <div class="loader-line"></div>
        </div>
        <div class="loader-line-wrap">
            <div class="loader-line"></div>
        </div>
        <div class="loader-line-wrap">
            <div class="loader-line"></div>
        </div>
        <div class="loader-line-wrap">
            <div class="loader-line"></div>
        </div>
    </div>
    <div class="load">Loading . . . </div>
</div>
<section class="p-t-100 bg0 p-b-150">
    <div class="container p-t-10">
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10 d-center">
                <p class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1 " data-filter="*">
                    TẤT CẢ SẢN PHẨM
                </p>
            </div>
        </div>
        <div id ="loadProduct">
            <div class="row isotope-grid">
                @foreach ($products as $key => $product)
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0 b-r-20 b-shadow">
                            <a href="/san-pham/{{ $product->id }}-{{ \Str::slug($product->name),'-'}}.html">
                                <img src="{{ $product->image }}/item1.jpeg" alt="{{ $product->name }}">
                                <button href="#" class="bg-quick hov-bg-quick block2-btn flex-c-m stext-103 cl2 size-102 bor2 p-lr-15 trans-04 js-show-modal1"
                                data-product = "{{ $product }}">
                                    Xem nhanh
                                </button>
                            </a>
                        </div>
            
                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child3 flex-col-l ">
                                <a href="/san-pham/{{ $product->id }}-{{ \Str::slug($product->name),'-'}}.html" 
                                    class="cl14 hov-cl1 trans-04 js-name-b2 p-b-4 limit-text-2">
                                    {{ $product->name }}
                                </a>
            
                                <span class="stext-sub-105 cl13">
                                    {!! \App\Helpers\Helper::price($product->original_price,$product->price_sale)!!}₫
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>            
        </div>
    </div>
</section>
@endsection