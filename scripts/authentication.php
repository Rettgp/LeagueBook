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

	$email = $_POST['acct'];
	$pword = $_POST['pass'];

	$email = htmlspecialchars($email);
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
		$email = quote_smart($email, $db_handle);
		$pword = quote_smart($pword, $db_handle);
		$SQL = "SELECT * FROM users WHERE email = $email AND password = md5($pword)";
		$result = mysql_query($SQL);
		$row = mysql_fetch_array($result);
		$total = $row[0];
		
	//====================================================
	//	CHECK TO SEE IF THE $result VARIABLE IS TRUE
	//====================================================

		if ($result) {
			if ($total ==  1) {
				session_start();
				$_SESSION['sess_login'] = true;
				$_SESSION['acct'] = $email;
				header ("Location: ../userhomepage/userhomepage.php");
			}
			else {
				session_start();
				header ("Location: ../index.html");
			}	
		}
		else {	
			$errorMessage = "Error logging on" + $total;
		}

	mysql_close($db_handle);

	}

	else {
		$errorMessage = "Error logging on" + $total;
	}

}



?>



<P>
<?PHP print $errorMessage;?>

