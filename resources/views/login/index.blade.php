<!DOCTYPE html>
<html lang="en">

<head>

	<title>masuk</title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="" />
	<!-- Favicon icon -->
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="assets/css/style.css">
	
	


</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content text-center">
		
		<div class="card borderless">
			<div class="row align-items-center ">
				<div class="col-md-12">

					@if (session()->has('berhasil'))
					  <div class="alert alert-succes alert-dismissible fade show text-center" role="alert">
						<h5>{{ session('berhasil') }}</h5>
					  </div>
					  @endif
					  @if (session()->has('gagal'))
					  <div class="alert alert-danger alert-dismissible fade show text-center"  role="alert">
						<h5>{{ session('gagal') }} </h5>
					  </div>
					  @endif

					<form action="/login" method="POST" class="card-body">

						<h4 class="mb-3 f-w-400">masuk</h4>
						@csrf
						<hr>
						<div class="form-group mb-3">
							<input type="email" 
							class="form-control form-control-user @error('email') is-invalid @enderror"
							 id="Email" aria-describedby="emailHelp"
							placeholder="Alamat Email" name="email" required
							value="{{ old('email') }}">
							@error('email')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
						</div>
						<div class="form-group mb-4">
							<input type="password" name="password" class="form-control" id="Password" placeholder="sandi">
						</div>
						<button class="btn btn-block btn-primary mb-4">masuk</button>
						<hr>
						<p class="mb-2 text-muted">lupa sandi? <a href="auth-reset-password.html" class="f-w-400">Reset</a></p>
						<p class="mb-0 text-muted">Belum mempunyai akun? <a href=/register class="f-w-400">Daftar</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>

<script src="assets/js/pcoded.min.js"></script>



</body>

</html>
