@extends('admin.layouts.master')
@section('title', 'detail Product')
    @push('css')
        <link rel="stylesheet" href="/css/categories/category-create.css">
    @endpush
@section('content')
    <h1>Detail Product</h1>
    <form action="">
        <table id="post" class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Content</th>
                    <th scope="col">Category Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td cope="col">{{$product->name}}</td>
                    <td scope="col">{{ $product->content}}</td>
                    <td scope="col">{{ $product->category->name}}</td>
                </tr>
            </tbody>
        </table>
    </form>
    <div class="form-group">
        <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">List Post</a>
    </div>
