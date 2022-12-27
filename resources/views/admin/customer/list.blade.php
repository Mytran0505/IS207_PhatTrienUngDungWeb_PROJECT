@extends('admin.main')

@section('content')
    <table class="table" id="myTable" class="m-t-4">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên khách hàng</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Địa chỉ</th>
            <th>Chi tiêu</th>
            <th>Ngày đăng ký</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            @foreach($customers as $key => $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name}}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ number_format($customer->spend, 0, '', '.') }}</td>
                <td>{{ $customer->created_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/customers/view/{{ $customer->id }}">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- {!! $customers->links() !!} --}}
@endsection