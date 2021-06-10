@extends('admin.layouts.master')

@section('title', 'Create Post')

    {{-- import file css (private) --}}
    @push('css')
        <link rel="stylesheet" href="/css/posts/post-create.css">
    @endpush

@section('content')
<style type="text/css">
    .color_id
    {
        width: 500px;
    }
    </style>
    <h1>Create Product</h1>

    {{-- @include('errors.error') --}}

    <form action="{{ route('admin.product.update', request()->route('id')) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-5">
            <label for="">Product Name</label>
            <input type="text" name="name" placeholder="product name" value="{{ old('name', $product->name) }}"
                class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5">
            <label for="">Product Thumbnail</label>
            <img src="{{ asset($product->thumbnail) }}" alt="{{ $product->name }}" class="img-fluid" style="width:100px">
            <input type="file" name="thumbnail" placeholder="post thumbnail" class="form-control">
            @error('thumbnail')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5">
            <label for="">Product Content</label>
            <textarea name="content" rows="10" class="form-control">{{ old('content', $product->content) }}</textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5">
            <label for="">Category</label>
            <select name="category_id" class="form-control">

                <option value=""></option>
                @if (!empty($categories))
                    @foreach ($categories as $categoryId => $categoryName)
                        <option value="{{ $categoryId }}"
                            {{ old('category_id', $product->category_id) == $categoryId ? 'selected' : '' }}>
                            {{ $categoryName }}</option>
                    @endforeach
                @endif
            </select>
            @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5" class="form-control">
            <label for="">Size </label>
            <select  class="js-example-basic-multiple"  multiple="multiple" name="size_id[]" >
                @if (!empty($sizes))
                    @foreach ($sizes as $sizeId =>$sizeName)  
                        <option class="color_id" value="{{ $sizeId }}"
                        {{ old('size_id') == $sizeId ? 'selected' : ' ' }}>
                            {{ $sizeName}}</option>    
                    @endforeach
                @endif
           
            </select>
            @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5" class="form-control">
            <label for="">color</label>
            <select  class="js-example-basic-multiple"  multiple="multiple" name="color_id[]">
                @if (!empty($colors))
                @foreach ($colors as $colorId => $colorName)
                        <option  class="color_id" value="{{ $colorId }}" 
                        {{ old('color_id')  == $colorId ? 'selected' : ' ' }} > 
                            {{ $colorName }}</option>
                        
                    @endforeach
                @endif
            </select>
            @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">List Product</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection
