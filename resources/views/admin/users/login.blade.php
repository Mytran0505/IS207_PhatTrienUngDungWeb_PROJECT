<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.head')
</head>
<body class="hold-transition login-page bgadmin">
<div class="light-around">
    <div class="form">
        <div class="login-box">
        
        <!-- /.login-logo -->
        <div class="card">
            <div class="login-logo">
                <b>Đăng nhập</b>
            </div>
                <div class="card-body login-card-body">
                    {{-- <p class="login-box-msg">Đăng nhập vào admin</p> --}}
                    
                    @include('admin.alert')
                    <form action="/admin/users/login/store" method="post">
                            <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            </div>
                            <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-7">
                                <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-5">
                                <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                            </div>
                            <!-- /.col -->
                            </div>
                            @csrf
                    </form>

                    {{-- <div class="social-auth-links text-center mb-3">
                        <p>- OR -</p>
                        <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Đăng nhập với Facebook
                        </a>
                        <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Đăng nhập với Google+
                        </a>
                    </div> --}}

                    <!-- /.social-auth-links -->
                    {{-- <div class="row">
                        <p class="col-8 mt-2">
                            <a href="forgot-password.html">Quên mật khẩu</a>
                        </p>
                        <p class="col-4 mb-0">
                            <a href="/admin/users/register" class="text-center btn btn-primary btn-block">Đăng ký</a>
                        </p>
                    </div>
                </div> --}}
            <!-- /.login-card-body -->
        </div>
        </div>
    </div>
</div>
<!-- /.login-box -->
    @include('admin.footer')
</body>
</html>
