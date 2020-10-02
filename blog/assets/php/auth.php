<?php
	
	require_once 'config.php';

	class Auth extends Database{

		//check user already exist or not
		public function email_exist($email){

			$sql = "SELECT email FROM users WHERE email = :email";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			return $row;
		}


		//register user information insert in to data base
		public function register($name, $email, $password){

			$sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :pass)";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['name'=>$name,'email'=>$email, 'pass'=>$password]);

			return true;
		}

		//exist email
		public function login($email){

			$sql = "SELECT email, password FROM users WHERE email = :email AND deleted != 0";
			$stmt= $this->conn->prepare($sql);
			$stmt->execute(['email'=>$email]);

			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			return $row;
		}

		public function currentUser($email){

			$sql = "SELECT * FROM users WHERE email =:email AND deleted != 0";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['email'=>$email]);

			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			return $row; 
		}

		public function forgot_password($email, $token){
			$sql = "UPDATE users SET token =:token, token_expire = date_add(now(), INTERVAL 10 MINUTE) WHERE email = :email";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['email'=>$email, 'token'=>$token]);

			return true;
		}

		public function reset_password_auth($email, $token){
			$sql = "SELECT id FROM users WHERE email =:email AND token= :token AND token_expire > now() AND token != '' AND deleted != 0 ";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['email'=>$email, 'token'=>$token]);

			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			return $row; 
		}

		public function update_new_password($pass, $email){
			$sql = "UPDATE users SET token ='', password=:pass WHERE email= :email AND deleted !=0";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['pass'=>$pass, 'email'=>$email]);

			return true; 
		}
	}

?>

