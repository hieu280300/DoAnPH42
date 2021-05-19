
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon"  type="image/png" href="/images/admin/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/plugins/admin/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/plugins/admin/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/plugins/admin/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/plugins/admin/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/css/admin/util.css">
	<link rel="stylesheet" type="text/css" href="/css/admin/main.css">
<!--===============================================================================================-->
</head>
<body>
    <div class="login-form">
  
	 <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="/images/admin/img-01.png" alt="IMG">
				</div>
                <form class="login100-form validate-form" action="{{ route('admin.login.handle') }}" method="post">      
			
                    {!! csrf_field() !!}	
					<span class="login100-form-title">
						LOGIN ADMIN
					</span>
                    @if(\Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ \Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif
                    {{ \Session::forget('success') }}
                    @if(\Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ \Session::get('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif       
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
                        @if ($errors->has('email'))
                        <span class="help-block font-red-mint">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
                        @if ($errors->has('password'))
                        <span class="help-block font-red-mint">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
				
                        <button type="submit" class="login100-form-btn">Log in</button>
                        @if(\Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ \Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        @endif
                        {{ \Session::forget('success') }}
                        @if(\Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ \Session::get('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        @endif       
					</div>
                 
					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="/plugins/admin/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/plugins/admin/vendor/bootstrap/js/popper.js"></script>
	<script src="/plugins/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/plugins/admin/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/plugins/admin/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="/js/admin/main.js"></script>

</body>
</html>