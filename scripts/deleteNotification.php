<?PHP
	session_start();
	require('../scripts/db.php');
	$summoner = $_SESSION['summoner'];
	$friend = $_POST['summoner'];
	$sql = "DELETE FROM friendNotifications WHERE receiver = '$summoner' and request = '$friend';";
	$resource = mysql_query($sql);
	mysql_close($db_handle);
?>