@extends('admin.layouts.master')
<!-- //import file css -->
@push('css')
    <link rel="stylesheet" href="/css/posts/post-list.css">
@endpush
@section('title', 'List Post')
@section('content')
@include('admin.auth.products.search')
<p><a href="{{ route('admin.product.create') }}" class="btn btn-secondary" >Create</a></p>
        
        {{-- show message --}}
    
    <br>
    <table id="post"  class="table table-bordered table-hover table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Thumbnail</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Quantity</th>
                <th scope="col">color</th>
                <th scope="col">Size</th>
                <th scope="col">Category Name</th>
                <th scope="col" colspan="3">Action</th>
            </tr>
        </thead class="thead-light">
        <tbody>
            @if (!empty($products))
                @foreach ($products as $key => $product)
                    <tr>
                        <td scope="col">{{ $key+1 }}</td>
                        <td scope="col">{{ $product->name }}</td>
                        <td>
                            <img src="{{ asset($product->thumbnail) }}" alt="{{ $product->name }}" class="img-flid" style="width:100px">
                        </td>
                        @if (!empty($product->latestPrice()->price))
                        <td scope="col">{{ number_format($product->latestPrice()->price)}} VNĐ</td>
                        @endif
                        <td scope="col">{{ $product->description }}</td>
                        <td scope="col">{{ $product->quantity }}</td>
                        <td scope="col">
                            @foreach($product->sizes as $size)
                            <p>{{$size->size}}</p>
                            @endforeach
                        </td>
                        <td scope="col">
                            @foreach($product->colors as $color)
                            <p>{{$color->color}}</p>
                            @endforeach
                        </td>
                        <td scope="col">{{ $product->category->name }}</td>
                       
                        {{-- <td scope="col">{{$posts->}}</td> --}}

                        <td>
                            <a href="{{ route('admin.product.show', $product->id) }}"><input type="submit" name="submit" value="Detail" class="btn btn-info"></a></td>
                        <td scope="col"><a href="{{ route('admin.product.edit', $product->id) }}"><input type="submit" name="submit" value="Edit" class="btn btn-success"></a> </td>
                        <td>
                            <form action="{{ route('admin.product.destroy', $product->id) }}" method="post">
                                @method('delete')
                                @csrf
                                <input type="submit" name="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
{{$products -> links()}}
@endsection
