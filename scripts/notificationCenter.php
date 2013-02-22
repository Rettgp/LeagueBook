<?PHP
	require('../scripts/db.php');
	session_start();
	$summoner = $_SESSION['summoner'];
	$sql = "SELECT request FROM friendNotifications WHERE receiver = '$summoner'";
	$resource = mysql_query($sql);
	$row = mysql_num_rows($resource);
		if ($row >=  1) {
			$rows = mysql_fetch_array($resource, MYSQL_NUM);
			echo $rows[0];
		}else{
			
		}
?>