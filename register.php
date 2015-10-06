<?php session_start();
require('config/config.php');
require('model/functions.fn.php');

/********************************
			PROCESS
********************************/


if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])){

	/* isEmailAvailable
		return :
			true if available
			false if not available
		$db -> 				database object
		$email -> 			field value : email
	*/
	$email = $_POST['email'];
	$password = $_POST['password'];
	$username = $_POST['username'];

	$email_ok = isEmailAvailable($db, $email);

	/* isUsernameAvailable
		return :
			true if available
			false if not available
		$db -> 				database object
		$username -> 			field value : username
	*/
	$username_ok = isUsernameAvailable($db, $username);


	if ($email_ok && $username_ok) {
		/* userRegistration
			return :
				true for registration OK
				false for fail
			$db -> 				database object
			$username -> 		field value : username
			$email -> 			field value : email
			$password -> 		field value : password
		*/
		userRegistration($db, $email, $username, $password);
		header('Location: login.php');
	}

	if (!$email_ok) {
		//
	}

	if (!$username_ok) {
		//
	}

}

/******************************** 
			VIEW 
********************************/

include 'view/_header.php';
include 'view/register.php';
include 'view/_footer.php';
