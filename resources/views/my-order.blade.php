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
                </a>
            </div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
	<?php   
            $CustomerId = Session::get('customerId');
            $avt = "user.png";
			$name = Session::get('customerName');
	?>	
 
	<!-- Start Contact -->
	<div class="row gutters-sm pt-45 pl-60 pr-60 pb-80">
        <div class="col-md-3 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                  <img src="/template/images/Logo/{{ $avt }}" alt="Client" class="rounded-circle" width="150">
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
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="title">
                            <h1>Lịch sử đơn hàng</h1>
                        </div>
                        <Br>
						@if(count($orders) == 0)
							<p>Khách hàng chưa có đơn hàng nào.</p>
						@else
                        <table class="table table-striped">
							<thead>
							  <tr>
								<th scope="col"><b>Mã đơn hàng</b></th>
								<th scope="col"><b>Sản phẩm</b></th>
								<th scope="col"><b>Tổng tiền</b></th>
								<th scope="col"><b>Trạng thái đơn hàng</b></th>
                                <th></th>
							  </tr>
							</thead>
							<tbody>
								@foreach($orders as $key => $item)
								<tr>
									<td>
										<a href="/my-order-details/{{ $item->id }}" style="color: #77ACF1">{{$item->id}}</a>
									</td>
									<td>
										{{date("d/m/Y", strtotime($item->created_at))}}
									</td>
									<td>
										{{number_format($item->total_money, 0, " ", ".").' ₫'}}
									</td>
									<td>{{$item->status}}</td>
									<td><a href="/my-order-details/{{ $item->id }}" style="color: #77ACF1">Chi tiết đơn hàng</a></td>
								</tr>
								@endforeach
							</tbody>
						</table>
						@endif
                    </div>
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