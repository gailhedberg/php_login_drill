<?php 
	require_once("db_functions.php");
	require_once("redirect.php");
?>

<?php 
/* loginForm.php
 * date:	4/20/2015
  *author:	gail hedberg gailhedberg@verizon.net
  *  		student at The Tech Academy - PHP Exercise
  *
  * files in this project: 
  *		db_functions.php
  *		redirect.php
  *		loginForm.php
  *		loginForm.css
  *		gails_world.php
  *
 */
 ?>
 
 <?php
// returns true if $value contains alpha, numbers, apostrophe, hyphen or a space
// else returns false

	function clean_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>

<?php
	function test_input_values($data) {
		$msg = "";
		if (!preg_match("/^[a-zA-Z0-9]*$/", $data)) {
			$msg = "Invalid characters - please retry";
		} 
		return $msg;
	}
?>

<pre>
 <?php 
 // define variables and set to empty values
 $error_message = "";
 $txtUsername = $txtPassword = "";
 $cxn = "";
 
 // echo "<br> STEP 1 </br>";
 
 if ($_SERVER["REQUEST_METHOD"] === "POST") {
//	 echo "post method ON <br>";
//	 print_r($_POST); 
	
	if ( empty($_POST["txtUsername"]) || empty($_POST["txtPassword"]) ) {
		 $error_message = "Username and password are required";
	 } else {
		 // strip leading spaces
		$txtUsername = clean_input($_POST["txtUsername"]);
		$txtPassword = clean_input($_POST["txtPassword"]);
		
		// insure only valid characters
		$error_message = test_input_values($txtUsername);
		$error_message .= test_input_values($txtPassword); 
//		echo "error_msg is " . $error_message . "<br />";
		if ( $error_message == "" ) {
//			echo "in isset if <br>";
			$cxn = connect_to_local_db();
			$pwd = get_password($cxn, $txtUsername); 
//			echo "pwd is " . $pwd . "<br />";
			if ($pwd === $txtPassword) {
//				echo "success <br />";
				$new_loc="gails_world.php?name=" . $txtUsername;
				redirect_to($new_loc);
			} else {
				$error_message = "Username and password not found";
			}
		}
	}
 }
 ?>
</pre>

<!DOCTYPE html>
<html lang="en">
<head> 	<meta charset="UTF=8">
	<title>Login Form</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="loginForm.css">
</head>

<body>
	<h1>Gail's World</h1>
	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<fieldset>
			<h2>Please sign in</h2>
			<p> <label for="txtUsername"> Username: </label> 
				<input type="text" name="txtUsername" tabindex="1" maxlength="10" >
			</p>
			<p> <label for="txtPassword"> Password: </label> 
				<input type="password" name="txtPassword"  tabindex="2" maxlength="10" >
			</p>
			<span class="error"> <?php echo $error_message;?></span>
			<footer class="buttons">
				<p> <input type="submit" value="Submit" tabindex="3" >
					<input type="reset"  value="Reset" tabindex="4">
				</p> 
			</footer>
		</fieldset>
		
		
		
	</form>
</body>
</html>

