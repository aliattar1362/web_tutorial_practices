<?php 

	include('connection.php');

	$username = "";
	$usernameError = "";
	$email = "";
	$emailError = "";
	$password = "";
	$passwordError = "";

	if ( isset( $_POST["add"] ) ) {
		
		// build a function that validates data
		function validateFormData( $formData ) {
			$formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
			return $formData;
		}

		// check to see if inputs are empty
		// creat variables with form data
		// wrap the data with our function

		

		if ( !$_POST["username"] ) {
			$usernameError = "Please enter your username <br>";
		} else {
			$username = validateFormData( $_POST["username"] );
		}

		if ( !$_POST["email"] ) {
			$emailError = "Please enter your email <br>";
		} else {
			$email = validateFormData( $_POST["email"] );
		}

		if ( !$_POST["password"] ) {
			$passwordError = "Please enter your Password <br>";
		} else {
			$password = password_hash( validateFormData( $_POST["password"] ), PASSWORD_DEFAULT);
		}

		// check to see if each variable has data
		if ( $username && $email && $password ) {
			$query = "INSERT INTO users (id, username, password, email, signup_date, biography)
				VALUES (NULL, '$username', '$password', '$email', CURRENT_TIMESTAMP, NULL)";

			if ( mysqli_query( $conn, $query ) ) {
					echo "<div class='alert alert-success'>New record in database!</div>";
				} else {
					echo "Error: ". $query . "<br>" . mysqli_error($conn);
				}
		}

	}


	/*
	MYSQL INSERT QUERY

	INSERT INTO users (id, username, password, email, signup_date, biography)
	VALUES (NULL, 'sinaalisamir', 'sinapassword', 'sina@emal.com', CURRENT_TIMESTAMP, 'hello! I'm Sina');

	*/
	mysqli_close($conn);

?>

<!DOCTYPE html>

	<html>
		<head>

			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width-device-width, initial-scale=1">

			<title>MySQL Insert</title>

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
			<h1>MySQL Insert</h1>

			<p class="text-danger">* Reqiured fields</p>

			<form action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>" method="post">
				<small class="text-danger">* <?php echo $usernameError; ?></small>
				<input type="text" placeholder="Username" name="username"> <br><br>
				<small class="text-danger">* <?php echo $emailError; ?></small>
				<input type="text" placeholder="Email" name="email"> <br><br>
				<small class="text-danger">* <?php echo $passwordError; ?></small>
				<input type="password" placeholder="Password" name="password"> <br><br>
				<input type="submit" name="add" value="Add Entry">
			</form>

		</div>
		<!-- Bootstrap JS -->
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>