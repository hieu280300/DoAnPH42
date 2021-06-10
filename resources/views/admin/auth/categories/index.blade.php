@extends('admin.layouts.master')

@section('title', 'List Category')

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/css/categories/category-list.css">
@endpush

@section('content')
    {{-- form search --}}

    {{-- create category link --}}
    {{-- case 1 --}}
    <p><a href="{{ route('admin.category.create') }} " class="btn btn-secondary">Create</a></p>
    
    {{-- case 2 --}}
    {{-- <p><a href="/category/create">Create</a></p> --}}

    {{-- show message --}}
   

    {{-- display list category table --}}
    <table id="category-list" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Category Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($categories))
                @foreach ($categories as $key => $category)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td><a href="{{ route('admin.category.show', $category->id) }}"><input type="submit" name="submit" value="Detail" class="btn btn-info"></a></td>
                        <td><a href="{{ route('admin.category.edit', $category->id) }}"><input type="submit" name="submit" value="Edit" class="btn btn-success"></a></td>
                        <td>
                            <form action="{{ route('admin.category.destroy', $category->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" name="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{ $categories->links() }}
@endsection