@extends('main')
@section('head')
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
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

<!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container p-t-80">
            <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg" style="font-size: 14px">
                <a href="/" class="stext-109 cl8 hov-cl1 trans-04" style="font-size: 16px">
                    Trang chủ
                    <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                </a>

                <a href="/" class="stext-109 cl8 hov-cl1 trans-04" style="font-size: 16px">
                    Tài khoản
                    <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                </a>

                <a href="/my-orders" class="stext-109 cl8 hov-cl1 trans-04" style="font-size: 16px">
                    Đơn hàng của tôi
                    <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                </a>

                <a href="/my-order-details/{{ $order->id }}" class="stext-109 cl8 hov-cl1 trans-04" style="font-size: 16px">
                    Chi tiết đơn hàng
                </a>
            </div>
        </div>
    </div>

	<!-- End Breadcrumbs -->
	<?php   
            $CustomerId = Session::get('customerId');
            $phone = Session::get('phone');
            $address = Session::get('address');
			$name = Session::get('customerName');
            $avt = "default-user-icon.png";
	?>	
 
	<!-- Start Contact -->
	<div class="row gutters-sm pt-45 pl-60 pr-60 pb-80">
        <div class="col-md-3 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                  <img src="/template/admin/dist/img/{{ $avt }}" alt="Client" class="rounded-circle" width="150">
                  <div class="mt-3">
                    <h4>Xin chào, {{$name}}!</h4>
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="card mt-4" >
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <h4 class="mb-0" >
                      <i style="font-size: 20px; padding-right: 15px; font-weight:bold;" class="fa fa-user-circle-o" class="fa fa-user-circle-o" ></i> 
                      <a href="/profile/{{ $CustomerId }}" class="cl8 hov-cl1 trans-04" style="font-weight:600;">Tài khoản</a>
                  </h4>
                  
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <h4 class="mb-0">
                      <i style="font-size: 20px; padding-right: 18px;" class="fa fa-history" class="fa fa-history" ></i>
                      <a href="/my-orders" class="cl8 hov-cl1 trans-04" style="font-weight:600;">Lịch sử mua hàng</a>
                  </h4>
                </li>
              </ul>
            </div>
        </div>
            <div class="col-md-9">
            	<h3 style="margin: 20px 0px;">Chi tiết đơn hàng #{{$order->id}} <p style="float:right;">Ngày đặt hàng: {{date("h:i d/m/Y", strtotime($order->created_at))}} </p></h3>
				<input type="text" class="OrderId" value="{{$order->id}}" hidden>
				<div class="row">
					<div class="col-sm-4">
						<div class="card panel-default">
							<div class="panel-heading mt-3 ml-3" style="background-color: white;"><h5><b>ĐỊA CHỈ NGƯỜI NHẬN</b></h5></div>
                            <hr>
							<div class="panel-body ml-3" style="height:200px">
								<p><b>{{$name}}</b><p>
								<p>Địa chỉ: {{$address}}<p>
								<p>Điện thoại: {{$phone}}</p>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="card panel-default">
							<div class="panel-heading mt-3 ml-3" style="background-color: white;"><h5><b>HÌNH THỨC THANH TOÁN</b></h5></div>
                            <hr>
							<div class="panel-body ml-3" style="height:200px">
								<p>Thanh toán khi giao hàng</p>
								<p>Tình trạng: {{$order->status}}</p>
							</div>
						</div>
					</div>
				</div>
				<div class="card panel-default mt-20 mb-4">
					<div class="panel-body">
						<table class="table">
							<thead class="thead-light">
							  <tr>
								<th scope="col" colspan="2"><b>Sản phẩm</b></th>
								<th scope="col"><b>Giá</b></th>
								<th scope="col"><b>Số lượng</b></th>
								<th scope="col" style="text-align: right;"><b>Tạm tính</b></th>
							  </tr>
							</thead>
							<tbody>
								@foreach($cthds as $key => $item)
								<tr>
									<td><img style="margin: auto; max-width: 60px; max-height: 60px; width: auto; height: auto; " src="{{$item->product->image}}/item1.jpeg" alt="IMG"></td>
									<td><a href="/san-pham/{{ $item->product_id }}-{{ \Str::slug($item->product->name),'-'}}.html" style="text-decoration:none; font-weight:bold">{{$item->product->name}}<br></a>
									<td>{{number_format($item->unit_price, 0, " ", ".").' ₫'}}</td>
									<td>x{{$item->amount}}</td>
									<td style="text-align: right;">{{number_format($item->unit_price * $item->amount, 0, " ", ".").' ₫'}}</td>
								</tr>
								@endforeach
								<tr>
									<td colspan="3">
									</td>
									<td>
										<p>Tạm tính</p>
										<p>Giảm giá</p>
										<p>Tổng cộng</p>
									</td>
									<td style="text-align: right;">
										<p>{{number_format($order->total_money, 0, " ", ".").' ₫'}}</p>
                                        
                                        @php
										$price_coupon = 0;
										if(count($coupons) > 0){
                                            foreach($cthds as $key => $item){
                                                foreach ($coupons as $key => $coupon){
                                                    if($coupon->menu_id){
                                                        if($item->product->menu_id == $coupon->menu_id){
                                                            $price_coupon += $item->product->price_sale * ($coupon->number/100);
                                                        }
                                                    }
                                                    else{
                                                        if($item->product_id == $coupon->product_id){
                                                            $price_coupon += $coupon->product->price_sale * ($coupon->number/100);
                                                        }
                                                    }
                                                }	
                                            }
										}
										else{
											$price_coupon = 0;
										}
										@endphp
										<p>-{{ number_format($price_coupon, 0, " ", ".")}} ₫</p>

										<p style="color: red; font-size: 20px">{{number_format($order->total_money, 0, " ", ".").' ₫'}}</p>
									</td>
								</tr>
							</tbody>
						  </table>
					</div>
				</div>
				<!--  -->
				<!--  -->
				<p><a href="/my-orders" style="text-decoration:none"><< Quay lại đơn hàng của tôi</a></p>
			</div>
            </div>
        </div>
	<!--/ End Contact -->
    @endsection
    <style type="text/css">
        body{
            
            color: #1a202c;
            text-align: left;  
        }
        .card {
            box-shadow: 0 1px 3px 0 rgb(176, 190, 197), 0 1px 2px 0 rgb(144, 164, 174);
        }
        
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0,0,0,.125);
            border-radius: .5rem;
            font-size: 14px;
        }
        
        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1.5rem;
        }
        
        
        
        .gutters-sm>.col, .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }
        .mb-3, .my-3 {
            margin-bottom: 1rem!important;
        }
        
        .bg-gray-300 {
            background-color: #e2e8f0;
        }
        .h-100 {
            height: 100%!important;
        }
        .shadow-none {
            box-shadow: none!important;
        }
        
    </style>