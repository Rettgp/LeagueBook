<?PHP
	require('../scripts/db.php');
	$summoner = $_SESSION['summoner'];
	$friend = $_POST['summoner'];
	$sql = "INSERT INTO friends (friend1, friend2) VALUES ($summoner, $friend);";
	$resource = mysql_query($sql);
	
?>