<?php

	session_start();

?>


<!DOCTYPE html>

	<html>
		<head>

			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width-device-width, initial-scale=1">

			<title>Profile Page</title>

			<!-- Bootstrap CSS -->
			<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    		<!--[if lt IE 9]>
      			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   	 		<![endif]-->
		</head>
	<body>
		<div class="container">
			<h1>Profile Page</h1>
			<p class="lead">Welcome <?php echo $_SESSION['loggedInUser']; ?>!</p>

			<p>Your email address is: <?php echo $_SESSION['loggedInEmail']; ?></p>
		
			<p><a class="btn btn-danger btn-sm" href="logout.php">Log out</a></p>

		</div>
		<!-- Bootstrap JS -->
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>