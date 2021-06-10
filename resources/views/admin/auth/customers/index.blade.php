@extends('admin.layouts.master')
<!-- //import file css -->
@push('css')
    <link rel="stylesheet" href="/css/posts/post-list.css">
@endpush
@section('title', 'List User')
@section('content')
    {{-- form search --}}

    {{-- create category link --}}
    {{-- case 1 --}}

    
    {{-- case 2 --}}
    {{-- <p><a href="/category/create">Create</a></p> --}}

    {{-- show message --}}
  

    {{-- display list category table --}}
    <table id="user-list" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($users))
                @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $user-> name }}</td>
                        <td>{{ $user-> email }}</td>
                        <td>{{ $user-> phone }}</td>
                        <td>{{ $user-> address }}</td>
                        <td><a href="{{ route('admin.user.show', $user->id) }}"><input type="submit" name="submit" value="Detail" class="btn btn-info"></a></td>
                        <td><a href="{{ route('admin.user.edit', $user->id) }}"><input type="submit" name="submit" value="Edit" class="btn btn-success"></a></td>
                        <td>
                            <form action="{{ route('admin.user.destroy', $user->id) }}" method="post">
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
    {{$users->links()}}
@endsection