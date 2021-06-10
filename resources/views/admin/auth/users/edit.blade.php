@extends('admin.layouts.master')
<!-- //import file css -->
@push('css')
    <link rel="stylesheet" href="/css/posts/post-list.css">
@endpush
@section('title', 'Edit User')
@section('content')
    <h1>Edit User</h1>
    @include('errors.error')
    <br>
    <form action="{{ route('admin.user.update',$user->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group mb-5">
            <label for="">User Name</label>
           <p>{{$user->name}}</p>
           
        </div>
        <br>
        <div class="form-group mb-5">
            <label for="">User email</label>
            <p>{{$user->email}}</p>
            

        </div>
        <br>
        <div class="form-group mb-5" class="form-control">
            <label for="">User password</label>
            <input type="text" name="password" placeholder="password" value="{{$user->password}}{{old('password')}}" class="form-control">
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
                        <option  value="{{$role->id }}" {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>
                            {{ $role->name }}</option>
                    @endforeach
                @endif
            </select>
            @error('role_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-2">
            <label for="">Status</label>
            <ul>
                <li>
                    <input type="radio" name="status" id="order-status-0" value="{{ \App\Models\Admin::STATUS[0] }}" {{ $user->status == \App\Models\Admin::STATUS[0] ? 'checked' : '' }}>
                    <label for="order-status-0">De-active </label>
                </li>
                <li>
                    <input type="radio" name="status" id="order-status-1" value="{{ \App\Models\Admin::STATUS[1] }}" {{ $user->status == \App\Models\Admin::STATUS[1] ? 'checked' : '' }}>
                    <label for="order-status-1">Active</label>
                </li>
            </ul>
        </div>

        <div class="form-group">
            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">List User</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

    </form>
@endsection
