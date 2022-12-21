
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/images/icons/favicon.png">
    <link rel="stylesheet" href="/template/admin/dist/css/adminlte.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
    <link rel="stylesheet" href="/template/css/login-style.css">
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="/registerAuth" method="POST">
                {{csrf_field()}}
                <div class="logo">
                    <a href="#"><img src="/template/images/icons/image-logo-icon.png" alt="logo"></a>
                </div>
                <h1>Tạo tài khoản</h1>
                @include('admin.alert')
                <input type="text" placeholder="Họ và tên" name="name" />
                <input type="text" placeholder="Số điện thoại" name="phone" />
                <input type="text" placeholder="Username" name="email" />
                <input type="password" placeholder="Mật khẩu" name="password" />
                <button type="submit">Đăng ký</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="/login/store" method="POST" class="signin-form">
                {{csrf_field()}}
                <div class="logo">
                    <a href="#"><img src="/template/images/icons/image-logo-icon.png" alt="logo"></a>
                </div>
                <h1>Đăng nhập</h1>
                @include('admin.alert')
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />
                <button type="submit">Đăng nhập</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Mừng bạn trở lại!</h1>
                    <p>Đăng nhập để tiếp tục mua sắm nhé!</p>
                    <button class="ghost" id="signIn">Đăng nhập</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Xin chào!</h1>
                    <p>Đăng ký tài khoản và trải nghiệm ngay!</p>
                    <button class="ghost" id="signUp" >Đăng ký</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>
            Cảm ơn đã tin tưởng Sportswear Shop! Hi vọng bạn sẽ có trải nghiệm mua hàng tốt nhất <i class="fa fa-heart"></i>
        </p>
    </footer>
    <!-- partial -->
    <script src="/template/js/client.js"></script>
</body>
</html>
