@extends('admin.main')

@section('content')
    <table class="table" id="myTable" class="m-t-4">
        <thead>
        <tr>
            <th style="width: 20px">ID</th>
            <th>Tên chương trình khuyến mãi</th>
            <th>Loại khuyến mãi</th>
            <th>Số tiền</th>
            <th>Danh mục</th>
            <th>Kích hoạt</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Tình trạng</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            @foreach($coupons as $key => $coupon)
            <tr>
                <td>{{ $coupon->id }}</td>
                <td>{{ $coupon->name }}</td>
                <td>{{ $coupon->type }}</td>
                <td>{{ number_format($coupon->number, 0, '', '.') }}</td>
                <td>{{ $coupon->menu->name }}</td>
                <td>{!! \App\Helpers\Helper::activeDate($coupon->active, $coupon->end_date, $today) !!}</td>
                <td>{{ $coupon->start_date }}</td>
                <td>{{ $coupon->end_date }}</td>
                <td>
                    @if($coupon->end_date > $today)
                        <span style="color:green">Còn hạn</span>
                    @else
                        <span style="color:red">Đã hết hạn</span>
                    @endif   
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/coupons/edit/{{ $coupon->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $coupon->id }}, '/admin/coupons/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- {!! $products->links() !!} --}}
@endsection