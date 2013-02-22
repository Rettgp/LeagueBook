<?PHP
	session_start();
	require('../scripts/db.php');
	$summoner = $_SESSION['summoner'];
	$friend = $_POST['summoner'];
	$sql = "INSERT INTO friends (friend1, friend2) VALUES ('$summoner', '$friend');";
	$resource = mysql_query($sql);
	$sql1 = "DELETE FROM friendNotifications WHERE receiver = '$summoner' and request = '$friend';";
	$resource1 = mysql_query($sql1);
	mysql_close($db_handle);
?>