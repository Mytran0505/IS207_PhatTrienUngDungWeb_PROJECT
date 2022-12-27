@extends('admin.main')

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Trạng thái đơn hàng</label>
                        <select class="form-control" name="status">
                            <option value="Đã nhận đơn" {{ $order->status == "Đã nhận đơn" ? 'selected' : '' }}>Đã nhận đơn</option>
                            <option value="Chưa nhận đơn" {{ $order->status == "Chưa nhận đơn" ? 'selected' : '' }}>Chưa nhận đơn</option>
                            <option value="Đơn lỗi" {{ $order->status == "Đơn lỗi" ? 'selected' : '' }}>Đơn lỗi</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật đơn hàng</button>
        </div>
        @csrf
    </form>
@endsection