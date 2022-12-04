@extends('main')

@section('content')
<div class="bg0 m-t-23 p-b-140 p-t-80">
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52 flex-l-m filter-tope-group m-tb-10">
            <!-- Gốc chỗ này là 2 thẻ div nhưng lỗi fix còn 1 thẻ div nhận class đó thì hết lỗi .. -->
                <h1>{{ $title }}</h1>
            </div>

            @include('products.list')
            
        <!-- Load more -->
        <!-- <div class="flex-c-m flex-w w-full p-t-45">
            <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                Load More
            </a>
        </div> -->
    </div>
</div>
@endsection