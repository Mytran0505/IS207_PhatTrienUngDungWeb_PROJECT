@extends('main')

@section('head')
	<style>
		.main-menu > li.{{ $product->menu->name }} > a {
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
    <div class="container p-t-80">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="/" class="stext-109 cl8 hov-cl1 trans-04">
				Trang chủ
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="/danh-muc/{{ $product->menu->id}}-{{ \Str::slug($product->menu->name)}}.html" 
                class="stext-109 cl8 hov-cl1 trans-04">
				{{ $product->menu->name}}
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl14">
				{{$title}}
			</span>
		</div>
	</div>

	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="{{$product->image}}/item1.jpeg">
									<div class="wrap-pic-w pos-relative">
										<img src="{{$product->image}}/item1.jpeg" alt="IMG-PRODUCT">
                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{$product->image}}/item1.jpeg">
                                            <i class="fa fa-expand"></i>
                                        </a>
									</div>
								</div>

								<div class="item-slick3" data-thumb="{{$product->image}}/item2.jpeg">
									<div class="wrap-pic-w pos-relative">
										<img src="{{$product->image}}/item2.jpeg" alt="IMG-PRODUCT">
                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{$product->image}}/item2.jpeg">
                                            <i class="fa fa-expand"></i>
                                        </a>
									</div>
								</div>

								<div class="item-slick3" data-thumb="{{$product->image}}/item3.jpeg">
									<div class="wrap-pic-w pos-relative">
										<img src="{{$product->image}}/item3.jpeg" alt="IMG-PRODUCT">
                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{$product->image}}/item3.jpeg">
                                            <i class="fa fa-expand"></i>
                                        </a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							{{$title}}
						</h4>
						<?php if(count($coupons) > 0) { ?>
							@php
								$price = \App\Helpers\Helper::price($product->original_price, $product->price_sale);
								foreach($coupons as $key => $coupon){
									if($coupon->menu_id){
										if($product->menu_id == $coupon->menu_id){
											$price = number_format($product->price_sale - ($product->price_sale * ($coupon->number/100)));
										}
									}
									else{
										if($product->id == $coupon->product_id){
											$price = number_format($product->price_sale - ($coupon->product->price_sale * ($coupon->number/100)));
										}
									}
								}
							@endphp
							<div class="product-price priceList">
								<span style="color:#000; font-size: 18px;">{{$price}}₫</span>
								@foreach ($coupons as $key => $coupon)
									@if($coupon->menu_id)
										@if ($product->menu_id == $coupon->menu_id)
											<span class="old">{{number_format($product->price_sale).' '.'₫'}}</span>
										@endif
									@endif
									@if ($coupon->product_id)
										@if ($product->id == $coupon->product_id)
											<span class="old">{{number_format($product->price_sale).' '.'₫'}}</span>
										@endif
									@endif
								@endforeach
							</div>
							<?php } 
						else {?>
							<span class="stext-sub-105 cl13">
								{!! \App\Helpers\Helper::price($product->original_price,$product->price_sale)!!}₫
							</span>
						<?php } ?>
						<p class="stext-102 cl3 p-t-23">
							{{$product->description}}	
						</p>
						<div class="flex-w flex-r-m p-b-10 m-t-20 m-l-22">
							<div class="size-203 flex-c-m respon6" style="font-size: 14px">
								Size
							</div>
							<?php if($product->menu_id == 5) { ?>
								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" name="time">
											<option>Choose an option</option>
											<option>35</option>
											<option>36</option>
											<option>37</option>
											<option>38</option>
											<option>39</option>
											<option>40</option>
											<option>41</option>
											<option>42</option>
											<option>43</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							<?php } else { ?>
								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" name="time">
											<option>Choose an option</option>
											<option>Size S</option>
											<option>Size M</option>
											<option>Size L</option>
											<option>Size XL</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
								<?php } ?>
						</div>
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<form>
										@csrf
										@if ($product->original_price != NULL)
											<div class="wrap-num-product-in-cart flex-w m-r-20 m-tb-10">
												<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
													<i class="fs-16 zmdi zmdi-minus"></i>
												</div>

												<input 	class="mtext-104 cl3 txt-center num-product num_product_{{ $product->id }}" type="number"
														name="num_product" value="1">

												<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
													<i class="fs-16 zmdi zmdi-plus"></i>
												</div>
											</div>

											{{-- <button type="submit"
													class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
												Thêm vào giỏ hàng
											</button> --}}
											<input type="hidden" name="product_id" class="product_id_{{ $product->id }}" value="{{$product->id}}">
											<button type="button" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" data-id_product = "{{ $product->id }}">
												Thêm vào giỏ hàng
											</button>
										@endif
									</form>
								</div>
							</div>	
						</div>

						<!--  -->
						<div class="flex-w flex-m p-l-100 p-t-40 respon7 ic-center-cart">
							<div class="flex-m bor9 p-r-10 m-r-11">
								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
									<i class="zmdi zmdi-favorite"></i>
								</a>
							</div>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
								<i class="fa fa-facebook"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
								<i class="fa fa-twitter"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
								<i class="fa fa-google-plus"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Mô tả</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#information" role="tab">Thông tin thêm</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Đánh giá</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
									{{$product->content}}
								</p>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="information" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<ul class="p-lr-28 p-lr-15-sm">
										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Cân nặng
											</span>

											<span class="stext-102 cl6 size-206">
												0.79 kg
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Kích thước
											</span>

											<span class="stext-102 cl6 size-206">
												110 x 33 x 100 cm
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Chất liệu
											</span>

											<span class="stext-102 cl6 size-206">
												60% cotton
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Màu
											</span>

											<span class="stext-102 cl6 size-206">
												Đen, Xanh Dương, Xám, Xanh Lục, Đỏ, Trắng
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Size
											</span>

											<span class="stext-102 cl6 size-206">
												XL, L, M, S
											</span>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="reviews" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<div class="p-b-30 m-lr-15-sm">
										<!-- Review -->
										<div class="flex-w flex-t p-b-68">
											<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
												<img src="/template/images/avatar-01.jpg" alt="AVATAR">
											</div>

											<div class="size-207">
												<div class="flex-w flex-sb-m p-b-17">
													<span class="mtext-107 cl2 p-r-20">
														Mỹ Trân
													</span>

													<span class="fs-18 cl11">
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star-half"></i>
													</span>
												</div>

												<p class="stext-102 cl6">
													Tốt, mềm, mặc thoáng mát chất liệu tốt.
												</p>
											</div>
										</div>
										
										<!-- Add review -->
										<form class="w-full">
											<h5 class="mtext-108 cl2 p-b-7">
												Thêm đánh giá
											</h5>

											<p class="stext-102 cl6">
												Địa chỉ email
											</p>

											<div class="flex-w flex-m p-t-50 p-b-23">
												<span class="stext-102 cl3 m-r-16">
													Đánh giá của bạn
												</span>

												<span class="wrap-rating fs-18 cl11 pointer">
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<input class="dis-none" type="number" name="rating">
												</span>
											</div>

											<div class="row p-b-25">
												<div class="col-12 p-b-5">
													<label class="stext-102 cl3" for="review">Đánh giá của bạn</label>
													<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
												</div>

												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="name">Tên</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="name">
												</div>

												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="email">Email</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text" name="email">
												</div>
											</div>

											<button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
												Gửi
											</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
			<span class="stext-107 cl6 p-lr-25">
				Danh mục: {{$product->menu->name}}
			</span>
		</div>
	</section>
	<!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Các sản phẩm liên quan
				</h3>
			</div>
				@include('products.list')
		</div>
	</section>

@endsection