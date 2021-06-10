@extends('admin.layouts.master')
<!-- //import file css -->
@push('css')
    <link rel="stylesheet" href="/css/posts/post-list.css">
@endpush
@section('title', 'Create User')
@section('content')
    <h1>Create User</h1>
    @include('errors.error')
    <br>
    <form action="{{ route('admin.user.store') }}" method="post">
        @csrf
        <div class="form-group mb-5">
            <label for="">User Name</label>
            <input type="text" name="name" placeholder="user name" value="{{ old('name') }}" class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group mb-5">
            <label for="">User email</label>
            <input type="text" name="email" placeholder="email" value="{{old('email')}}" class="form-control">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
        <br>
        <div class="form-group mb-5" class="form-control">
            <label for="">User password</label>
            <input type="text" name="password" placeholder="password" value="{{old('password')}}" class="form-control">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5" class="form-control">
            <label for="">Role name</label>
            <select name="role_id" class="form-control">
                <option value=""></option>
                @if (!empty($roles))
                    @foreach ($roles as $role)
                        <option  value="{{$role->id }}" {{ old('role_id') == $role->id ? 'selected' : ' ' }}>
                            {{ $role->name }}</option>
                    @endforeach
                @endif
            </select>
            @error('role_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">List User</a>
            <button class="btn btn-primary" type="submit">create</button>
        </div>
    </form>
@endsection
