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
    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
                Trang chủ
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <a href="/blog-detail" class="stext-109 cl8 hov-cl1 trans-04">
                Blog
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                8 Inspiring Ways to Wear Dresses in the Winter
            </span>
        </div>
    </div>


    <!-- Content page -->
    <section class="bg0 p-t-52 p-b-20">
        <div class="container">
            <div class="row">
                @foreach ($blogs as $key => $blog)
                    <div class="">
                        <div class="p-r-45 p-r-0-lg">
                            <!--  -->
                            <div class="wrap-pic-w how-pos5-parent">
                                <img class="b-r-15" src="{{ $blog->image }}" alt="IMG-BLOG">

                                <div class="flex-col-c-m size-123 bg9 how-pos5">
                                    <span class="ltext-107 cl2 txt-center">
                                        28
                                    </span>

                                    <span class="stext-109 cl3 txt-center">
                                        Dec 2022
                                    </span>
                                </div>
                            </div>

                            <div class="p-t-32">
                                <span class="flex-w flex-m stext-111 cl2 p-b-19">
                                    <span>
                                        <span class="cl4">Đăng bởi: </span> Admin
                                        <span class="cl12 m-l-4 m-r-6">|</span>
                                    </span>

                                    <span>
                                        28 Dec, 2022
                                        <span class="cl12 m-l-4 m-r-6">|</span>
                                    </span>

                                    <span>
                                        Kiểu đường phố, Thời trang, Cặp đôi
                                        <span class="cl12 m-l-4 m-r-6">|</span>
                                    </span>

                                    <span>
                                        8 Bình Luận
                                    </span>
                                </span>

                                <h4 class="ltext-109 cl2 p-b-28">
                                    {{ $blog->name }}
                                </h4>

                                <p class="stext-117 cl6 p-b-26">
                                    {{ $blog->content }}
                                </p>

                            </div>

                            <div class="flex-w flex-t p-t-16">
                                <span class="size-216 stext-116 cl8 p-t-4">
                                    Thẻ
                                </span>

                                <div class="flex-w size-217">
                                    <a href="/danh-muc/2-nu.html"
                                        class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                        Thời Trang Nữ
                                    </a>

                                    <a href="/danh-muc/8-giay-nu.html"
                                        class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                        Giày Nữ
                                    </a>
                                </div>
                            </div>
                            <!--  -->
                            <div class="p-t-40">
                                <h3 class="mtext-113 cl2 p-b-12">
                                    Bình Luận
                                </h3>

                                <?php
                                $CustomerId= Session::get('customerId');
                                $CustomerName= Session::get('name');
                                if($CustomerId) { ?>
                                    <form action="" method="POST" role="form">
                                        <h4 style="padding: 0px 0px 20px 0px; color: #f00;">Xin chào: {{ $CustomerName }}</h4>
                                        <small id="comment-error" class="help-blog"></small>
                                        <div class="m-b-20 b-r-15">
                                            <textarea class="b-r-15 form-control" 
                                            id="comment-content" placeholder="Nhập nội dung (*)"></textarea>
                                        </div>

                                        <button id="btn-comment" type="button"
                                            class="flex-c-m stext-101 cl0 size-125 bg3 bor2 hov-btn3 p-lr-5 trans-04">
                                            Gửi Bình Luận
                                        </button>
                                    </form>
                                <?php } else { ?>
                                    <button type="button" style="min-width: 70px; height: 30px; padding: 20px; "
                                        class="flex-c-m stext-101 cl0 size-125 bg3 bor2 hov-btn3 trans-04" data-toggle="modal"
                                        data-target="#myModal">Đăng Nhập Để Bình Luận</button>
                                <?php } ?>

                                    <h3 class="mtext-113 cl2 p-b-12 p-t-20">
                                        Các Bình Luận (10)
                                    </h3>

                                    <div id="comment">
                                        @include('list-comment', ['comments'=>$blog->comments])
                                        {{-- --------- --}}
                                    </div>
                            </div>
                            
                            <div class="col-md-4 col-lg-3 p-b-80">
                                <div class="side-menu">

                                    <div class="p-t-10">
                                        <h4 class="mtext-112 cl2 p-b-33">
                                            Danh mục
                                        </h4>

                                        <ul>
                                            <li class="bor18">
                                                <a href="http://127.0.0.1:8000/danh-muc/4-quan-nam.html"
                                                    class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                                                    Quần Nam
                                                </a>
                                            </li>

                                            <li class="bor18">
                                                <a href="http://127.0.0.1:8000/danh-muc/3-ao-nam.html"
                                                    class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                                                    Áo Nam
                                                </a>
                                            </li>

                                            <li class="bor18">
                                                <a href="http://127.0.0.1:8000/danh-muc/5-giay-nam.html"
                                                    class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                                                    Giày Nam
                                                </a>
                                            </li>

                                            <li class="bor18">
                                                <a href="http://127.0.0.1:8000/danh-muc/7-quan-nu.html"
                                                    class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                                                    Quần Nữ
                                                </a>
                                            </li>

                                            <li class="bor18">
                                                <a href="http://127.0.0.1:8000/danh-muc/6-ao-nu.html"
                                                    class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                                                    Áo Nữ
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- The Modal -->
    <div class="modal" style="margin-top: 10%" id="myModal">
        <div class="modal-dialog odal-sm">
            <div class="modal-content" style="border-radius: 25px">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Đăng Nhập Ngay</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div id="error">

                    </div>
                    <form action="/action_page.php">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input name="email" id="quick-email" type="email" class="form-control b-r-30"
                                id="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input name="password"id="quick-password" type="password" class="form-control b-r-30"
                                id="pwd" placeholder="Enter password">
                        </div>
                        <div class="checkbox">
                            <label class="fs-15 p-l-2"><input style="display: inline;" type="checkbox" name="remember">
                                Remember me</label>
                        </div>
                        <button id="quick-login" style="border-radius: 30px" type="submit"
                            class="btn btn-default btn-block b-r-15">Đăng Nhập</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- //thiếu js --}}
    <script>
        var _commentUrl = '{{ route("ajax.comment", $blog->id) }}';
        var _csrf = '{{ csrf_token() }}';
        $('#quick-login').click(function(ev) {
            ev.preventDefault();
            var _loginUrl = '{{ route('ajax.login') }}';
            var email = $('#quick-email').val();
            var password = $('#quick-password').val();

            $.ajax({
                url: _loginUrl,
                type: 'POST',
                data: {
                    email: email,
                    password: password,
                    _token: _csrf
                },

                success: function(res) {
                    if (res.error) {
                        let _html_error =
                            '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                        for (let error of res.error) {
                            _html_error += `
                        
                        <li>${error}</li>`;
                        }
                        _html_error += '</div>';

                        $('#error').html(_html_error);
                    } else {
                        alert('Bạn đã đăng nhập thành công!');
                        location.reload();
                    }
                }
            });
        })

    $('#btn-comment').click(function(ev){
        ev.preventDefault();
        let content = $('#comment-content').val();
        
        $.ajax({
                url: _commentUrl,
                type: 'POST',
                data: {
                    content: content,
                    _token: _csrf
                },

                success: function(res) {
                    if (res.error) {
                        $('#comment-error').html(res.error)
                          
                    } else {
                        $('#comment-error').html('');
                        $('#comment-content').val('');
                        $('#comment').html(res);
                    }
                }
            });
        
    });

    $(document).on('click','.btn-show-reply-form', function(ev){
        ev.preventDefault();
        var id = $(this).data('id');
        var comment_reply_id = '#comment-reply-'+id;
        var form_reply ='.form-reply-'+id;
        let contentReply = $(comment_reply_id).val();
        $('.formReply').slideUp();
        $(form_reply).slideDown();
    })
    // Lay tu ajax qua thi an nut tl se reload nen phai lay tu document len moi k reload

    //De quy lan 2 de lam nut tra loi
    $(document).on('click','.btn-send-comment-reply', function(ev){
        ev.preventDefault();
        var id = $(this).data('id');
        var comment_reply_id = '#content-reply-'+id;
        let contentReply = $(comment_reply_id).val();
        var form_reply ='.form-reply-'+id;
        
        $.ajax({
                url: _commentUrl,
                type: 'POST',
                data: {
                    content: contentReply,
                    reply_id: id, //tra loi bl nao
                    _token: _csrf
                },

                success: function(res) {
                    if (res.error) {
                        $('#comment-error').html(res.error)
                          
                    } else {
                        $('#comment-error').html('');
                        $('#comment-content').val('');
                        $('#comment').html(res);
                    }
                }
            });

    })

    </script>


@endsection
