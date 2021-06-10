@extends('admin.layouts.master')
<!-- //import file css -->
@push('css')
    <link rel="stylesheet" href="/css/posts/post-list.css">
@endpush
@section('title', 'Detail User')
@section('content')
    <h1>Detail User</h1>
    <form action="">
        <table id="post" class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">User Name</th>
                    <th scope="col">User Content</th>
                    <th scope="col">User password</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td cope="col">{{$user->name}}</td>
                    <td scope="col">{{ $user->email}}</td>
                    <td scope="col">{{ $user->password }}</td>
                </tr>
            </tbody>
        </table>
    </form>
    <div class="form-group">
        <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">List User</a>
    </div>
    @endsection
