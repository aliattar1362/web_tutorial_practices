<?php
	define("TITLE", "Functions &amp; Arguments");
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

				function myFirstFunction() {
					$a = 0;

					do {
						echo "$a &nbsp;";
						$a++;
					} while( $a <= 100 );
				}

				// call the function
				myFirstFunction();

				function mySecondFunction( $a ) {
					do {
						echo "$a &nbsp;";
						$a++;
					} while( $a <= 10 );
				}

				// call the function
				// pass in an argument
				mySecondFunction(0);

				function addTogether( $num1, $num2 ) {
					$$newNum = $num1 + $num2;
					echo "$num1 + $num2 = $newNum";
				}

				// call the function
				addTogether( 2, 3);


			?>

		</div>

		<!-- jQuery -->
		<script>window.jQuery || document.write('<script src="js/jquery-3.1.1.js"><\/script>')</script>

		<!-- Bootstrap JS -->
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>