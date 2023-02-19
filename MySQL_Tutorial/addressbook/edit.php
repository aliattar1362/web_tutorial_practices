<?php
session_start();

// if user is not logged in
if ( !$_SESSION['loggedInUser'] ) {
	
	// send them to the login page
	header("Location: index.php");
}

// get ID sent by GET collection
$clientId = $_GET['id'];

// connect to database
include('includes/connection.php');

// connect to database
include('includes/functions.php');

// query the database with client ID
$query = "SELECT * FROM clients WHERE id='$clientId'";
$result = mysqli_query(  $conn, $query );

if ( mysqli_num_rows($result) > 0 ) {
	
	// we have data!
	// set some variables
	$row = mysqli_fetch_assoc( $result);

	//echo $clientId;
	$clientName    = $row['name'];
	$clientEmail   = $row['email'];
	$clientPhone   = $row['phone'];
	$clientAddress = $row['address'];
	$clientCompany = $row['company'];
	$clientNotes   = $row['notes'];
	$nameError      = "";
	$emailError     = "";
} else { // No result returned
	$alertMessage = "<div class='alert alert-warning'>Nothing to see here. <a href='clients.php'>Head back</a></div>";
}

if( !isset($alertMessage) ) {
	$alertMessage = "";
}

$nameError = "";
$emailError = "";

	// if the add button was submitted
	if ( isset( $_POST['save'] ) ) {
		
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
			
			//echo "ID = $clientId";
			// create query
			$query =" UPDATE clients SET
				name='$clientName',
				email='$clientEmail',
				phone='$clientPhone',
				address='$clientAddress',
				company='$clientCompany',
				notes='$clientNotes'
				WHERE id='$clientId' ";
			$result = mysqli_query( $conn, $query );
			/*$row = mysqli_fetch_assoc( $result);
			echo $row['phone'];*/

			// if query was successful
			if ( $result ) {
				
				// redirect to client page with query string
				header( "Location: clients.php?alert=updatesuccess" );
			} else {

				// something went wrong
				echo "Error: ". $query ."<br>". mysqli_error($conn);
			}
		}
	}

	// if delete button was submitted
	if ( isset($_POST['delete']) ) {
		
		$alertMessage = "<div class='alert alert-danger'>
							<p>Are you sure you want to delete this client? No take backs!</p><br>
							<form action='". htmlspecialchars( $_SERVER['PHP_SELF'] ) ."?id=$clientId' method='post'>
								<input type='submit' class='btn btn-danger btn-sm' name='confirm-delete' value='Yes, delete!'>
								<a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Ooops, no thanks!</a>
							</form>
						</div>";
	}
	
	//print_r($_POST);
	// if confirm-delete button was submitted
	if ( isset($_POST['confirm-delete']) ) {
		//echo $clientId;
		// new database query & result
		$query = "DELETE FROM clients WHERE id='$clientId'";
		$result = mysqli_query( $conn, $query );

		if ( $result ) {
			
			// redirect to client page with query string
			header("Location: clients.php?alert=deleted");
		} else {

			// something went wrong
			echo "Error: ". $query ."<br>". mysqli_error($conn);
		}
	}

	// close the mysql connection
	mysqli_close($conn);

include('includes/header.php');
?>

<h1>Edit Client</h1>

<?php echo $alertMessage; ?>
<form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>?id=<?php echo $clientId; ?>" method="post" class="row">
	<div class="form-group col-sm-6">
		<label for="client-name">Name *</label>
		<?php echo $nameError; ?>
		<input type="text" class="form-control input-lg" id="client-name" name="clientName" value="<?php echo $clientName; ?>">
	</div>
	<div class="form-group col-sm-6">
		<label for="client-email">Email *</label>
		<?php echo $emailError; ?>
		<input type="email" class="form-control input-lg" id="client-email" name="clientEmail" value="<?php echo $clientEmail; ?>">
	</div>
	<div class="form-group col-sm-6">
		<label for="client-phone">Phone</label>
		<input type="text" class="form-control input-lg" id="client-phone" name="clientPhone" value="<?php echo $clientPhone; ?>">
	</div>
	<div class="form-group col-sm-6">
		<label for="client-address">Address</label>
		<input type="text" class="form-control input-lg" id="client-address" name="clientAddress" value="<?php echo $clientAddress;?>">
	</div>
	<div class="form-group col-sm-6">
		<label for="client-company">Company</label>
		<input type="text" class="form-control input-lg" id="client-company" name="clientCompany" value="<?php echo $clientCompany;?>">
	</div>
	<div class="form-group col-sm-6">
		<label for="client-notes">Notes</label>
		<textarea class="form-control input-lg" id="client-notes" name="clientNotes" value="<?php echo $clientNotes; ?>"></textarea>
	</div>
	<div class="col-sm-12">
		<hr>
		<button type="submit" class="btn btn-lg btn-danger pull-left" name="delete">Delete</button>
		<div class="pull-right">
			<a style="margin-right: 3px;" href='clients.php' type="button" class="btn btn-default btn-lg">Cancel</a>
	
			<button type="submit" class="btn btn-success btn-lg pull-right" name="save">Save</button>
		</div>
	</div>
	
</form>


<?php
include('includes/footer.php')
?>