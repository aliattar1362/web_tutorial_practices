<?php
	// FUNCTIONS.PHP

	//if( isset( $_POST["fix_submit"] ) ) {
	function checkForClickBait() {
		// grab value from textarea in $_POST collection
		// make all leters lwercase using strtlower() function
		// store in a variable
		$clickBait = strtolower( $_POST["clickbait_headline"] );

		// store arry of clickbait-sounding words or phrases
		$a = array(
				"scientists",
				"doctors",
				"hate",
				"stupid",
				"weird",
				"simple",
				"trick",
				"shocked me",
				"you'll never believe",
				"hack",
				"epic",
				"unbelievable"
			);

			// store array of replacement words or phrases
			/* make sure each replacement is in the same order as the click bait word you're tryimg to replace */
			$b = array(
				"so-called scientists",
				"so-called doctors",
				"aren't threatened by",
				"average",
				"completely normal",
				"ineffective",
				"method",
				"is no different than the others",
				"you wont really be surprised by",
				"slightly improve",
				"boring",
				"normal"
			);

			// use the str_replace() function to replace the words
			// uppercase the first letter in every word using ucwords() function
			// store in a variable
			$honestHeadline = str_replace($a, $b, $clickBait);

			// return an aray of the variables so we can access them globally
			return array($clickBait, $honestHeadline);
	}

	function displayHonestHeadline($clickBait, $honestHeadline) {
		// use ucwords() function to uppercase first letter in every word
		// echo the variable on the screen
		echo "<strong class='text-danger'>Original Headline</strong><h4>".ucwords($clickBait)."</h4><hr>";

		// echo the honest headline onthe screen
		echo "<strong class='text-success'>Honest Headline</strong><h4>".ucwords($honestHeadline)."</h4>";
	}
?>