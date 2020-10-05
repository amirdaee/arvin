@extends('layouts.auth')

@section('content')
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
				@csrf
					<span class="login100-form-title">
						ورود به پنل کاربری
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input id="email" type="email" class="input100  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="ایمیل">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="کلمه عبور"
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
                    @error('email')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                    @error('password')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror

					<div class="wrap-input100 validate-input">
						<div class="col-md-12 offset-md-12">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
								<label class="form-check-label" for="remember">
									ورود مجدد بدون نیاز به پسورد
								</label>
							</div>
						</div>
                    </div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							ورود
						</button>
					</div>

{{--					<div class="text-center p-t-12">--}}
{{--						<a class="txt2" href="{{ route('password.request') }}">--}}
{{--							کلمه عبور / پسورد را فراموش کرده اید؟--}}
{{--						</a>--}}
{{--					</div>--}}

{{--					<div class="text-center p-t-136">--}}
{{--						<a class="txt2" href="{{ route('register') }}">--}}
{{--							ساخت حساب کاربری--}}
{{--							<i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>--}}
{{--						</a>--}}
{{--					</div>--}}
				</form>
			</div>
		</div>
	</div>

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

	<script src="js/main.js"></script>
@endsection
