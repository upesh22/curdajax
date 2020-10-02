<?php
	session_start();
	if(isset($_SESSION['user'])){
		header('location:home.php');
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User M</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/custom.css">
	<!-- <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css"> -->
</head>
<body>
	<div class="container">
		<!-- Login Form Start -->
		<div class="row justify-content-center wrapper" id="login-box">
			<div class="col-lg-10 my-auto">
				<div class="card-group myShadow">
					<div class="card round-left p-4" style="flex-grow: 1.4;">
						<h1 class="text-center font-weight-bold text-primary">Sing in to Account</h1>
						<hr class="my-3">
						<form action="#" method="post" class="px-3" id="login-form" 
							accept-charset="utf-8">

							<div id="loginAlert"></div>
							<div class="input-group input-group-lg form-group">
								<div class="input-group-prepend">
									<span class="input-group-text round-0">
										<i class="fas fa-envelope fa-lg"></i>
									</span>
								</div>
								<input type="email" name="email" id="email" class="form-control rounded-0" placeholder="E-mail" required value="<?php if(isset($_COOKIE['email'])) {echo $_COOKIE['email'];} ?>">
							</div>
							<div class="input-group input-group-lg form-group">
								<div class="input-group-prepend">
									<span class="input-group-text round-0">
										<i class="fas fa-key fa-lg"></i>
									</span>
								</div>
								<input type="password" name="password" id="password" class="form-control rounded-0" placeholder="Password" required value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['password'];} ?>">
							</div>
							<div class="form-group">
								<div class="custom-control custom-checkbox float-left">
									<input type="checkbox" name="rem" class="custom-control-input" id="customCheck" <?php if(isset($_COOKIE['email'])) {?> checked <?php }?>>
									<label for="customCheck" class="custom-control-label">Remember me</label>
								</div>
								<div class="forgot float-right">
									<a href="#" id="forgot-link" >Forgot Password?</a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="form-group">
								<input type="submit" value="Sign-in" id="login-btn" class="btn btn-primary btn-lg btn-block myBtn">
							</div>
						</form>
					</div>
					<div class="card justify-content-center rounded-rigth myColor p-4">
						<h1 class="text-white font-weight-bold text-center"> Hello Friends!</h1>
						<hr class="my-3 bg-light myHr">
						<p class="text-center font-width-bolder text-light lead">Enter your personal details and start your journey with us!</p>
						<button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="register-link">Sign Up</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Login Form End -->

		<!-- Register Form Start -->
		<div class="row justify-content-center wrapper" id="register-box" style="display: none;">
			<div class="col-lg-10 my-auto">
				<div class="card-group myShadow">
					<div class="card justify-content-center rounded-rigth myColor p-4">
						<h1 class="text-white font-weight-bold text-center"> Welcome </h1>
						<hr class="my-3 bg-light myHr">
						<p class="text-center font-width-bolder text-light lead">To keep connect with us please login with your persional info !</p>
						<button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="login-link">Sign In</button>
					</div>
					<div class="card round-left p-4" style="flex-grow: 1.4;">
						<h1 class="text-center font-weight-bold text-primary">Create Account</h1>
						<hr class="my-3">
						<form action="#" method="post" class="px-3" id="register-form" 
							accept-charset="utf-8">
							<div id="regAlert"></div>
							<div class="input-group input-group-lg form-group">
								<div class="input-group-prepend">
									<span class="input-group-text round-0">
										<i class="fas fa-user fa-lg"></i>
									</span>
								</div>
								<input type="text" name="name" id="name" class="form-control rounded-0" placeholder="Full Name" required>
							</div>
							<div class="input-group input-group-lg form-group">
								<div class="input-group-prepend">
									<span class="input-group-text round-0">
										<i class="fas fa-envelope fa-lg"></i>
									</span>
								</div>
								<input type="email" name="email" id="remail" class="form-control rounded-0" placeholder="E-mail" required>
							</div>
							<div class="input-group input-group-lg form-group">
								<div class="input-group-prepend">
									<span class="input-group-text round-0">
										<i class="fas fa-key fa-lg"></i>
									</span>
								</div>
								<input type="password" name="password" id="rpassword" class="form-control rounded-0" placeholder="Password" required minlength="5">
							</div>
							<div class="input-group input-group-lg form-group">
								<div class="input-group-prepend">
									<span class="input-group-text round-0">
										<i class="fas fa-key fa-lg"></i>
									</span>
								</div>
								<input type="password" name="cpassword" id="cpassword" class="form-control rounded-0" placeholder="Confirm Password" required minlength="5">
							</div>
							<div class="form-group">
								<div id="passError" class="text-danger font-weight-bold"></div>
							</div>
							<div class="form-group">
								<input type="submit" value="Sign-Up" id="register-btn" class="btn btn-primary btn-lg btn-block myBtn">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Register Form End -->

		<!-- Forgot Password Start -->
		<div class="row justify-content-center wrapper" id="forgot-box" style="display: none;">
			<div class="col-lg-10 my-auto">
				<div class="card-group myShadow">
					<div class="card justify-content-center rounded-rigth myColor p-4">
						<h1 class="text-white font-weight-bold text-center"> Rest Password!</h1>
						<hr class="my-3 bg-light myHr">
						<p class=" text-white lead text-center">To rest your password entered the register email and we will send you the rest instruction on your email!</p>
						<button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="back-link">Back </button>
					</div>
					<div class="card round-left p-4" style="flex-grow: 1.4;">
						<h1 class="text-center font-weight-bold text-primary">Forgot Your Password</h1>
						<hr class="my-3">
						<form action="#" method="post" class="px-3" id="forgot-form" 
							accept-charset="utf-8">
							<div id="forgotAlert"></div>
							<div class="input-group input-group-lg form-group">
								<div class="input-group-prepend">
									<span class="input-group-text round-0">
										<i class="fas fa-envelope fa-lg"></i>
									</span>
								</div>
								<input type="email" name="email" id="femail" class="form-control rounded-0" placeholder="E-mail" required>
							</div>							
							<div class="form-group">
								<input type="submit" value="Rest password" id="forgot-btn" class="btn btn-primary btn-lg btn-block myBtn">
							</div>
						</form>
					</div>
					
				</div>
			</div>
		</div>

		<!-- Forgot Password End -->
	</div>

	<script src="http://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js" type="text/javascript" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="assets/js/custom.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#register-link").click(function(){
				$("#login-box").hide();
				$("#register-box").show();
			});
			$("#login-link").click(function(){
				$("#login-box").show();
				$("#register-box").hide();
			});
			$("#forgot-link").click(function(){
				$("#login-box").hide();
				$("#forgot-box").show();
			});
			$("#back-link").click(function(){
				$("#login-box").show();
				$("#forgot-box").hide();
			});
		});
	</script>
</body>
</html>