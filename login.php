<?php session_start();

/******************************** 
	 DATABASE & FUNCTIONS 
********************************/
require('config/config.php');
require('model/functions.fn.php');


/********************************
			PROCESS
********************************/

if (isset($_POST['username']) && !empty($_POST['username']) 
&& isset($_POST['password']) && !empty($_POST['password'])) {
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	

	/*userConnection
		return :
			true for connection OK
			false for fail
		$db -> 				database object
		$username -> 			field value : username
		$password -> 		field value : password
	*/
if (userConnection($db, $email, $passeword)) {
		header('Location: dashboard.php');
	}
	else {
		$error = "Mauvaise identification";
	}
	
}

/******************************** 
			VIEW 
********************************/
include 'view/_header.php';
include 'view/login.php';
include 'view/_footer.php';

