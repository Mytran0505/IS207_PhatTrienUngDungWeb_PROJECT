<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>
    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                Giỏ Hàng Của Bạn
            </span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>
        @if (count($products) != 0)
        <div class="header-cart-content flex-w js-pscroll">
            <!-- @php $sumPriceCart = 0; @endphp -->
            <ul class="header-cart-wrapitem w-full">
                
                    <!-- @foreach($products as $key => $product)
                        @php 
                            $price = \App\Helpers\Helper::price($product->original_price, $product->price_sale); 
                            $sumPriceCart += $product->price_sale != 0 ? $product->price_sale : $product->original_price;
                        @endphp -->
                        <!-- Kiem tra gia giam != 0 thi lay gia giam con = 0 thi lay gia goc -->
                        <!-- Kiem tra gia ban != 0 thi lay gia ban con = 0 thi lay gia mua -->
                        <li class="header-cart-item flex-w flex-t m-b-20">
                            <a href="/delete/{{$product->id}}">
                            <div class="header-cart-item-img p-t-2">
                                    <img src="{{$product->image}}" alt="IMG">
                            </div>
                            </a>
                                
                            <div class="header-cart-item-txt">
                                <a href="#" class="limit-text-2 header-cart-item-name m-b-10 hov-cl1 trans-04 ">
                                    {{$product->name}}
                                </a>

                                <span class="header-cart-item-info">
                                    {{$price}}
                                    <input class="quantity-cart" value="x3" disabled> 
                                </span>
                            </div></li>
                    <!-- @endforeach -->
            </ul>
        </div>
        @else
        <img style="display: block; width: auto; height: 150px; margin-left: auto; margin-right:auto;" src="template/images/empty-cart.png">
        <p>-Giỏ hàng chưa có sản phẩm-</p>
        @endif
        <div class="w-full">
                
                <div class="header-cart-buttons flex-w w-full">
                    <a href="/carts" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                        Xem giỏ hàng
                    </a>
                    <a href="/carts" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-l-2 m-b-10">
                        Thanh Toán
                    </a>

                </div>
            </div>
    </div>
</div>

