@extends('frontend.layouts.master')
@section('title','Login')

@push('css')
@endpush
@section('content')

		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
					<div class=" main-content-area">
						<div class="wrap-login-item ">						
							<div class="login-form form-item form-stl">
								{{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}
								{{-- <x-jet-validation-errors class="mb-4"/> --}}
								<form name="frm-login" method="POST" action="{{route('register')}}">
									@csrf
									<fieldset class="wrap-title">
										<h3 class="form-title">Create account</h3>		
                                        <h4 class="form-title">Personal information</h4>								
									</fieldset>
                                    <fieldset class="wrap-input">
										<label for="frm-login-uname">Name:</label>
										<input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Your name" :value="old('name')" required autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                 
									</fieldset>
									<fieldset class="wrap-input">
										<label for="frm-login-uname">Email Address:</label>
										<input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Type your email address" :value="old('email')" required autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
									</fieldset>
									<fieldset class="wrap-input">
										<label for="frm-login-pass">Password *:</label>
										<input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" >
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </fieldset>
									<fieldset class="wrap-input">
										<label for="frm-login-pass">Password confirmation *:</label>
										<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </fieldset>
									<input type="submit" class="btn btn-submit" value="Register" name="register">	
									</div>
								</form>
							</div>												
						</div>
					</div><!--end main products area-->		
				</div>
			</div><!--end row-->

		</div><!--end container-->

@endsection