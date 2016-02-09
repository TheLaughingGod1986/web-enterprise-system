<?php
session_start();

	$userIn = $_SESSION['logged_user'];

	if (!isset($userIn)) {
		header('Location: login.php');
		exit;
	}
?>