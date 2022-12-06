@extends('main')

@section('content')
<div class="bg0 m-t-23 p-b-140 p-t-80">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">

                    <h1>{{ $title }}</h1>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filter
					</div>

					
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>

							<ul>
								<li class="p-b-6">
									<a href="{{ request() -> url() }}" class="filter-link stext-106 trans-04">
										Default
									</a>    
								</li>

								<li class="p-b-6">
									<a href="{{ request() -> fullUrlWithQuery(['price_sale' => 'asc'])}}" class="filter-link stext-106 trans-04">
										Price: Low to High
									</a>
								</li>

								<li class="p-b-6">
									<a href="{{ request() -> fullUrlWithQuery(['price_sale' => 'desc'])}}" class="filter-link stext-106 trans-04">
										Price: High to Low
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Price
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										All
									</a>
								</li>
							
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$0.00 - $200.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$200.00+
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			@include('products.list')
		</div>
	</div>
@endsection