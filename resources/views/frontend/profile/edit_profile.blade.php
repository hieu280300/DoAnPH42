@extends('frontend.layouts.master')
@section('title','Cart')
@push('css')
@endpush
@section('content')
<style>
    body{margin-top:20px;}		
    </style>
    
<div class="container bootstrap snippets bootdey">
  
    <h1 class="text-primary"><span class="glyphicon glyphicon-user"></span>Edit Profile</h1>
      <hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
          <h6>Upload a different photo...</h6>
          
          <input type="file" class="form-control">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          This is an <strong>.alert</strong>. Use this to show important messages to the user.
        </div>
        <h3>Personal info</h3>
        <form class="form-horizontal" role="form" action="{{ route('update_profile',$info_users->id) }}" method="post">
        @csrf
          <div class="form-group">
            <label class="col-lg-3 control-label"> Name:</label>
            <div class="col-lg-8">
              <input class="form-control" name="name" type="text" value="{{ Auth::user()->name }}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Phone:</label>
            <div class="col-lg-8">
              <input class="form-control" name="phone" type="text" value="{{ Auth::user()->phone }}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Address:</label>
            <div class="col-lg-8">
              <input class="form-control" name="address" type="text" value="{{ Auth::user()->address }}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" name="email" type="text" value="{{ Auth::user()->email }}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Password:</label>
            <div class="col-lg-8">
                <input class="form-control" name="password" type="text" value="{{ Auth::user()->password }}">
              </div>
          </div>
          <input type="submit" class="btn btn-primary" value="submit">
        </form>
      </div>
  </div>
</div>
<hr>
@endsection