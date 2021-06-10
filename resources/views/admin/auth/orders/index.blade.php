@extends('admin.layouts.master')

@section('title', 'List Category')

    {{-- import file css (private) --}}
    @push('css')
        <link rel="stylesheet" href="/css/categories/category-list.css">
    @endpush
   
@section('content')
@include('admin.auth.orders.search')
    <table id="product-list" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Fullname</th>
                <th>Total Quantity</th>
                <th>Total Money</th>
                <th>Status</th>
                <th>Date order</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($orders))
                @foreach ($orders as $key => $order)
                    @php
                        $totalQuantity = 0;
                        $totalMoney = 0;
                        if (!empty($order->orderDetails)) {
                            foreach ($order->orderDetails as $od) {
                                // get quantity
                                $totalQuantity += $od->quantity;
                                // get price
                                $productPrice = $od->price_id;
                                $totalMoney += $od->quantity * $productPrice;
                            }
                        }
                    @endphp
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>
                            {{ number_format($totalQuantity) }}
                        </td>
                        <td>
                            {{ number_format($totalMoney) }}
                        </td>
                        <td>
                            @if (empty($order->status) || $order->status == \App\Models\Order::STATUS[0])
                                <div class="alert alert-primary" role="alert">chưa thanh toán</div>
                            @elseif ($order->status == \App\Models\Order::STATUS[1])
                                <div class="alert alert-secondary" role="alert">đã thanh toán online</div>
                            @elseif ($order->status == \App\Models\Order::STATUS[2])
                                <div class="alert alert-primary" role="alert">shipper đang đi giao hàng</div>
                            @elseif ($order->status == \App\Models\Order::STATUS[3])
                                <div class="alert alert-danger" role="alert">cancel đơn hàng</div>
                            @else
                                <div class="alert alert-success" role="alert">hoàn thành</div>
                            @endif
                        </td>
                        <td>{{date_format(date_create($order->created_at), 'Y-m-d')}}</td>
                        <td><a href="{{ route('admin.order.show', $order->id) }}" class="btn btn-secondary">Order
                                Detail</a></td>
                        <td><a href="{{ route('admin.order.edit', $order->id) }}" class="btn btn-info">Update Status</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.order.destroy', $order->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" onclick="return confirm('Are you sure DELETE Order?')"
                                    class="btn btn-danger" />
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    {{-- {{ $orders->appends(request()->input())->links() }} --}}
@endsection
