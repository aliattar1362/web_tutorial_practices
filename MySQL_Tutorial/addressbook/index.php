<?php
	session_start();

	if ( !isset( $_SESSION['loggedInUser'] ) ) {
		$_SESSION['loggedInUser'] = "";
	}
	

	include('includes/functions.php');
	//include('includes/connection.php');

	$loginError = "";
	$formEmail = "";
	// if login form was submitted
	if ( isset( $_POST['login'] ) ) {
		
		// creat variables
		// wrap data with validate function
		$formEmail = validateFormData( $_POST['email'] );
		$formPass = validateFormData( $_POST['password'] );

		// connect to database
		include('includes/connection.php');

		// create query
		$query = "SELECT name, password FROM users WHERE email='$formEmail'";

		// store the result
		$result = mysqli_query( $conn, $query );
		
		// verify if result is returned
		if ( mysqli_num_rows($result) > 0 ) {
			
			// store basic user data in variables
			while ( $row = mysqli_fetch_assoc($result) ) {
				$name       = $row['name'];
				$hashedPass = $row['password'];
			}

			// verify hashed password with submitted password
			if ( password_verify( $formPass, $hashedPass) ) {
				
				// correct ligin details!
				// store data in session variables
				$_SESSION['loggedInUser'] = $name;

				// redirect user to clients page
				header("Location: clients.php");
			} else { // hashed password didn't verify

				// error message
				$loginError = "<div class='alert alert-danger'>Wrong username / password combination. Try again.</div>";

			}
		} else { // there are no results in database
			$loginError = "<div class='alert alert-danger'>No such user!<a class='close' data-dismiss='alert'>&times;</a></div>";

		}

		// close mysql connection
		mysqli_close($conn);


	}

	
	include('includes/header.php');
?>


<h1>Client Address Book</h1>
<p class="lead">Log in to your account.</p>
			
<?php echo $loginError; ?>

<form class="form-inline" method="post" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>">
	<div class="form-group">
		<label for="login-email" class="sr-only">Email</label>
		<input type="email" placeholder="email" name="email" id="login-email" class="form-control" value="<?php echo $formEmail; ?>">
	</div>

	<div class="form-group">
		<label for="login-password" class="sr-only">Password</label>
		<input type="password" placeholder="password" name="password" id="login-password" class="form-control">
	</div>

	<button class="btn btn-primary" type="submit" name="login">Login</button>
				
</form>

<?php
include('includes/footer.php');
?>
