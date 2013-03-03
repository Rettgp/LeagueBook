<?PHP
		session_start();
		//$confirm = $_POST['correct'];
		$confirm = $_POST['correct'];
		$sum = $_POST['sum'];
		$champ = $_POST['champ'];
		$item1 = $_POST['item1'];
		$item2 = $_POST['item2'];
		$intenName = $_POST['interName'];
		$acctName = $_POST['acctName'];
		$acctID = $_POST['acctID'];
		$iconID = $_POST['iconID'];
		$lvl = $_POST['lvl'];
		$summonerID = $_POST['summonerID'];
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
				$SQL3 = "INSERT INTO  summoners (internalname, name, iconID, lvl, summonerID)
							VALUES ($intenName,  $acctName,  $acctID,  $iconID,  $lvl,  $summonerID);";
				$result3 = mysql_query($SQL3);
				$_SESSION['summoner'] = $sum;
				mysql_close($db_handle);
				echo $sum;
				header("../userhomepage/userhomepage.php?summoner=$sum");
				exit();
			}
			else{
				header("../homepage/confirm.php");
				exit();
			}
		}else{
			header("../homepage/confirm.php");
			exit();
		}

