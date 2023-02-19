<?php
	define("TITLE", "Loops");
?>
<!DOCTYPE html>

	<html>
		<head>

			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width-device-width, initial-scale=1">

			<title><?php echo TITLE; ?></title>

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
			<h1><?php echo TITLE; ?></h1>
			
			<?php

				// WHILE LOOP
				$startingNum = 50;
				while ( $startingNum <= 100 ) {
					echo "$startingNum &nbsp;";
					$startingNum++;
				}

				// FOR LOOP
				for ($i = 30; $i <= 40 ; $i++) { 
					echo "Number $i <br>";
				}

				// FOREACH LOOP
				$friends = array( "Jim", "Sandra", "kyle", "Cassandra" );

				foreach ($friends as $friend => $value) {
					
					// output each individual value in the array
					echo "$friend is my friend <br>";
				}

				// DO WHILE LOOP
				$foo = 10;
				do {
					// do this code
					echo "Numero $foo ";
					// increment by 1
					$foo++;
				} while ( $foo <= 50);
			?>

		</div>
		<!-- Bootstrap JS -->
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>