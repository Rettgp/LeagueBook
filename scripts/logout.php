<?PHP
	session_start();
	$_SESSION['sess_login'] = false;
	$_SESSION = array();
	session_unset();
	session_destroy();
	header("Location: ../index.php");
	exit();
?>

