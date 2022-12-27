<header>
    @php $menusHtml = \App\Helpers\Helper::menus($menus); @endphp
    <!-- Header desktop -->
    
    <div class="container-menu-desktop">
        <div class="wrap-menu-desktop b-shadow-head">
            <nav class="limiter-menu-desktop container">
                
                <!-- Logo desktop -->		
                <a href="/" class="logo">
                    <img src="/template/images/icons/image-logo-icon.png" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="category"><a href ="/">Trang chủ</a></li>
                        {!! $menusHtml !!}
                        <li>
                            <a href="contact.html">Liên hệ</a>
                        </li>
                    </ul>
                </div>	

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m p-t-15">
                    <form class= "navbar-form navbar-left form-search" role="search">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 form-group">
                            {{-- <i class="zmdi zmdi-search search-css-btn input-search-ajax search-ajax-result"></i> --}}
                            <input class="search-css form-control input-search-ajax" type="text" placeholder="Tìm kiếm ...">
                            
                            <div class="search-ajax-result">

                            </div>

                            
                        </div>
                            
                        </div>
                    </form>

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                        {{-- <i class="zmdi zmdi-account-circle"></i> --}}
                        {{-- <i class="zmdi zmdi-sign-in logo-sc"></i>  --}}
                        <div class="dropdown">
                            <div class="nut_dropdown">
                                <a class="login_a" href="/login">
                                    <i class="zmdi zmdi-account-circle p-1" title="Đăng Nhập"></i>
                                   
                                </a>
                            </div>
                            <div class="noidung_dropdown">
                                <?php
                                $CustomerId= Session::get('customerId');
							    if($CustomerId) { ?>
                                    <a href="/profile/{{ $CustomerId }}">Tài khoản</a>
                                    <a href="{{URL::to('/my-orders')}}">Đơn hàng của tôi</a>
                                    <a href="/logout" >Đăng xuất</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php
					if($CustomerId) { ?>
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-20 p-r-11 ic-s mt-2">
                            <a href="/logout">
                                <i class="zmdi zmdi-sign-in logo-sc"></i>
                            </a>
                        </div>
			        <?php } ?>
                </div>
            </nav>
        </div>	
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->		
        <div class="logo-mobile">
            <a href="/"><img src="/template/images/icons/image-logo-icon.png" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="main-menu-m">
            <li class="category"><a href ="/">Trang chủ</a></li>
            {!! $menusHtml !!}
            <li class="category">
                <a href="contact.html">Liên hệ</a>
            </li>
        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="/template/images/icons/icon-close2.png" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div>

    
</header>


