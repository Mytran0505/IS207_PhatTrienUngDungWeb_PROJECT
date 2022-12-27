<div class="row isotope-grid">
    @foreach ($products as $key => $product)
    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
        <!-- Block2 -->
        <div class="block2">
            <div class="block2-pic hov-img0 b-r-20 b-shadow">
                <a href="/san-pham/{{ $product->id }}-{{ \Str::slug($product->name),'-'}}.html">
                    <img src="{{ $product->image }}/item1.jpeg" alt="{{ $product->name }}">
                    <button href="#" class="bg-quick hov-bg-quick block2-btn flex-c-m stext-103 cl2 size-102 bor2 p-lr-15 trans-04 js-show-modal1"
                    data-id_product = "{{ $product->id }}">
                        Xem nhanh
                    </button>
                    {{ csrf_field() }}
                </a>
            </div>

            <div class="block2-txt flex-w flex-t p-t-14">
                <div class="block2-txt-child3 flex-col-l ">
                    <a href="/san-pham/{{ $product->id }}-{{ \Str::slug($product->name),'-'}}.html" 
                        class="cl14 hov-cl1 trans-04 js-name-b2 p-b-4 limit-text-2">
                        {{ $product->name }}
                    </a>
                    <?php if(count($coupons) > 0) { ?>
                        @php
                            $price = \App\Helpers\Helper::price($product->original_price, $product->price_sale);
                            foreach($coupons as $key => $coupon){
                                if($coupon->menu_id){
                                    if($product->menu_id == $coupon->menu_id){
                                        $price = number_format($product->price_sale - ($product->price_sale * ($coupon->number/100)));
                                    }
                                }
                                else{
                                    if($product->id == $coupon->product_id){
                                        $price = number_format($product->price_sale - ($coupon->product->price_sale * ($coupon->number/100)));
                                    }
                                }
                            }
                        @endphp
                        <div class="product-price p-b-30 priceList">
                            <span style="color:green;">{{$price}}₫</span>
                            @foreach ($coupons as $key => $coupon)
                                @if($coupon->menu_id)
                                    @if ($product->menu_id == $coupon->menu_id)
                                        <span class="old">{{number_format($product->price_sale).' '.'₫'}}</span>
                                    @endif
                                @endif
                                @if ($coupon->product_id)
                                    @if ($product->id == $coupon->product_id)
                                        <span class="old">{{number_format($product->price_sale).' '.'₫'}}</span>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                        <?php } 
                    else {?>
                        <span class="stext-sub-105 cl13">
                            {!! \App\Helpers\Helper::price($product->original_price,$product->price_sale)!!}₫
                        </span>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

