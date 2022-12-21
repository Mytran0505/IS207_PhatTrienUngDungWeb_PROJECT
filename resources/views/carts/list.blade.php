@extends('main')

@section('content')
<form class="bg0 p-t-130 p-b-85" method="post">
		<div class="container">
			@include('admin.alert')
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-r--40 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							@php
							$total = 0;
							@endphp
							
							<table class="table-shopping-cart">
								</thead>
									<tr class="table_head">
										<th class="column-1">Sản phẩm</th>
										<th class="column-2"></th>
										<th class="text-center">Giá</th>
										<th class="text-center" style="width:140px">Số lượng</th>
										<th class="column-5">Tổng tiền</th>
										<th class="column-6">&nbsp;</th>
									</tr>
								</thead>
								<tbody>
								@if (count($products)!=0)
									@foreach($products as $key => $product)

										@php
										$price = $product->price_sale != 0 ? $product->price_sale : $product->original_price;
										$priceEnd = $price * $carts[$product->id];
										$total += $priceEnd;
										@endphp
										<tr class="table_row">
											<td class="column-1">
												<div class="how-itemcart1">
													<img class="b-r-15-new img-sc" src="{{$product->image}}/item1.jpeg" alt="IMG">
												</div>
											</td>
											<td class="column-2 limit-text-for-cart">{{$product->name}}</td>
											<td class="column-3 p-l-15">{{number_format($price, 0, '', '.')}}₫</td>
											<!-- Khuc nay chua hieu price la ori_price hay la price ben Helper goc cua ngta la price -->
											<td class="column-4">
												<div class="wrap-num-product flex-w m-l-auto m-r-0">
													<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
														<i class="fs-16 zmdi zmdi-minus"></i>
													</div>

													<input 	class="mtext-104 cl3 txt-center num-product" type="number"
															name="num_product[{{$product->id}}]" value="{{$carts[$product->id]}}">

													<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
														<i class="fs-16 zmdi zmdi-plus"></i>
													</div>
												</div>
											</td>
											<td class="column-5">{{number_format($priceEnd, 0, '', '.')}}₫</td>
											<td class="p-r-15">
												<a href="/carts/delete/{{$product->id}}">Xóa</a>
											</td>
										</tr>
									@endforeach
									@else
									<tr>
										<td colspan="5">
											<img style="display: block; width: auto; height: 250px; margin-left: auto; margin-right: auto; " src="template/images/empty-cart.png">
										</td>
									</tr>
									@endif
								</tbody>
							</table>
						</div>

						

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Mã khuyến mãi">
									
								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Áp dụng
								</div>
							</div>

							<input type="submit" value="Cập nhật giỏ hàng" formaction="/update-cart"
								class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
							@csrf
						</div>
					</div>
				</div>
				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm b-r-20">
						<h4 class="mtext-109 cl2 p-b-10 ">
							Tổng thanh toán
						</h4>

							<div class="size-100 p-r-18 p-r-0-sm w-full-ssm">				
								<div class="p-t-15">
									<span class="stext-112 cl8">
										Thông Tin Khách Hàng
									</span>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name" placeholder="Tên Khách Hàng" >
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone" placeholder="Số Điện Thoại" >
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address" placeholder="Địa Chỉ Giao Hàng">
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="email" placeholder="Email Liên Hệ">
									</div>

									<div class="bor8 bg0 m-b-12">
										<textarea class="stext-111 cl8 plh3 size-111 p-lr-15" name="content" placeholder="Ghi chú"></textarea>
									</div>


								</div>
							</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Tổng tiền:
								</span>
							</div>

							<div class="size-209 p-t-1" style="color: #333">
								<input type="hidden" class="mtext-110 cl2" name="total" value="{{ $total }}">
									{{number_format($total, 0, '', '.')}}₫
							</div>
						</div>

						<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Đặt Hàng
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>
@endsection