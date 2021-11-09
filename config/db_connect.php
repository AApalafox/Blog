<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "myappdb";
	// connect to the database
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}
?>