@extends('admin.layouts.master')

@section('title', 'List Category')

    {{-- import file css (private) --}}
    @push('css')
        <link rel="stylesheet" href="/css/categories/category-list.css">
    @endpush

@section('content')
{{-- @if (!empty($order->orderDetails)) --}}
    <div class="order-detail">
        <table class="table table-bordered table-striped">
            <thead class="bg-info">
                <tr>
                    <th>#</th>
                    <th>Product name</th>
                    <th>Thumbnail</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Money</th>
                    <th>Date order</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalMoney = 0;
                    $totalQuantity = 0;
                @endphp
                @foreach ($order_details as $key => $orderDetail)
                    @php
                     
                        $money = $orderDetail->quantity * $orderDetail->price_id;
                        $totalMoney += $money;
                   
                        $quantity = $orderDetail->quantity;
                        $totalQuantity += $quantity;
                        $price = $orderDetail->price_id;
                        $size = $orderDetail->size_id;
                        $color = $orderDetail->color_id;
                        $thumbnail = $orderDetail->thumbnail;
                        $product_name=$orderDetail->product_name;
                        $date_order=$orderDetail->date_order;
                    @endphp
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{$product_name}}</td>
                        <td><img src="{{ $thumbnail }}" alt="{{ $product_name }}" class="img-fluid img-thumbnail" style="width:100px"></td>
                        <td>{{ number_format($quantity) }}</td>
                        <td>{{ number_format($price) }}</td>
                        <td>{{$size}}</td>
                        <td>{{$color}}</td>
                        <td>{{ number_format($money) }}</td>
                        <td>{{date_format(date_create($date_order), 'Y-m-d')}}</td>
                    </tr>
                @endforeach
                <br>
        
                <tfoot class="bg-secondary">
                    <tr>
                        <td colspan="2" class="text-right">Total Quantity</td>
                        <td colspan="2"  class="text-bold">{{ number_format($totalQuantity) }}</td>
                        <td colspan="2" class="text-right">Total Money</td>
                        <td colspan="3" class="text-bold">{{ number_format($totalMoney) }}</td>
                        
                    </tr>
                </tfoot>
               
            </tbody>
        </table>
        <div class="mb-2">
            <a href="{{ route('admin.order.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>

 
@endsection
