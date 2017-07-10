<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$database = "db";
	$conn = mysqli_connect($host, $user, $pass, $database);
	if (!$conn)
		die("Error connecting to database");
?>