@extends('admin.layouts.master')
<!-- //import file css -->
@push('css')
    <link rel="stylesheet" href="/css/posts/post-list.css">
@endpush
@section('title', 'List Post')
@section('content')
@include('admin.auth.posts.search')
<p><a href="{{ route('admin.product.create') }}">Create</a></p>
        
        {{-- show message --}}
        @if (Session::has('success'))
            <p class="text-success">{{ Session::get('success') }}</p>
        @endif

        {{-- show error message --}}
        @if (Session::has('error'))
            <p class="text-danger">{{ Session::get('error') }}</p>
        @endif  

    <br>
    <table id="post"  class="table table-bordered table-hover table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price </th>
                <th scope="col">Category Name</th>
                <th scope="col">Thumbnail</th>
                <th scope="col" colspan="3">Action</th>
            </tr>
        </thead class="thead-light">
        <tbody>
            @if (!empty($products))
                @foreach ($products as $key => $product)
                    <tr>
                        <td scope="col">{{ $key+1 }}</td>
                        <td scope="col">{{ $product->name }}</td>
                        <td scope="col">{{ $product->latestPrice()->price}} VNĐ</td>
                        <td scope="col">{{ $product->category->name }}</td>
                        <td>
                            <img src="{{ asset($product->thumbnail) }}" alt="{{ $product->name }}" class="img-flid" style="width:100px">
                        </td>
                        {{-- <td scope="col">{{$posts->}}</td> --}}

                        <td>
                            <a href="{{ route('admin.product.show', $product->id) }}"><input type="submit" name="submit" value="Detail" class="btn btn-danger"></a></td>
                        <td scope="col"><a href="{{ route('admin.product.edit', $product->id) }}"><input type="submit" name="submit" value="Edit" class="btn btn-danger"></a> </td>
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
