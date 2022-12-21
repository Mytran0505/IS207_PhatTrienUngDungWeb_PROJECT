@extends('main')
@section('content')
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container p-t-80">
            <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg" style="font-size: 14px">
                <a href="/" class="stext-109 cl8 hov-cl1 trans-04" style="font-size: 16px">
                    Trang chủ
                    <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                </a>
    
                <a href="" class="stext-109 cl8 hov-cl1 trans-04" style="font-size: 16px">
                    profile
                    <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                </a>
            </div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
    <?php   
            $CustomerId = Session::get('customerId');
            $avt = "default-user-icon.png";
            $name = Session::get('name');
	?>												
	<!-- Start Contact -->
	<div class="row gutters-sm pt-20 pl-60 pr-80 pb-80">
            <div class="col-md-3 mb-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="" alt="Admin" class="rounded-circle" width="150">
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
						<a href="/profile/{{ $CustomerId }}" style="color:#333; font-weight:500;">Tài khoản</a>
					</h4>
                    
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h4 class="mb-0">
						<i style="font-size: 20px; padding-right: 18px;" class="fa fa-history" class="fa fa-history" ></i>
						<a href="{{URL::to('/my-orders')}}" style="color:#333; font-weight:500;">Lịch sử mua hàng</a>
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
                                    <input name="name" type="text" placeholder="{{$cus->name}}" style="width: 400px; border-radius: 3px; height: 28px;" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h4 class="mb-0">Email</h4>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <input name="email" type="email" placeholder="{{$cus->email}}" style="width: 400px; border-radius: 3px; height: 28px;">
                                </div>	
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h4 class="mb-0">Số điện thoại</h4>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <input name="company_name" type="text" placeholder="{{$cus->phone}}" style="width: 400px; border-radius: 3px; height: 28px;">
                                </div>	
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                            <a class="btn btn-info " target="__blank" href="#" style="font-size:12px;">Cập nhật</a>
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
                                    <input type="password"  name="" id="" placeholder="" style="width: 400px; border-radius: 3px; height: 28px;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h4 class="mb-0">Mật khẩu mới</h4>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="password"  name="" id="" placeholder=""style="width: 400px; border-radius: 3px; height: 28px;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h4 class="mb-0">Nhập lại mật khẩu</h4>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="password"  name="" id="" placeholder="" style="width: 400px; border-radius: 3px; height: 28px;">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12">
                            <a class="btn btn-info " target="__blank" href="#" style="font-size:12px">Cập nhật</a>
                            </div>
                        </div>
                    </div>
                </div>

               
            </div>
        </div>
	<!--/ End Contact -->
@endsection