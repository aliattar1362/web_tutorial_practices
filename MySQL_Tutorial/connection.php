<?php

	$server     = "localhost";
	$username   = "root";
	$password   = "";
	$db         = "my_first_database";

	// creat a connection
	$conn = mysqli_connect( $server, $username, $password, $db );

	// check connection
	if (!$conn) {
		die( "Connection failed" . mysqli_connect_error() );
	}

	//echo "Connected successfully!";
?>