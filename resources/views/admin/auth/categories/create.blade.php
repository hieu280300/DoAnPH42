@extends('admin.layouts.master')
@section('title', 'Create category')
    @push('css')
        <link rel="stylesheet" href="/css/categories/category-create.css">
    @endpush
@section('content')

    <h1>Create Category</h1>
    <br>
    <form action="{{ route('admin.category.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Category Name</label>
            <input type="text" name="category_name" placeholder="category name">
        </div>
        <br>
        <div class="form-group">

            <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">List category</a>
            <button class="btn btn-primary" type="submit">create</button>
        </div>
    </form>
@endsection
