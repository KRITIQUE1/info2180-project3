<?php
session_start();
session_destroy();
if(isset($_SESSION['username'])){
	unset($_SESSION['id']);
	unset($_SESSION['loggedin']);
	$msg ="You are now logged out";
	}
	else{
		$msg ="Could not log you out";
		}
	
?>
<html>
	<head>
		<title> CheapoMailHome </title>
		<link rel="stylesheet" type="text/css" href="../static/css/CheapoH.css">
	</head>
	<body>
		
	<div class="header">
	<img class="logo" src="../static/images/CHEAPOMAIL.png"/>
	
	</div>
	
	<?php $msg ?> <br>
	<p><a href="../index.php">Click here</a> to return to home page</p>
	</body>
</html>
