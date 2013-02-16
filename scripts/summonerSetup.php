<?PHP
		session_start();
		$user_name = "LoLCodexData";
		$pass_word = "Israel90123!";
		$database = "LoLCodexData";
		$server = "LoLCodexData.db.10536782.hostedresource.com";

		$db_handle = mysql_connect($server, $user_name, $pass_word);
		$db_found = mysql_select_db($database, $db_handle);
		$acct = $_SESSION['acct'];
		$sum = $_POST['summoner'];
		$foo = $_SESSION['summoner'];
		if ($db_found) {
			$SQL = "SELECT * FROM users WHERE summoner = '$sum'";
			$result = mysql_query($SQL);
			$row = mysql_num_rows($result);
			if($row == 0){
				$SQL2 = "UPDATE users SET summoner='$sum' WHERE email=$acct";
				$result2 = mysql_query($SQL2);
				$_SESSION['summoner'] = $sum;
				mysql_close($db_handle);
				header("../userhomepage/userhomepage.php?summoner=$sum");
				exit();
			}
			else{
				header("../userhomepage/userhomepage.php?summoner=$foo");
				exit();
			}
		}
	function setup(){
	}

?>

<html>
	<body>
		<div id="dialog-form" title="Associate Summoner Name">
		  <p class="validateTips"><font size="4">Please play one custom game and finish the game with only 1 ward in your inventory first slot. This game must be the most recent game played. After this is done please input your summoner name. All features will be locked until this is completed</font></p></br>
		  <p><font size="4">Thank you!</font></p></br>
		  <form name = "summonerForm" method = "post" action = "../scripts/summonerSetup.php">
			<label for="name">Summoner:</label>
			<input type="text" name="summoner">
			<input type = "submit" value = "submit">
		  </form>
		</div>
	</body>
</html>