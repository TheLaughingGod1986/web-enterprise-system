<?php
session_start();
//include 'php_lib/checkSession.php';
	$message = $_SESSION['message_log'];
	$user = $_SESSION['logged_user'];

	if (!isset($user)) {

?>
		<div class='loginform'>
			<form method="post" action="php_lib/verifyLogin.php">
				<input type="text" name="username" placeholder="Username or Email">
				<input type="password" name="pass" placeholder="Password">
				<input type="submit" name="commit" value="Login">
			</form>
		</div>
<?php
	echo "".$message;
	}
	else{
		echo "Hello ".$user['userName'];
		echo nl2br("\n".$message);
		echo nl2br("\n<a href='php_lib/logout.php'>Logout</a>");
	}

?>