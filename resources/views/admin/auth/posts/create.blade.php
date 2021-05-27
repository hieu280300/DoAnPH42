@extends('admin.layouts.master')
@section('title', 'Create Post')
    @push('css')
        <link rel="stylesheet" href="/css/categories/category-create.css">
    @endpush
@section('content')
    <h1>Create Post</h1>
    @include('errors.error')
    <br>
    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-5">
            <label for="">Post Name</label>
            <input type="text" name="name" placeholder="post name" value="{{ old('name') }}" class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group mb-5">
            <label for="">Post content</label>
            <textarea name="content" rows="10" class="form-control">{{ old('content') }}</textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
        <br>
        <div class="form-group mb-5" class="form-control">
            <label for="">Category Name</label>
            <select name="category_id" class="form-control">
                <option value=""></option>
                @if (!empty($categories))
                    @foreach ($categories as $categoryId => $categoryName)
                        <option value="{{ $categoryId }}" {{ old('category_id') == $categoryId ? 'selected' : ' ' }}>
                            {{ $categoryName }}</option>
                    @endforeach
                @endif
            </select>
            @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5">
            <label for="">Post Thumbnail</label>
            <input type="file" name="thumbnail" placeholder="post thumbnail" class="form-control">
            @error('thumbnail')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">List Post</a>
            <button class="btn btn-primary" type="submit">create</button>
        </div>
    </form>
@endsection
