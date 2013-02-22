<?PHP
	require('../scripts/db.php');
	$summoner = $_SESSION['summoner'];
	$sql = "SELECT request FROM friendNotifications WHERE receiver = $summoner";
	$resource = mysql_query($sql);
	
	if ($resource) {
		$row = mysql_num_rows($resource);
		if ($row >=  1) {
			$notifications = array();
			$notifications[] = $row;
			ecbo $notifications;
		}else{
			echo 0;
		}
	}else{
		echo 0;
	}
?>