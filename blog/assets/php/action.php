<?php

	session_start();

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	require 'vendor/autoload.php';

	$mail = new PHPMailer(true);

	require_once 'auth.php';

	$user = new Auth();

	if(isset($_POST['action']) && ($_POST['action']) == 'register'){
		$name = $user->test_input($_POST['name']);
		$email = $user->test_input($_POST['email']);
		$pass = $user->test_input($_POST['password']);

		$hpass = password_hash($pass, PASSWORD_DEFAULT);

		if($user->email_exist($email)){
			echo $user->shoeMessage('danger','User already exist!..');
		}else{
			if($user->register($name,$email,$hpass)){
				echo "register";
				$_SESSION['user'] = $email;
			}else{
				echo $user->shoeMessage('danger','Somthing want wrong please try agen later!');
			}
		}
	}
// login
	if(isset($_POST['action']) && $_POST['action'] == 'login'){
		$email = $user->test_input($_POST['email']);
		$pass = $user->test_input($_POST['password']);

		$loggedInUser = $user->login($email);


		if($loggedInUser != null){
			if(password_verify($pass, $loggedInUser['password'])){
				if(!empty($_POST['rem'])){
					setcookie("email", $email, time()+(30*24*60*60), '/');
					setcookie("password", $pass, time()+(30*24*60*60), '/');
				}else{
					setcookie("email", "", 1, '/');
					setcookie("password", "", 1, '/');
				}
				echo 'login';
				$_SESSION['user'] = $email;
			}else{
				echo $user->showMessage('danger','password is wrong!');
			}

		}else{
			echo $user->showMessage('danger','Email not register!');
		}
	}
	//end login 

	//strat forgot password with ajax
	if(isset($_POST['action']) && $_POST['action'] == 'forgot'){
		$email = $user->test_input($_POST['email']);

		$user_found = $user->currentUser($email);

		if($user_found != null){
			$token = base64_encode(random_bytes(32));
			$token = str_shuffle($token);

			$user->forgot_password($email, $token);

				try {
				      // Enable verbose debug output
				    $mail->isSMTP();                                            // Send using SMTP
				    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
				    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
				    $mail->Username   = Database::USERNAME;                     // SMTP username
				    $mail->Password   = Database::PASSWORD;                               // SMTP password
				    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
				    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

				    //Recipients
				    $mail->setFrom(Database::USERNAME, 'BLOG');
				    $mail->addAddress($email);              

				    // Content
				    $mail->isHTML(true);                                  // Set email format to HTML
				    $mail->Subject = 'Reset Password';
				    $mail->Body    = '<h3>Click the blow link to reset your password<br><a href="http://localhost/blog/reset-password.php?email='.$email.'&token='.$token.'" >http://localhost/blog/reset-password.php?email='.$email.'&token='.$token.'</a><br>Regards<br>BLOG</h3>' ;
				    

				    $mail->send();
				    echo $user->showMessage('success', 'We have send you the rest link in your email id, please check your email!');
				}catch(Exception $e){
					echo $user->showMessage('danger','Somting went wrong plesae try agen later!');
				}
			}else{
				echo $user->showMessage('danger', 'This email is ont register');
			}
	}

?>