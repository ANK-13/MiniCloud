<?php


	$servername = "10.7.3.56";
	$username = "root";
	$password = "root";
	$dbname = "WebServices";

	$conn = mysqli_connect($servername, $username, $password, $dbname);
	

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
?>