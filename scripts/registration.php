<?PHP


//set the session variable to 1, if the user signs up. That way, they can use the site straight away
//do you want to send the user a confirmation email?
//does the user need to validate an email address, before they can use the site?
//do you want to display a message for the user that a particular username is already taken?
//test to see if the u and p are long enough
//you might also want to test if the users is already logged in. That way, they can't sign up repeatedly without closing down the browser
//other login methods - set a cookie, and read that back for every page
//collect other information: date and time of login, ip address, etc
//don't store passwords without encrypting them

//TO-DO
//========================================================================================================================
//								CHECK EMAIL CONFIRM IS = EMAIL
//								CHECK PW CONFIRM IS = PW
//========================================================================================================================
$email = "";
$password = "";
$confirmemail = "";
$confirmpassword = "";
$nationality = "";
$errorMessage = "";
$num_rows = 0;

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

	//====================================================================
	//	GET THE CHOSEN U AND P, AND CHECK IT FOR DANGEROUS CHARCTERS
	//====================================================================
	$email = $_POST['email'];
	$comfiremail = $_POST['confirmemail'];
	$password = $_POST['password'];
	$confirmpassword = $_POST['confirmpassword'];
	$nationality = $_POST['nationality'];

	$email = htmlspecialchars($email);
	$comfiremail = htmlspecialchars($comfiremail);
	$password = htmlspecialchars($password);
	$confirmpassword = htmlspecialchars($confirmpassword);
	$nationality = htmlspecialchars($nationality);

	//====================================================================
	//	CHECK TO SEE IF U AND P ARE OF THE CORRECT LENGTH
	//	A MALICIOUS USER MIGHT TRY TO PASS A STRING THAT IS TOO LONG
	//	if no errors occur, then $errorMessage will be blank
	//====================================================================

	$uLength = strlen($email);
	$pLength = strlen($password);

	if ($uLength >= 5 && $uLength <= 50) {
		$errorMessage = "";
	}
	else {
		$errorMessage = $errorMessage . "email must be between 5 and 50 characters" . "<BR>";
	}

	if ($pLength >= 8 && $pLength <= 16) {
		$errorMessage = "";
	}
	else {
		$errorMessage = $errorMessage . "Password must be between 8 and 16 characters" . "<BR>";
	}


//test to see if $errorMessage is blank
//if it is, then we can go ahead with the rest of the code
//if it's not, we can display the error

	//====================================================================
	//	Write to the database
	//====================================================================
	if ($errorMessage == "") {

	$user_name = "LoLCodexData";
	$pass_word = "Israel90123!";
	$database = "LoLCodexData";
	$server = "LoLCodexData.db.10536782.hostedresource.com";

	$db_handle = mysql_connect($server, $user_name, $pass_word);
	$db_found = mysql_select_db($database, $db_handle);

	if ($db_found) {

		$email = quote_smart($email, $db_handle);
		$password = quote_smart($password, $db_handle);

	//====================================================================
	//	CHECK THAT THE USERNAME IS NOT TAKEN
	//====================================================================

		$SQL = "SELECT * FROM users WHERE email = $email";
		$result = mysql_query($SQL);
		$row = mysql_fetch_array($result);
		$total = $row[0];

		if ($num_rows > 0) {
			$errorMessage = "Username already taken";
		}
		
		else {
			
			$SQL = "INSERT INTO users (email, summoner, password, region) VALUES ($email, NULL, md5($password), '$nationality')";

			$result = mysql_query($SQL);

			mysql_close($db_handle);

		//=================================================================================
		//	START THE SESSION AND PUT SOMETHING INTO THE SESSION VARIABLE CALLED login
		//	SEND USER TO A DIFFERENT PAGE AFTER SIGN UP
		//=================================================================================

			session_start();
			$_SESSION['sess_login'] = 1;
			$_SESSION['acct'] = $email;

			header ("Location: /userhomepage/userhomepage.php");

		}

	}
	else {
		$errorMessage = "Database Not Found";
	}




	}

}


?>

<html>
	<head>
	<title>Basic Login Script</title>


	</head>
	<body>



<?PHP print $errorMessage;?>

	</body>
	</html>