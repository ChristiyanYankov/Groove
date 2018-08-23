<?php

if (isset($_POST['loginButton'])) {
	//Login button was pressed
	$username = mysqli_escape_string($con, $_POST['loginUsername']);
	$password = mysqli_escape_string($con, $_POST['loginPassword']);

	if ($account->login($username, $password)) {
		$_SESSION['userLoggedIn'] = $username;
		header("Location: index.php");
	}

}


?>