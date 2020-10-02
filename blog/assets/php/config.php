<?php
	
	class Database{

		const USERNAME = '8621okay@gmail.com';
		const PASSWORD = 'password21@';

		private $db_host = "mysql:host=localhost;dbname=newmember";
		private $db_user = "root";
		private $db_pass = "";

		public $conn;

		public function __construct(){

			try{
				$this->conn = new PDO($this->db_host,$this->db_user,$this->db_pass);
			}catch(PDOExecution $e){
				echo "Error:" . $e->getMessage();
			}

			return $this->conn;
		}
	

		//input test

		public function test_input($data){

			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);

			return $data;
		}

		//show messages
		public function showMessage($type, $message){

			return '<div class="alert alert-'.$type.' alert-dismissible" role="alert">
					<strong>'.$message.'</strong>
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					</div>';
		}

	}

?>