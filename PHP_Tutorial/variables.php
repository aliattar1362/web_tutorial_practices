<?php
	define("TITLE", "PHP Variables & Constants");
?>
<!DOCTYPE html>

	<html>
		<head>
			<title><?php echo TITLE; ?></title>
		</head>
	<body>

		<?php
			
			// BOOLEAN: Aboolean variable specifies a value of tru or false
			$loggedIn = true;

			// INTEGER: An integer variable is any whole number
			$myAge = 25;

			// FLOATING POINT: Usually a fractional number,with a decimal
			$totalPrice = 146.28;

			// STRINGS: Simple text that must be enclosed whithin double quotations " " or single quotations ' '
			$fullName = "Ali Attarlamraski!";

			// DISPLAY VARIABLES ON SCREEN
			echo "Hello, my name is $fullName and I am $myAge years old!<br>";

			// CONSTANTS
			//define("TITLE", "PHP Variables & Constants");

			echo TITLE;

		?>

	</body>
</html>
