<?PHP
	session_start();
	require('../scripts/db.php');
	$me = $_SESSION['summoner'];
	$friend = $_POST['summoner'];
	$sql1 = "SELECT * FROM friends WHERE friend1 = '$me' and friend2 = '$friend'";
	$resource1 = mysql_query($sql1);
	$num = mysql_num_rows($resource1);
	$sql2 = "SELECT * FROM friends WHERE friend1 = '$friend' and friend2 = '$me'";
	$resource2 = mysql_query($sql2);
	$num1 = mysql_num_rows($resource2);
	if($num1 > 0 || $num > 0)
		echo 1;
	else
		echo 0;
?>