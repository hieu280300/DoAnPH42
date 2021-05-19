@extends('admin.layouts.master')
@section('title', 'detail category')
    @push('css')
        <link rel="stylesheet" href="/css/categories/category-create.css">
    @endpush
@section('content')
    <h1>Detail Post</h1>
    <form action="">
        <table id="post" class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Post Name</th>
                    <th scope="col">Post Content</th>
                    <th scope="col">Category Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td cope="col">{{$post->name}}</td>
                    <td scope="col">{{ $post->content}}</td>
                    <td scope="col">{{ $post->category->name}}</td>
                </tr>
            </tbody>
        </table>
    </form>
    <div class="form-group">
        <a href="{{ route('admin.post.index') }}" class="btn btn-secondary">List Post</a>
    </div>
