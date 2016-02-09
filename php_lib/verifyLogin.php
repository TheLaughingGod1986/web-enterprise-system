<?php
session_start();

	$username = $_POST['username'];
	$pass = $_POST['pass'];

	include 'open.php';

	$dbquery = "SELECT * FROM UserACC WHERE userName = '$username' AND pass = '$pass'";

	$result = mysqli_query($dblink, $dbquery);
		
	$counter = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);

	include 'close.php';

	if ($counter == 1) {
		$_SESSION['logged_user'] = $row;
		$_SESSION['message_log'] = 'Alert Message: Success!';
		header('location: ../login.php');
	} else {
		$_SESSION['message_log'] = 'Alert Message: Login failed doe to Wrong Username/Password.';
		header('location:../login.php');
	}
?>