@extends('admin.main')

@section('content')
    <div class="customer mt-3">
        <ul>
            @foreach($customer as $key => $customer)
            <li>Tên khách hàng: <strong>{{ $customer->name }}</strong></li>
            <li>Số điện thoại: <strong>{{ $customer->phone }}</strong></li>
            <li>Địa chỉ: <strong>{{ $customer->address }}</strong></li>
            <li>Email: <strong>{{ $customer->email }}</strong></li>
            @endforeach
        </ul>
    </div>

    <div class="carts">
        @php $total = 0; @endphp
        <table class="table">
            <tbody>
            <tr class="table_head">
                <th class="column-1">Ảnh</th>
                <th class="column-2">Tên sản phẩm</th>
                <th class="column-3">Giá</th>
                <th class="column-4">Số lượng</th>
                <th class="column-5">Thành tiền</th>
            </tr>

            @foreach($cthds as $key => $cthd)
                @php
                $total_money = $cthd->amount * $cthd->unit_price;
                $total += $total_money;
                @endphp
            <tr>
                <td class="column-1">
                    <div class="how-itemcart1">
                        <img src="{{ $cthd->product->image }}/item1.jpeg" alt="IMG" style="width: 100px">
                    </div>
                </td>
                <td class="column-2">{{ $cthd->product->name }}</td>
                <td class="column-3">{{ number_format($cthd->unit_price, 0, '', '.') }}</td>
                <td class="column-4">{{ $cthd->amount }}</td>
                <td class="column-5">{{ number_format($total_money, 0, '', '.') }}</td>
            </tr>
            @endforeach 
                <tr>
                    <td colspan="4" class="text-right">Tổng Tiền:</td>
                    <td>{{ number_format($total, 0, '', '.') }}</td>
                </tr>
            </tbody>
        </table>
        <a class="btn btn-primary" target="_blank" href="/admin/print-order/{{ $order->id }}">
            <i class="fas fa-print"></i>
            <span>In đơn hàng</span> 
        </a>
    </div>
@endsection