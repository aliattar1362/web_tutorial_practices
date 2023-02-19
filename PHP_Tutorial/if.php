<?php
	define("TITLE", "If, Else &amp; Elseif Statments");
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
			    // IF expression is true, do something
                // IF expression if FALSE, don't do anything
            
				$foo = 99;
				$bar = 79;
				if( $foo > $bar ) {
					echo "$foo is greater than $bar <br>";
				}

				// ELSE

				$currentlyListeningTo = "Anathema <br>";

				if ( $currentlyListeningTo == "Eleni karaindro" ) {
					echo "you are listening to $currentlyListeningTo";
				} else {
					echo "you are listening to $currentlyListeningTo";
				}

				// ELSEIF
				$faveProgrammingLang = "PHP";

				if ( $faveProgrammingLang == "PHP" ) {
					echo "your favorite programming language is $faveProgrammingLang";
				} elseif ($faveProgrammingLang == "C++") {
					echo "Good one! you dig $faveProgrammingLang";
				} else {
					echo "Guess you don't like PHP or C++. oh well...";
				}
			?>

		</div>
		<!-- Bootstrap JS -->
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>