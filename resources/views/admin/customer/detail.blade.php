@extends('admin.main')

@section('content')
    <div class="customer mt-3">
        <ul>
            <li>Tên khách hàng: <strong>{{ $customer->name }}</strong></li>
            <li>Email: <strong>{{ $customer->email }}</strong></li>
            <li>Số điện thoại: <strong>{{ $customer->phone }}</strong></li>
        </ul>
    </div>

    <div class="carts">
        <span><strong>Danh sách đơn hàng đã mua</strong></span>
        <table class="table">
            <tbody>
            <tr class="table_head">
                <th class="column-1">ID</th>
                <th class="column-2">Tổng tiền</th>
                <th class="column-3">Ngày đặt hàng</th>
            </tr>

            @foreach($orders as $key => $order)
            <tr>
                <td class="column-1">{{ $order->id }}</td>
                <td class="column-5">{{ number_format($order->total_money, 0, '', '.') }}</td>
                <td class="column-4">{{ $order->created_at }}</td>
            </tr>
            @endforeach 
            </tbody>
        </table>
    </div>
@endsection