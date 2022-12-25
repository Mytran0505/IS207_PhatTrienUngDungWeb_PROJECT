@extends('main')

@section('head')
	<style>
		.main-menu > li.category > a {
			color: #6c7ae0;
		}
	</style>
@endsection

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

	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				@foreach ($slider as $slider)
				<div class="item-slick1" style="background-image: url({{ $slider->image}});">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="0">
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="0">
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>


	<!-- Banner -->
	<div class="sec-banner bg0 p-t-80">
		<div class="container">
			<div class="row p-t-50">
				@foreach ($menu as $menu)
				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w b-r-50">
						<img class="b-r-50" src="{{ $menu->image }}" alt="IMG-BANNER">

						<a href="/danh-muc/{{ $menu->id}}-{{ \Str::slug($menu->name,'-') }}.html" 
						class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3 b-r-50">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									{{ $menu->name }}
								</span>

								<span class="block1-info stext-102 trans-04">
									HOT SUMMER 2022
								</span>
								
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>
				@endforeach
		</div>
	</div>

	{{-- Sales --}}
	<div class="product-area most-popular section " style="background-color: #F6FCFF">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-title" style="margin-bottom: 0px;">
						<h2 style="text-transform:none;">
						<img style="height:45px" src="/template/images/icons/fire.gif" alt="">Giảm giá sốc
						<img style="height:45px" src="/template/images/icons/fire.gif" alt=""></h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12" style="background-color: white;border-radius: 30px">
					<div class="banner-sales">
						@foreach($products as $key => $product)
						<div class="single-product">
							<div class="product-img" style="width: 250px; height: 200px;">
								<a href="/san-pham/{{ $product->id }}-{{ \Str::slug($product->name),'-'}}.html">
									<img class="default-img" style="margin: auto; max-width: 250px; max-height: 200px; width: auto; height: auto;" src="{{ $product->image }}/item1.jpeg" alt="#">
									<span class="out-of-stock">GIẢM 10%</span>
								</a>
								<div class="button-head">
									<div class="product-action-2">
										<a title="Add to cart" class="add-to-cart-a-tag" href="javascript:void(0)">Thêm vào giỏ hàng</a>
										<input type="text" value="{{$product->id}}" hidden>
										<input type="hidden" class="Quantity" value="{{$product->menu_id}}">
									</div>
								</div>
							</div>
							<div class="product-content">
								<h3><a style="text-decoration:none; color:black;" href="/san-pham/{{ $product->id }}-{{ \Str::slug($product->name),'-'}}.html"><b style="font-size:14px">{{$product->name}}</b></a></h3>
								<?php $avg_rating = 4?> 
								@if($avg_rating >= 1)
									<div class="star-wrapper" style="display: inline-block;">
									<p style="display:inline-block; font-size:10px; margin-left:10px">{{round($avg_rating, 1)}}</p>	
																@if($avg_rating > 4.5) <!-- 5 sao -->
																<a href="javascript:void(0)" class="fa fa-star s1" style="color:gold"></a>
																<a href="javascript:void(0)" class="fa fa-star s2" style="color:gold"></a>
																<a href="javascript:void(0)" class="fa fa-star s3" style="color:gold"></a>
																<a href="javascript:void(0)" class="fa fa-star s4" style="color:gold"></a>
																<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
																@elseif($avg_rating > 4) <!-- 4.5 sao -->
																<a href="javascript:void(0)" class="fa fa-star-half-o s1" style="color:gold"></a>
																<a href="javascript:void(0)" class="fa fa-star s2" style="color:gold"></a>
																<a href="javascript:void(0)" class="fa fa-star s3" style="color:gold"></a>
																<a href="javascript:void(0)" class="fa fa-star s4" style="color:gold"></a>
																<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
																@elseif($avg_rating > 3.5) <!-- 4 sao -->
																<a href="javascript:void(0)" class="fa fa-star s1"></a>
																<a href="javascript:void(0)" class="fa fa-star s2" style="color:gold"></a>
																<a href="javascript:void(0)" class="fa fa-star s3" style="color:gold"></a>
																<a href="javascript:void(0)" class="fa fa-star s4" style="color:gold"></a>
																<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
																@elseif($avg_rating > 3) <!-- 3.5 sao -->
																<a href="javascript:void(0)" class="fa fa-star s1"></a>
																<a href="javascript:void(0)" class="fa fa-star-half-o s2" style="color:gold"></a>
																<a href="javascript:void(0)" class="fa fa-star s3" style="color:gold"></a>
																<a href="javascript:void(0)" class="fa fa-star s4" style="color:gold"></a>
																<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
																@elseif($avg_rating > 2.5) <!-- 3 sao -->
																<a href="javascript:void(0)" class="fa fa-star s1"></a>
																<a href="javascript:void(0)" class="fa fa-star s2"></a>
																<a href="javascript:void(0)" class="fa fa-star s3" style="color:gold"></a>
																<a href="javascript:void(0)" class="fa fa-star s4" style="color:gold"></a>
																<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
																@elseif($avg_rating > 2) <!-- 2.5 sao -->
																<a href="javascript:void(0)" class="fa fa-star s1"></a>
																<a href="javascript:void(0)" class="fa fa-star s2"></a>
																<a href="javascript:void(0)" class="fa fa-star-half-o s3" style="color:gold"></a>
																<a href="javascript:void(0)" class="fa fa-star s4" style="color:gold"></a>
																<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
																@elseif($avg_rating > 1.5) <!-- 2 sao -->
																<a href="javascript:void(0)" class="fa fa-star s1"></a>
																<a href="javascript:void(0)" class="fa fa-star s2"></a>
																<a href="javascript:void(0)" class="fa fa-star s3"></a>
																<a href="javascript:void(0)" class="fa fa-star s4" style="color:gold"></a>
																<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
																@elseif($avg_rating > 1) <!-- 1.5 sao -->
																<a href="javascript:void(0)" class="fa fa-star s1"></a>
																<a href="javascript:void(0)" class="fa fa-star s2"></a>
																<a href="javascript:void(0)" class="fa fa-star s3"></a>
																<a href="javascript:void(0)" class="fa fa-star-half-o s3" style="color:gold"></a>
																<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
																@else <!-- 1 sao -->
																<a href="javascript:void(0)" class="fa fa-star s1"></a>
																<a href="javascript:void(0)" class="fa fa-star s2"></a>
																<a href="javascript:void(0)" class="fa fa-star s3"></a>
																<a href="javascript:void(0)" class="fa fa-star s4"></a>
																<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
																@endif		
																
													</div>
								@endif
								<div class="product-price">
									<span style="color:red; font-size:17px"><b>{{number_format($product->price_sale).' '.'₫'}}</b></span>
									<br>
									<span class="old">{{number_format($product->price_sale + ($product->price_sale * 0.1)).' '.'₫'}}</span>
								</div>
							</div>
						</div>
						<!-- End Single Product -->
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container p-t-10">
			{{-- <div class="p-b-10">
				<h3 class="ltext-103 cl5 tquan">
					TỔNG QUAN SẢN PHẨM
				</h3>
			</div> --}}

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10 d-center">
					<p class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1 " data-filter="*">
						TẤT CẢ SẢN PHẨM
					</p>
				</div>
				{{-- <div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Lọc
					</div>
				</div> --}}
				{{-- Lọc --}}
				{{-- <div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sắp xếp
							</div>

							<ul>
								<li class="p-b-6">
									<a href="{{ request() -> url() }}" class="filter-link stext-106 trans-04">
										Mặc định
									</a>    
								</li>

								<li class="p-b-6">
									<a href="{{ request() -> fullUrlWithQuery(['price_sale' => 'asc'])}}" class="filter-link stext-106 trans-04">
										Giá: Thấp đến cao
									</a>
								</li>

								<li class="p-b-6">
									<a href="{{ request() -> fullUrlWithQuery(['price_sale' => 'desc'])}}" class="filter-link stext-106 trans-04">
										Giá: Cao đến thấp
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Giá
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Tất cả
									</a>
								</li>
							
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										0đ - 200.000đ
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										200.00đ+
									</a>
								</li>
							</ul>
						</div>
					</div> 
				</div> --}}
			</div>
		<div id ="loadProduct">
			@include('products.list')
		</div>
		<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45" id ="button-loadMore">
				<input type = "hidden" value ="1" id ="page">
				<a onclick="loadMore()" class="loadmore b-r-15">
					Xem thêm
				</a>
			</div>
		</div>
	</section>
@endsection