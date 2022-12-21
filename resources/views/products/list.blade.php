<div class="row isotope-grid">
    @foreach ($products as $key => $product)
    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
        <!-- Block2 -->
        <div class="block2">
            <div class="block2-pic hov-img0 b-r-20 b-shadow">
                <a href="/san-pham/{{ $product->id }}-{{ \Str::slug($product->name),'-'}}.html">
                    <img src="{{ $product->image }}/item1.jpeg" alt="{{ $product->name }}">
                    <a href="#" class="bg-quick hov-bg-quick block2-btn flex-c-m stext-103 cl2 size-102 bor2 p-lr-15 trans-04 js-show-modal1">
                        Xem nhanh
                    </a>
                </a>
            </div>

            <div class="block2-txt flex-w flex-t p-t-14">
                <div class="block2-txt-child3 flex-col-l ">
                    <a href="/san-pham/{{ $product->id }}-{{ \Str::slug($product->name),'-'}}.html" 
                        class="stext-104 cl14 hov-cl1 trans-04 js-name-b2 p-b-6 limit-text-2">
                        {{ $product->name }}
                    </a>

                    <span class="stext-105 cl13">
                        {!! \App\Helpers\Helper::price($product->original_price,$product->price_sale)!!}₫
                    </span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

