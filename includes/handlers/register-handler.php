<?php

function sanitizeFormUsername($inputText){
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	return $inputText;
}

function sanitizeFormNames($inputText){
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	$inputText = ucfirst(strtolower($inputText));
	return $inputText;
}

function sanitizeFormMail($inputText){
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	return $inputText;
}


function sanitizeFormPassword($inputText){
	$inputText = strip_tags($inputText);
	return $inputText;
}

function validateUsername($un){

}

function validateFirstName($fn){

}

function validateLastName($ln){

}

function validateEmails($em, $em2){

}

function validatePasswords($pw, $pw2){

}

if (isset($_POST['registerButton'])) {
	//Register button was pressed
	$username = sanitizeFormUsername($_POST['username']);
	$firstName = sanitizeFormNames($_POST['firstName']);
	$lastName = sanitizeFormNames($_POST['lastName']);
	$email = sanitizeFormMail($_POST['email']);
	$email2 = sanitizeFormMail($_POST['email2']);
	$password = sanitizeFormPassword($_POST['password']);
	$password2 = sanitizeFormPassword($_POST['password2']);

	$wasSuccessful = $account->register($username, $firstName, $lastName, $email, $email2, $password, $password2);

	if ($wasSuccessful) {
		$_SESSION['userLoggedIn'] = $username;
		header("Location: index.php");
	}
}


?>