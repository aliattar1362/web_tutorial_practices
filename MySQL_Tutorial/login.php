<?php

	/*
		STEPS WE NEED TO TAKE...

		1. Build Login HTML form
		2. Check if form has been submitted
		3. Validate form data
		4. Add form data to variables
		5. Connect to database
		6. Query database for username submitted to database
		6.1		If no entries: show error message
		7. Store basic user data from database in variables
		8. Verify stored hashed password with the one submitted in hthe form
		8.1		If invalid: show error message
		9. Start a session & creat session variables
		10. Redirect to a "profile page"
		10.1	Provide link to logout page
		10.2	Add cookie clear to logout page
		10.3	Provide link to log back include
		11. Close the MySQL connection

	*/

	$loginError = "";

	if ( isset( $_POST['login'] ) ) {
		
		// build a function that validates data
		function validateFormData( $formData ) {
			$formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
			return $formData;
		}

		// create variables
		// wrap the data with our function
		$formUser = validateFormData($_POST['username']);
		$formPass = validateFormData($_POST['password']);

		// connect to database
		include('connection.php');

		// create SQL query
		$query = "SELECT username, email, password FROM users WHERE username='$formUser'";

		$result = mysqli_query( $conn, $query );

		// verify if the result is returned
		if (mysqli_num_rows($result) > 0) {
			
			// store basic user data in variables
			while ( $row = mysqli_fetch_assoc($result) ) {
				$user       = $row['username'];
				$email      = $row['email'];
				$hashedPass = $row['password'];
			}

			// verify hashed password with the typed password
			if ( password_verify( $formPass, $hashedPass ) ) {
				
				// correct login details!
				// start the session
				session_start();

				// store data in SESSION variable
				$_SESSION['loggedInUser'] = $user;
				$_SESSION['loggedInEmail'] = $email;

				header("location: profile.php");
			} else {

				// error  message
				$loginError = "<div class='alert alert-danger'>Wrong username / password combination. Try again.</div>";

			}
		} else { // there are no results in database

			$loginError = "<div class='alert alert-danger'>No such user in database. Please try again. <a class='close' data-dismiss='alert'>&times;</a></div>";

		}

		// close the mysql connection
		mysqli_close($conn);
	}

?>

<!DOCTYPE html>

	<html>
		<head>

			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width-device-width, initial-scale=1">

			<title>Login</title>

			<!-- Bootstrap CSS -->
			<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
			<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    		<!--[if lt IE 9]>
      			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   	 		<![endif]-->
		</head>
	<body>
		<div class="container">
			<h1>Login</h1>
			<p class="lead">Use this form to log in to your account</p>
			
			<?php echo $loginError; ?>

			<form class="form-inline" method="post" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>">
				<div class="form-group">
					<label for="login-username" class="sr-only">Username</label>
					<input type="text" placeholder="username" name="username" id="login-username" class="form-control">

					<label for="login-password" class="sr-only">Password</label>
					<input type="password" placeholder="password" name="password" id="login-password" class="form-control">
				</div>

				<button class="btn btn-default" type="submit" name="login">Login</button>
				
			</form>

		</div>

		<!-- jQuery -->
		<!--<script type="text/javascript" src="//code.jquery.com/jquery-3.1.1.min.js"></script>-->
		<script type="text/javascript" src="js/jquery-3.1.1.js"></script>

		<!-- Bootstrap JS -->
		<!--<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>