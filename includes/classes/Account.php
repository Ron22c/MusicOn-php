<?php 
	class Account{
		private $con;
		private $errorArray;
		public function __construct($con){
			$this->con = $con;
			$this->errorArray = array();
		}
		public function login($username, $password){
			$encrypPW = md5($password);
			$query = mysqli_query($this->con, "SELECT * FROM users WHERE username = '$username' AND password = '$encrypPW'");
			if(mysqli_num_rows($query) == 1){
				return true;
			}
			else{
				array_push($this->errorArray, Constants::$loginFailed);
				return false;
			}
		}
		public function register($username, $firstname, $lastname, $email, $confirmEmail, $password, $confirmPassword){
			//Validations
			$this->validateUsername($username);
			$this->validateFirstname($firstname);
			$this->validateLastname($lastname);
			$this->validateEmail($email, $confirmEmail);
			$this->validatePasswords($password, $confirmPassword);
			if(empty($this->errorArray)){
				return $this->insertIntoDb($username, $firstname, $lastname, $email, $password);
			}
			else{
				return false;
			}
		}
		public function getError($error){
			if(!in_array($error, $this->errorArray)){
				$error = "";
			}
			else{
				return "<span class='errorMessage'>$error</span>";
			}
		}
		private function insertIntoDb($username, $firstname, $lastname, $email, $password){
			$encryptedPw = md5($password);
			$profilePic = "assets/images/profilePictures/pic1.jpg";
			$date = date("Y-m-d");
			$result = mysqli_query($this->con, "INSERT INTO users VALUES(null, '$username', '$firstname', '$lastname', '$email', '$encryptedPw', '$date', '$profilePic')");
			return $result;
		}
		private function validateUsername($username){
			if(strlen($username) > 25 || strlen($username) < 5){
				array_push($this->errorArray, Constants::$usernameOutOfBound);
				return;
			}
			$userNameInDB = mysqli_query($this->con, "SELECT username from users where username='$username'");
			if(mysqli_num_rows($userNameInDB) != 0){
				array_push($this->errorArray, Constants::$usernameExists);
			}
		}
		private function validateFirstname($firstname){
			if(strlen($firstname) > 25 || strlen($firstname) < 2){
				array_push($this->errorArray, Constants::$firstnameOutOfBound);
				return;
			}
			
		}
		private function validateLastname($lastname){
			if(strlen($lastname) > 25 || strlen($lastname) < 2){
				array_push($this->errorArray, Constants::$lastnameOutOfBound);
				return;
			}
			
		}
		private function validateEmail($email, $cEmail){
			if($email != $cEmail){
				array_push($this->errorArray, Constants::$emailDoNotMatch);
				return;
			}
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				array_push($this->errorArray, Constants::$invalidEmail);
				return;
			}
			$emailInDb = mysqli_query($this->con, "SELECT email from users where email='$email'");
			if (mysqli_num_rows($emailInDb) != 0){
				array_push($this->errorArray, Constants::$emailExists);
			}
		}
		private function validatePasswords($password, $cPassword){
			if($password != $cPassword){
				array_push($this->errorArray, Constants::$passwordsDoNotMatch);
				return;
			}
			if(preg_match('/[^A-Za-z0-9]/', $password)){
				array_push($this->errorArray, Constants::$passwordsAreNotAlphaNumeric);
				return;
			}
			if(strlen($password) > 30 || strlen($password) < 6){
				array_push($this->errorArray, Constants::$passwordOutOfBound);
				return;
			}
		}
	}
 ?>