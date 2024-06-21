<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{ asset('assets/img/icon.ico') }}" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: { "families": ["Open+Sans:300,400,600,700"] },
			custom: { "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['{{ asset("assets/css/fonts.css") }}'] },
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/azzara.min.css') }}">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<style>
		/* body, html {
			height: 100%;
			margin: 0;
			display: flex;
			align-items: center;
			justify-content: center;
            width: 1;
		}
		.container {
			height: 100%;
		}
		.login-container {
			height: 100%;
			display: flex;
			align-items: center;
			justify-content: center;
		}
		.login-image {
			background-size: cover;
			background-position: center;
		}
		.login-form {
			display: flex;
			align-items: center;
			justify-content: center;
		} */
	</style>
</head>
{{-- <body>
	<div class="container login-container">
		<div class="row h-100 px-5 justify-content-center align-items-center">
			<div class="content container-fluid d-flex bg-white p-3 rounded">
				<div class="col-md-7 login-image d-none d-md-block bg-secondary rounded">
					<img src="{{ asset('/   foto/aldy-gamteng.jpg') }}" alt="Login Image" class="img-fluid rounded">
				</div>
				<div class="col-md-5 d-flex login-form bg-white rounded">
					<div class="w-100">
						<h2 class="text-center">Login</h2>
						<form action="{{ route('postlogin.user') }}" method="POST">
							{{ csrf_field() }}
							<div class="form-group form-floating-label">
								<input id="username" name="username" type="text" class="form-control input-border-bottom" required>
								<label for="username" class="placeholder">Username</label>
							</div>
							<div class="form-group form-floating-label">
								<input id="password" name="password" type="password" class="form-control input-border-bottom" required>
								<label for="password" class="placeholder">Password</label>
								<div class="show-password">
									<i class="flaticon-interface"></i>
								</div>
							</div>
							<div class="form-action mb-3">
								<button type="submit" class="btn btn-primary btn-rounded btn-login">Login</button>
							</div>
							<div class="login-account">
								<span class="msg">Login Sebagai BK </span>
								<a href="{{ route('login.bk') }}" id="" class="link">Login BK</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/ready.js') }}"></script>
	<script>
		@if(session('error'))
			Swal.fire({
				title: "Error!",
				text: "{{ session('error') }}",
				icon: "error"
			});
		@endif
	</script>
</body> --}}
<body class="login">
    <div class="wrapper wrapper-login">
      <div class="container container-login animated fadeIn">
        <h3 class="text-center">Masuk Sebagai Petugas</h3>
        <div class="login-form">

        <form action="{{ route('postlogin.user') }}" method="POST">
          {{ csrf_field()}}
          <div class="form-group form-floating-label">
            <input id="username" name="username" type="text" class="form-control input-border-bottom" required>
            <label for="username" class="placeholder">Username</label>

          </div>
          <div class="form-group form-floating-label">
            <input id="password" name="password" type="password" class="form-control input-border-bottom" required>
            <label for="password" class="placeholder">Password</label>
            <div class="show-password">
              <i class="flaticon-interface"></i>
            </div>
          </div>
          {{-- <div class="row form-sub m-0">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="rememberme">
              <label class="custom-control-label" for="rememberme">Remember Me</label>
            </div>

            <a href="#" class="link float-right">Forget Password ?</a>
          </div> --}}

          <div class="form-action mb-3">
            <button type="submit" class="btn btn-primary btn-rounded btn-login">Login</button>
          </div>
          <div class="login-account">
            <span class="msg">Login Sebagai BK </span>
            <a href="{{ route('login.bk') }}" id="" class="link">Login BK</a>
          </div>
          </form>
        </div>
      </div>


    <script src="{{asset('assets/js/core/jquery.3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/ready.js')}}"></script>
    <script>
      @if(session('error'))
        Swal.fire({
          title: "Error!",
          text: "{{ session('error') }}",
          icon: "error"
        });
      @endif
    </script>
  </body>
</html>
