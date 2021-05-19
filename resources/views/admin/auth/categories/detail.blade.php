@extends('admin.layouts.master')
@section('title', 'detail category')
    @push('css')
        <link rel="stylesheet" href="/css/categories/category-create.css">
    @endpush
@section('content')
    <h1>Detail Category</h1>
    <form action="">
        <table id="category" class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Category Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="col">{{ $category->id }}</td>
                    <td scope="col">{{ $category->name }}</td>
                </tr>
            </tbody>
        </table>
    </form>
    <div class="form-group">
        <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">List Category</a>
    </div>
