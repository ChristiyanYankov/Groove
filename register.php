<?php
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");

	$account = new Account($con);

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

	function getInputValue($name){
		if (isset($_POST[$name])) {
			echo $_POST[$name];
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to ...</title>

	<link rel="stylesheet" type="text/css" href="assets/css/register.css">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="assets/js/register.js" type="text/javascript"></script>
</head>
<body>
	<?php
	if (isset($_POST['registerButton'])) {
		echo '<script type="text/javascript">
				$(document).ready(function(){
				$("#loginForm").hide();
				$("#registerForm").show();
				});
				</script>';
	}
	else{
		echo '<script type="text/javascript">
				$(document).ready(function(){
				$("#loginForm").show();
				$("#registerForm").hide();
				});
				</script>';
	}
	?>
	
	<div id="background">
		<div id="loginContainer">

			<div id="inputContainer">
				<form id="loginForm" action="register.php" method="POST">
					<h2>Login to your account</h2>
					<p>
						<?php echo $account->getError(Constants::$loginFailed); ?>
						<label for="loginUsername">Username</label>
					<input id="loginUsername" type="text" name="loginUsername" placeholder="e.g userName123" value="<?php getInputValue('loginUsername');?>" required>
					</p>
					<p>
						<label for="loginPassword">Password</label>
					<input id="loginPassword" type="password" name="loginPassword" placeholder="Your password" required>
					</p>

					<button type="submit" name="loginButton">Login</button>

					<div class="hasAccountText">
						<a href="#">
							<span id="hideLogin">Don't have an account yet? Sign up here.</span>
						</a>
					</div>

				</form>



				<form id="registerForm" action="register.php" method="POST">
					<h2>Create your free account</h2>
					<p>
						<?php echo $account->getError(Constants::$usernameCharacters); ?>
						<?php echo $account->getError(Constants::$usernameTaken); ?>
						<label for="username">Username</label>
					<input id="username" type="text" name="username" placeholder="e.g userName123" value="<?php getInputValue('username');?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$firstNameCharacters); ?>
						<label for="firstName">First Name</label>
					<input id="firstName" type="text" name="firstName" placeholder="e.g Elon" value="<?php getInputValue('firstName');?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$lastNameCharacters); ?>
						<label for="lastName">Last Name</label>
					<input id="lastName" type="text" name="lastName" placeholder="e.g Musk" value="<?php getInputValue('lastName');?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
						<?php echo $account->getError(Constants::$emailInvalid); ?>
						<?php echo $account->getError(Constants::$emailTaken); ?>
						<label for="email">Email</label>
					<input id="email" type="email" name="email" placeholder="e.g userName123@mail.com" value="<?php getInputValue('email');?>" required>
					</p>

					<p>
						<label for="email2">Confirm email</label>
					<input id="email2" type="email" name="email2" placeholder="Confirm your email" value="<?php getInputValue('email2');?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
						<?php echo $account->getError(Constants::$passwordsNotAlphanumeric); ?>
						<?php echo $account->getError(Constants::$passwordsCharacters); ?>
						<label for="password">Password</label>
					<input id="password" type="password" name="password" placeholder="Your password" required>
					</p>

					<p>
						<label for="password2">Confrim password</label>
					<input id="password2" type="password" name="password2" placeholder="Confirm your password"required>
					</p>

					<button type="submit" name="registerButton">SIGN UP</button>

					<div class="hasAccountText">
						<a href="#">
							<span id="hideRegister">Already have an account? Login here.</span>
						</a>
					</div>

				</form>
			</div>
			<div id="loginText">
				<h1>Get great music, right now</h1>
				<h2>Listen your favourite songs for free</h2>
				<ul>
					<li>Discover music you'll fall inlove with</li>
					<li>Create your own playlists</li>
					<li>Follow artists</li>
				</ul>
			</div>
		</div>
	</div>

</body>
</html>