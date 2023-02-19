<?php 

	include('connection.php');

?>

<!DOCTYPE html>

	<html>
		<head>

			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width-device-width, initial-scale=1">

			<title>Password Hashing</title>

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
			<h1>Password Hashing</h1>

			<?php

				/*$password = password_hash( "mypassword", PASSWORD_DEFAULT );
				echo $password;*/

				$hashed_password = '$2y$10$INEasUAD9idIKKTXL2N1ruXlAmgtJd4EZ5kNKNvWuCeRoSjojHy5K';

				if ( isset( $_POST['login'] ) ) {
					if ( password_verify( $_POST['password'], $hashed_password ) ) {
						echo "Password is Correct!";
					} else{
						echo "Inorrect password!";
					}
				}

			?>

			<form action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>" method="post">
				<label>* Password</label>
				<input type="password" placeholder="Password" name="password"> <br><br>
				
				<input type="submit" class="btn btn-default" name="login" value="Log in">
			</form>

		</div>
		<!-- Bootstrap JS -->
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>