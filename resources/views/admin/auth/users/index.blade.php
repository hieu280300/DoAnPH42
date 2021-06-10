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
    <p><a href="{{ route('admin.user.create') }}" class="btn btn-secondary" >Create</a></p>

    {{-- display list category table --}}
    <table id="user-list" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>User Name</th>
                <th>User Email</th>
               
                <th>Status</th>
                <th>Role</th>
                <th>Create_at</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($users))
                @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $user-> name }}</td>
                        <td>{{ $user-> email }}</td>
                      
                        <td> @if (empty($user->status)|| $user->status  == \App\Models\Admin::STATUS[0])
                            <div class="alert alert-secondary" role="alert">De-active</div>
                              @elseif ($user->status == \App\Models\Admin::STATUS[1])
                            <div class="alert alert-primary" role="alert">Active </div>
                          @endif</td>
                        <td>{{ $user-> role->name }}</td>
                        <td>{{date_format(date_create($user-> created_at), 'Y-m-d')}}</td>
                        <td><a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-success">Edit</a></td>
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