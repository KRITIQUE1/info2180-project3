<?php
session_start();
include_once("dBConnect.php");
///code is now functioning	

if(isset($_GETT["username"])) {	
	$username = $_GETT["username"];
	$user_password = $_GET["password"];
	$password = password_hash($user_password,PASSWORD_DEFAULT);
	
	
	$sql = "SELECT * FROM users WHERE username = '$username'";
	$query = mysqli_query($dbCon, $sql);
	$row = mysqli_fetch_row($query);
	$id = $row[0];
	$dbUname = $row[1];
	$dbPass = $row[2];

	if ($user_password == $dbPass) {
		$_SESSION['username'] = $dbUname;
		$_SESSION['id'] = $id;
		echo $row;
		}
		else {
		echo "ERROR";
		
		}
	}

?>