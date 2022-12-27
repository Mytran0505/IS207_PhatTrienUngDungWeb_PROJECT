@extends('admin.main')

@section('content')
    <table class="table" id="myTable" class="m-t-4">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tình trạng đơn hàng</th>
            <th>Tổng tiền</th>
            <th>Ngày Đặt Hàng</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            @foreach($orders as $key => $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->status}}</td>
                <td>{{ number_format($order->total_money, 0, '', '.') }}</td>
                <td>{{ $order->created_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/orders/view/{{ $order->id }}">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a class="btn btn-primary btn-sm" href="/admin/orders/edit/{{ $order->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- {!! $orders->links() !!} --}}
@endsection