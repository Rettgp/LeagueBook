<?PHP

$uname = "";
$pword = "";
$errorMessage = "";
//==========================================
//	ESCAPE DANGEROUS SQL CHARACTERS
//==========================================
function quote_smart($value, $handle) {

   if (get_magic_quotes_gpc()) {
       $value = stripslashes($value);
   }

   if (!is_numeric($value)) {
       $value = "'" . mysql_real_escape_string($value, $handle) . "'";
   }
   return $value;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$uname = $_POST['acct'];
	$pword = $_POST['pass'];

	$uname = htmlspecialchars($uname);
	$pword = htmlspecialchars($pword);
	//==========================================
	//	CONNECT TO THE LOCAL DATABASE
	//==========================================
	$user_name = "LoLCodexData";
	$pass_word = "Israel90123!";
	$database = "LoLCodexData";
	$server = "LoLCodexData.db.10536782.hostedresource.com";

	$db_handle = mysql_connect($server, $user_name, $pass_word);
	$db_found = mysql_select_db($database, $db_handle);
	echo $db_found;
	if ($db_found) {
		$uname = quote_smart($uname, $db_handle);
		$pword = quote_smart($pword, $db_handle);

		$SQL = "SELECT * FROM users WHERE email = $uname AND password = md5($pword)";
		$result = mysql_query($SQL);
		$num_rows = mysql_num_rows($result);

	//====================================================
	//	CHECK TO SEE IF THE $result VARIABLE IS TRUE
	//====================================================

		if ($result) {
			if ($num_rows =  1) {
				session_start();
				$_SESSION['login'] = "1";
				header ("Location: ../userhomepage/userhomepage.html");
			}
			else {
				
				session_start();
				$_SESSION['login'] = "";
				header ("Location: ../index.html");
			}	
		}
		else {
			$errorMessage = "Error logging on";
		}

	mysql_close($db_handle);

	}

	else {
		$errorMessage = "Error logging on";
	}

}


?>



<P>
<?PHP print $errorMessage;?>

