<?php
session_start();

// if user is not logged in
if ( !$_SESSION['loggedInUser'] ) {
	
	// send them to the login page
	header("Location: index.php");
}

// connect to database
include('includes/connection.php');

// connect to database
include('includes/functions.php');

$clientName = $clientEmail = $clientPhone = $clientAddress = $clientCompany = $clientNotes = $nameError = $emailError = "";
	// if the add button was submitted
	if ( isset( $_POST['add'] ) ) {
		
		// check to see if inputs are empty
		// creat variables with form data
		// wrap data with validate function
		if ( !$_POST['clientName'] ) {
			$nameError = "Please enter a name <br>";
		} else {
			$clientName = validateFormData( $_POST['clientName'] );
		}
		if ( !$_POST['clientName'] ) {
			$emailError = "Please enter an email <br>";
		} else {
			$clientEmail = validateFormData( $_POST['clientEmail'] );
		}

		// these inputs are not required
		// so we'll ust store whatever has been entered
		$clientPhone = validateFormData( $_POST['clientPhone'] );
		$clientAddress = validateFormData( $_POST['clientAddress'] );
		$clientCompany = validateFormData( $_POST['clientCompany'] );
		$clientNotes = validateFormData( $_POST['clientNotes'] );

		// if required fields have data
		if ( $clientName && $clientEmail ) {
			
			// create query
			$query ="INSERT INTO clients (id, name, email, phone, address, company, notes, date_added) VALUES (NULL, '$clientName', '$clientEmail', '$clientPhone', '$clientAddress', '$clientCompany', '$clientNotes', CURRENT_TIMESTAMP)";
			$result = mysqli_query( $conn, $query );

			// if query was successful
			if ( $result ) {
				
				// refresh page with query string
				header( "Location: clients.php?alert=success" );
			} else {

				// somthing went wrong
				echo "Error: ". $query ."<br>". mysqli_error($conn);
			}
		}
	}

	// close the mysql connection
	mysqli_close($conn);

include('includes/header.php');
?>

<h1>Add Client</h1>

<form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post" class="row">
	<div class="form-group col-sm-6">
		<label for="client-name">Name *</label>
		<?php echo $nameError; ?>
		<input type="text" class="form-control input-lg" id="client-name" name="clientName" value="">
	</div>
	<div class="form-group col-sm-6">
		<label for="client-email">Email *</label>
		<?php echo $emailError; ?>
		<input type="email" class="form-control input-lg" id="client-email" name="clientEmail" value="">
	</div>
	<div class="form-group col-sm-6">
		<label for="client-phone">Phone</label>
		<input type="text" class="form-control input-lg" id="client-phone" name="clientPhone" value="">
	</div>
	<div class="form-group col-sm-6">
		<label for="client-address">Address</label>
		<input type="text" class="form-control input-lg" id="client-address" name="clientAddress" value="">
	</div>
	<div class="form-group col-sm-6">
		<label for="client-company">Company</label>
		<input type="text" class="form-control input-lg" id="client-company" name="clientCompany" value="">
	</div>
	<div class="form-group col-sm-6">
		<label for="client-notes">Notes</label>
		<textarea class="form-control input-lg" id="client-notes" name="clientNotes" value=""></textarea>
	</div>
	<div class="col-sm-12">
		<a href='clients.php' type="button" class="btn btn-default btn-lg">Cancel</a>
	
		<button type="submit" class="btn btn-success btn-lg pull-right" name="add">Add Client</button>
	</div>
	
</form>


<?php
include('includes/footer.php')
?>