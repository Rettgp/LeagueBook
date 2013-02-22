<?PHP
	require('../scripts/db.php');
	$s = $_GET['summoner'];
	$r = $_GET['summ'];
	$sql1 = "SELECT * FROM friendNotifications WHERE receiver = '$r' and request = '$s'";
	$resource1 = mysql_query($sql1);
	$row = mysql_num_rows($resource1);
	if($row == 0){
		$sql = "INSERT INTO friendNotifications (receiver, request) VALUES ('$r', '$s')";
		$resource = mysql_query($sql);
	}
	
	header ("Location: ../userhomepage/user.php?summ=$r");
?>