<?PHP
		session_start();
		$confirm = $_POST['correct']
		$champ = $_POST['champ'];
		$item1 = $_POST['item1'];
		$item2 = $_POST['item2'];
		$user_name = "LoLCodexData";
		$pass_word = "Israel90123!";
		$database = "LoLCodexData";
		$server = "LoLCodexData.db.10536782.hostedresource.com";

		$db_handle = mysql_connect($server, $user_name, $pass_word);
		$db_found = mysql_select_db($database, $db_handle);
		$acct = $_SESSION['acct'];
		if($champ == $confirm && $item1 == '2044' && $item2 == '2044'){
			if ($db_found) {
				$SQL2 = "UPDATE users SET summoner='$sum' WHERE email=$acct";
				$result2 = mysql_query($SQL2);
				$_SESSION['summoner'] = $sum;
				mysql_close($db_handle);
				header("../homepage/confirm.php");
				exit();
			}
			else{
				header("../userhomepage/userhomepage.php?summoner=$foo");
				exit();
			}
		}else{
			header("../userhomepage/userhomepage.php?summoner=$foo");
			exit();
		}


?>

