<?php
	require_once 'assets/php/auth.php';

	 $user = new Auth();

	 $msg = '';

	 // if(isset($_GET['email']) && isset($_GET['token'])){
	 // 	$email = $user->test_input($_GET['email']);
	 // 	$token = $user->test_input($_GET['token']);
	 	
	 // 	$user_found = $user->reset_password_auth($email, $token);
	 	
	 // 	if($user_found != null){

	 // 		if(isset($_POST['submit'])){
	 // 			$newpassword = $_POST['pass'];
	 // 			$cnewpassword = $_POST['cpass'];

	 // 			$hnewpassword = password_hash($newpassword, PASSWORD_DEFAULT);

	 // 			if($newpassword == $cnewpassword){
	 // 				$user->update_new_password($hnewpassword, $email);
	 // 				$msg = 'Password Success Fully Change!<br>
	 // 				<a href="index.php">Login!</a>';
	 // 			}else{
	 // 				$mes = 'Something went wrong! please try agein later!';
	 // 			}
	 // 		}

	 // 	}else{
	 // 		//header('location:index.php');
	 // 	}

	 // }
	 if(isset($_GET['email']) && isset($_GET['token'])){
	 	 $email = $user->test_input($_GET['email']);
	 	$token = $user->test_input($_GET['token']);
	 	
	 	$auth_user = $user->reset_password_auth($email, $token);


	 	if($auth_user != null){
	 		if(isset($_POST['submit'])){
	 			$newpass = $_POST['pass'];
	 			$cnewpass = $_POST['cpass'];

	 			$hnewpass = password_hash($newpass, PASSWORD_DEFAULT);

	 			if($newpass == $cnewpass){
	 				$user->update_new_password($hnewpass, $email);
	 				$msg = 'Password changed successfilly! <br><a href="index.php">Login Here!</a>';
	 			}else{
	 				$msg = 'Password did not matched!';
	 			}
	 		}
	 	}else{
	 		//header('location:index.php');
			//exit();
	 	}

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
		<!-- Register Form Start -->
			<div class="row justify-content-center wrapper" >
				<div class="col-lg-10 my-auto">
					<div class="card-group myShadow">
						<div class="card justify-content-center rounded-rigth myColor p-4">
							<h1 class="text-white font-weight-bold text-center"> Reset Password  </h1>
							<hr class="my-3 bg-light myHr">
							<p class="text-center font-width-bolder text-light lead">If you forgot your password then you reset your password!</p>
						</div>
						<div class="card round-left p-4" style="flex-grow: 2;">
							<h1 class="text-center font-weight-bold text-primary">Reset Password!</h1>
							<hr class="my-3">
							<form action="#" method="post" class="px-3" accept-charset="utf-8">
								<div class="text-center text-danger lead my-2"><?= $msg; ?></div>
								<div class="input-group input-group-lg form-group">
									<div class="input-group-prepend">
										<span class="input-group-text round-0">
											<i class="fas fa-key fa-lg"></i>
										</span>
									</div>
									<input type="password" name="pass" class="form-control rounded-0" placeholder="New Password" required minlength="5">
								</div>
								<div class="input-group input-group-lg form-group">
									<div class="input-group-prepend">
										<span class="input-group-text round-0">
											<i class="fas fa-key fa-lg"></i>
										</span>
									</div>
									<input type="password" name="cpass" class="form-control rounded-0" placeholder="Confirm New Password" required minlength="5">
								</div>
								<div class="form-group">
									<input type="submit" name="submit" value="Reset Password" class="btn btn-primary btn-lg btn-block myBtn">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		<!-- Register Form End -->
	</div>
	<script src="http://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js" type="text/javascript" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="assets/js/custom.js"></script>
</body>
</html>