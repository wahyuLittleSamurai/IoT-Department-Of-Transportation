<?php
	$servername = "localhost";
	$username = "id5292775_root";
	$password = "admin";
	$dbname = "id5292775_dbdishub";
	$link = mysqli_connect($servername,$username,$password) or die ("can't connect");
	mysqli_select_db($link, $dbname);
	if ($link->connect_error) {
			die("Connection failed: " . $link->connect_error);
	} 
	//echo "Connected successfully";
?>