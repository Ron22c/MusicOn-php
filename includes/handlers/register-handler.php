<?php 
	function sanitizeFromUsername($inputText){
		$inputText = strip_tags($inputText);
		$inputText = str_replace(" ", "", $inputText);
		return $inputText;
	}
	function sanitizeFromString($input){
		$input = strip_tags($input);
		$input = str_replace(" ", "", $input);
		$input = ucfirst(strtolower($input));
		return $input;
	}
	function sanitizeFromPassword($inputText){
		$inputText = strip_tags($inputText);
		return $inputText;
	}
	if(isset($_POST['registerButton'])){ 
		// registerButton pressed
		$username = sanitizeFromUsername($_POST['Username']);
		$firstname = sanitizeFromString($_POST['firstName']);
		$lastname = sanitizeFromString($_POST['lastName']);
		$email = sanitizeFromString($_POST['email']);
		$confirmEmail = sanitizeFromString($_POST['confirmEmail']);
		$password = sanitizeFromPassword($_POST['password']);
		$confirmPassword = sanitizeFromPassword($_POST['confirmPassword']);

		$account = new Account($con);
		$wasSucessful = $account->register($username, $firstname, $lastname, $email, $confirmEmail, $password, $confirmPassword);
		echo $wasSucessful;
		if($wasSucessful){
			$_SESSION['userLoggedIn'] = $username;
			header("Location: index.php");
		}
	}
 ?>