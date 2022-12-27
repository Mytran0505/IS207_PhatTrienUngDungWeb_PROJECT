@extends('admin.main')

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="coupon">Tên chương trình khuyến mãi</label>
                <input type="text" name="name" value="{{ $coupon->name }}" class="form-control"  placeholder="Nhập Tên chương trình khuyến mãi">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Loại khuyến mãi</label>
                        <select class="form-control" name="type">
                            <option value="Giảm theo tiền" {{ $coupon->type === 'Giảm theo tiền' ? 'selected' : '' }}>Giảm theo tiền</option>
                            <option value="Giảm theo %" {{ $coupon->type === 'Giảm theo %' ? 'selected' : '' }}>Giảm theo %</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="coupon">Số tiền</label>
                        <input type="number" name="number" value="{{ $coupon->number }}" class="form-control"  placeholder="Số % hoặc tiền khuyến mãi">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select class="form-control" name="menu_id">
                            <option value="">Chọn danh mục</option>
                            @foreach($menus as $menu)
                                <option value="{{ $menu->id }}" {{ $coupon->menu_id == $menu->id ? 'selected' : '' }}>{{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Sản phẩm</label>
                        <input class="form-control" name="product_id" list = "sanpham" placeholder="Chọn sản phẩm" value="{{ $coupon->product_id ? $coupon->product_id : '' }}">
                        <datalist id="sanpham">
                            @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </datalist>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="coupon">Ngày bắt đầu</label>
                        <input type="text" name="start_date" value="{{ $coupon->start_date }}" class="form-control" id="start_coupon">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="coupon">Ngày kết thúc</label>
                        <input type="text" name="end_date" value="{{ $coupon->end_date }}" class="form-control" id="end_coupon">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kích Hoạt</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="1" type="radio" id="active" name="active" 
                            {{ $coupon->active == 1 ? 'checked' : '' }}>
                            <label for="active" class="custom-control-label">Có</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                            {{ $coupon->active == 0 ? 'checked' : '' }} >
                            <label for="no_active" class="custom-control-label">Không</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tình trạng</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="Còn hạn" type="radio" id="status" name="status" 
                            {{ $coupon->status === 'Còn hạn' ? 'checked' : '' }}>
                            <label for="status" class="custom-control-label">Còn hạn</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="Đã hết hạn" type="radio" id="no_status" name="status"
                            {{ $coupon->status === 'Đã hết hạn' ? 'checked' : '' }}>
                            <label for="no_status" class="custom-control-label">Hết hạn</label>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật Khuyến Mãi</button>
        </div>
        @csrf
    </form>
@endsection