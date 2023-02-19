<?php

	$server      = "localhost";
	$username    = "root";
	$password    = "";
	$db          = "db_clientaddressbook";

	// creat a connection
	$conn = mysqli_connect( $server, $username, $password, $db);

	// check connectio
	if( !$conn ){
		die( "conection failed: " . mysqli_connect_error() );
	}
?>