<?php
	session_start();

	// did the user's browser send a cookie for the session?
	if ( isset( $_COOKIE[ session_name() ] ) ) {
		
		//empty the cookie
		setcookie( session_name(), '', time()-86400, '/' );
	}

	// clear all sesion variables

	session_unset();

	// destroy the session
	session_destroy();

	echo "You've been log out! See you next time...";

	echo "<p><a href='login.php'>Log back in</a></p>"

	//print_r($_SESSION);
?>