<!DOCTYPE html>
<html lang="en">

<head>

	<title>sign up</title>
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
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="assets/css/style.css">
	
	


</head>

<!-- [ auth-signup ] start -->
<div class="auth-wrapper">
	<div class="auth-content text-center">
		<img src="assets/images/logo.png" alt="" class="img-fluid mb-4">
		<div class="card borderless">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<form action="/register" method="POST" class="card-body">
						<h4 class="f-w-400">Sign up</h4>
						<hr>
						@csrf
						<div class="form-group mb-3">
							<input type="text" 
							class="form-control form-control-user @error('name') is-invalid @enderror"
							 id="Username" placeholder="Nama" name="name" required
							 value="{{ old('name') }}">
							 @error('name')
							 <div class="invalid-feedback">
								{{ $message }}
							 </div>
							 @enderror
						</div>
						<div class="form-group mb-3">
							<input type="text" 
							class="form-control form-control-user @error('notelp') is-invalid @enderror"
							 id="notelp" placeholder="no.telp" name="notelp" required
							 value="{{ old('notelp') }}">
							 @error('notelp')
							 <div class="invalid-feedback">
								{{ $message }}
							 </div>
							 @enderror
						</div>
						<div class="form-group mb-3">
							<input type="text" class="form-control form-control-user @error('email') is-invalid
							@enderror"
							id="Email" aria-describedby="emailHelp" placeholder="Email address"
							name="email" required value="{{ old('email') }}">
							@error('email')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
						</div>
						<div class="form-group mb-4">
							<input type="password" 
							class="form-control form-control-user @error('password') is-invalid @enderror" 
							id="Password" placeholder="Password" name="password" required>
							@error('password')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
						</div>
						<button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>
						<hr>
						<p class="mb-2">Already have an account? <a href=/login class="f-w-400">Login</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signup ] end -->

<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>

<script src="assets/js/pcoded.min.js"></script>



</body>

</html>
