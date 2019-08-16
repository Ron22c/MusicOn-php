<?php 
	if(isset($_POST['loginButton'])){ 
		// loginButton pressed
		$loginUsername = $_POST['loginUsername'];
		$loginPassword = $_POST['loginPassword'];

		$wasSuccess = $account->login($loginUsername, $loginPassword);
		if ($wasSuccess){
			$_SESSION['userLoggedIn'] = $loginUsername;
			header("Location: index.php");
		}
	}
 ?>	