<?php
	// $servername = "localhost";
	// $username = "root";
	// $password = "";
	// $dbname = "myappdb";
	// // connect to the database
	// $conn = mysqli_connect($servername, $username, $password, $dbname);

	// // check connection
	// if(!$conn){
	// 	echo 'Connection error: '. mysqli_connect_error();
	// }

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "myappdb";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	// echo "Connected successfully";

	


?>