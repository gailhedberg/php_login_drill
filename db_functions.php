<?php
// database functions for mysql on localhost
//	c:/xampp/localhost/phpmyadmin
?>

<?php
// create to mysql on localhost
//
	function connect_to_local_db() {
		$host = "localhost";
		$user = "root";
		$pwd = "coraL0701";
		$dbname = "gh_projects";
		$cxn = mysqli_connect($host, $user, $pwd, $dbname);
		if (mysqli_connect_errno()) {
			die("Gail's World db is not available, try again later. " .
				mysqli_connect_error() . 
				" (" . mysqli_connect_errno() . ")"
				);
		}
		return $cxn;
	}
?>

<?php
//  return password for username
//
	function get_password($cxn, $username) {
		$query  = "SELECT password ";	
		$query .= "FROM users ";
		$query .= "WHERE username = '{$username}' ";	
	echo "query is " . $query . "<br />"; 
	
		$result = mysqli_query($cxn, $query);
		if (!$result) {
			die("database query failed!");
		}
		
		while ($row = mysqli_fetch_assoc($result)) {
			$pwd = $row["password"];
			return $pwd;
		} 
	}
?>
