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
    
                <a href="#" class="stext-109 cl8 hov-cl1 trans-04" style="font-size: 16px">
                    Profile
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
	<div class="row gutters-sm pt-20 pl-60 pr-80 pb-80">
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
                @foreach($customer as $key => $cus)
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="title">
                            <h1>Thông tin tài khoản</h1>
                        </div>
                        <Br>
                        <div class="row">
                            <div class="col-sm-3">
                                <h4 class="mt-0">Họ và tên</h4>
                            </div>
                            <div class="col-lg-6" >
                                <div class="form-group">
                                    <input name="name" class="input-profile" type="text" placeholder="{{$cus->name}}" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h4 class="mb-0">Email</h4>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <input name="email" type="email" placeholder="{{$cus->email}}" value="{{$cus->email}}" class="input-profile">
                                </div>	
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h4 class="mb-0">Số điện thoại</h4>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <input name="phone" type="text" placeholder="{{$cus->phone}}" class="input-profile">
                                </div>	
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h4 class="mb-0">Địa chỉ</h4>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <input name="address" type="text" placeholder="{{$cus->address != null ? $cus->address : ''}}" class="input-profile">
                                </div>	
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                            <a class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10" target="__blank" href="#" style="font-size:12px;">Cập nhật</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="title">
                            <h1>Thay Đổi Mật Khẩu</h1>
                        </div>
                        <Br>
						<div class="row">
                            <div class="col-sm-3">
                                <h4 class="mb-0">Mật khẩu hiện tại</h4>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="password"  name="" id="" placeholder="" class="input-profile">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h4 class="mb-0">Mật khẩu mới</h4>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="password"  name="" id="" placeholder="" class="input-profile">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h4 class="mb-0">Nhập lại mật khẩu</h4>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="password"  name="" id="" placeholder="" class="input-profile">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-2">
                            <a class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10" target="__blank" href="#" style="font-size:12px">Cập nhật</a>
                            </div>
                        </div>
                    </div>
                </div>

               
            </div>
        </div>
	<!--/ End Contact -->
@endsection