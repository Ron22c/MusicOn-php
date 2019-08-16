<!DOCTYPE html>
<?php 
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");
	$account = new Account($con);
	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");
	function getInput($name){
		if(isset($_POST[$name])){
			echo $_POST[$name];
		}
	}
 ?>

<html>
<head> 
	<title>Welcome To MusicOn</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register.css">
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/register.js"></script>
</head>
<body>
	<?php 
		if(isset($_POST['registerButton'])){
			echo '<script>
					$(document).ready(function(){
						$("#login").hide()
						$("#register").show()})
					</script>';
		}
		else{
			echo '<script>
					$(document).ready(function(){
						$("#login").show()
						$("#register").hide()})
					</script>';
		}
	 ?>
	<div id="background">
		<div id="loginContainer">
			<div id="inputContainer">
				<form id="login" action="register.php" method="POST">
					<h2>Login To Your <span id="title">MUSIC ON</span> Account</h2>
					<p>
						<?php echo $account->getError(Constants::$loginFailed); ?>
						<label for="loginUsername">Username: </label>
						<input id="loginUsername" type="text" name="loginUsername" placeholder="e.g. jack1994" value="<?php getInput('loginUsername') ?>" required>
					</p>
					<p>
						<label for="loginPassword">Password: </label>
					<input id="loginPassword" type="password" name="loginPassword" placeholder="Your Password" required>				
					</p>
					<button type="submit" name="loginButton">LOG IN</button>
					<div class="hasAccountText">
						<span id="hideLogin">Don't have an account yet? Signup Here.</span>
					</div>
				</form>
				<form id="register" action="register.php" method="POST">
					<h2>Create Your Free <span id ="title">MUSIC ON</span> Account</h2>
					<p>
						<?php echo $account->getError(Constants::$usernameOutOfBound); ?>
						<?php echo $account->getError(Constants::$usernameExists); ?>
						<label for="Username">Username: </label>
						<input id="Username" type="text" name="Username" placeholder="e.g. jack1994" value="<?php getInput('Username') ?>" required>
					</p>
					<p>
						<?php echo $account->getError(Constants::$firstnameOutOfBound); ?>
						<label for="firstName">First Name: </label>
						<input id="firstName" type="text" name="firstName" placeholder="e.g. Jack" value="<?php getInput('firstName') ?>" required>
					</p>
					<p>
						<?php echo $account->getError(Constants::$lastnameOutOfBound); ?>
						<label for="lastName">Last Name: </label>
						<input id="lastName" type="text" name="lastName" placeholder="e.g. brown" value="<?php getInput('lastName') ?>" required>
					</p>
					<p>
						<?php echo $account->getError(Constants::$emailDoNotMatch); ?>
						<?php echo $account->getError(Constants::$invalidEmail); ?>
						<?php echo $account->getError(Constants::$emailExists); ?>
						<label for="email">Email ID: </label>
						<input id="email" type="email" name="email" placeholder="e.g. jack1994@gmail.com" value="<?php getInput('email') ?>" required>
					</p>
					<p>
						<label for="confirmEmail">Confirm Email ID: </label>
						<input id="confirmEmail" type="email" name="confirmEmail" placeholder="e.g. jack1994@gmail.com" value="<?php getInput('confirmEmail') ?>" required>
					</p>
					<p>
						<?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
						<?php echo $account->getError(Constants::$passwordsAreNotAlphaNumeric); ?>
						<?php echo $account->getError(Constants::$passwordOutOfBound); ?>
						<label for="password">Password: </label>
						<input id="password" type="password" name="password" placeholder="Your Password" required>				
					</p> 
					<p>
						<label for="confirmPassword">Confirm Password: </label>
						<input id="confirmPassword" type="password" name="confirmPassword" placeholder="Confirm Your Password" required>				
					</p>
						<button type="submit" name="registerButton">SIGN UP</button>
						<div class="hasAccountText">
						<span id="hideregister">Already have an account? Sign in Here.</span>
					</div>
				</form>
			</div>
			<div id="loginText">
				<h1>Get great Music,Right Now</h1>
				<h2>Listen to lots of songs for free</h2>
				<ul>
					<li>Discover Music You Fall In Love With</li>
					<li>Create Your Own Playlist</li>
					<li>Follow Artists To Keep Up To Date</li>
				</ul>
			</div>
		</div>
	</div>
</body>
</html> 