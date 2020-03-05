<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V18</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<!-- <link rel="icon" type="image/png" href="images/icons/favicon.ico"/> -->
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css"> -->
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fontsLogin/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fontsLogin/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login/animate/animate.css') }}">
<!--===============================================================================================-->	
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login/select2/select2.min.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('css/login/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css"> -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/util.css') }}" rel="stylesheet" type="text/css" />
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
            <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                 @csrf

					<span class="login100-form-title p-b-43">
						Ingresa al portal Ceccam
					</span>
                    
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red; font-size: 12px;">Los datos no coinciden con los datos registrados</strong>
                        </span>
                     @enderror
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input id="email" type="email" class="input100" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
                    </div>
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
                
					<div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                                    {{ __('Login') }}
                    </button>
					</div>
					
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							or sign up using
						</span>
					</div>

					
				</form>

				<div class="login100-more" style="background-image: url('/images/bg-01.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	
	
<!--===============================================================================================-->
    <script src="{{ asset('js/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('js/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
    <!-- <script src="{{ asset('js/vendor/bootstrap/js/popper.js') }}"></script> -->
	<!-- <script src="vendor/bootstrap/js/bootstrap.min.js"></script> -->
<!--===============================================================================================-->
    <script src="{{ asset('js/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('js/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('js/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('js/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
    <!-- <script src="{{ asset('js/main.js') }}"></script> -->

</body>
</html>


                    <!-- <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

    
                    </form> -->
               