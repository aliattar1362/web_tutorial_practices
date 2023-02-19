<?php
session_start();

// if user is not logged in
if ( !$_SESSION['loggedInUser'] ) {
	
	// send them to the login page
	header("Location: index.php");
}

// connect to database
include('includes/connection.php');

// query & result
$query = "SELECT * FROM clients";
$result = mysqli_query( $conn, $query );


// check for query string
if ( isset( $_GET['alert'] ) ) {
	
	// new client added
	if ( $_GET['alert'] == 'success' ) {
		$alertMessage = "<div class='alert alert-success'>New client added! <a class='close' data-dismiss='alert'>&times;</a></div>";
	} elseif ( $_GET['alert'] == 'updatesuccess' ) {
		$alertMessage = "<div class='alert alert-success'>The client was updated! <a class='close' data-dismiss='alert'>&times;</a></div>";
	}elseif ( $_GET['alert'] == 'deleted' ) {
		$alertMessage = "<div class='alert alert-success'>The client was deleted! <a class='close' data-dismiss='alert'>&times;</a></div>";
	}
} else {
	$alertMessage = "";
}

// close the mysql connection
mysqli_close( $conn );

include('includes/header.php');
?>

<h1>Client Address Book</h1>

<?php echo $alertMessage; ?>
<table class="table table-striped table-bordered">
	<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Phone</th>
		<th>Address</th>
		<th>Company</th>
		<th>Notes</th>
		<th>Edit</th>
	</tr>
	<?php

	if ( mysqli_num_rows( $result ) > 0 ) {
		
		// we have data!
		// output the data

		while ( $row = mysqli_fetch_assoc($result) ) {
			echo "<tr><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['phone']."</td><td>".$row['address']."</td><td>".$row['company']."</td><td>".$row['notes']."</td>";
			echo '<td><a href="edit.php?id='.$row['id']. '" type="button" class="btn btn-primary btn sm"><span class="glyphicon glyphicon-edit"></span><a></td></tr>';

		}

	} else { // if no entries
		echo "<div class='alert alert-info'>There is no client in your address book yet!</div>";
	}

	//mysqli_close( $conn );

	?>

	<tr>
	<td colspan="7">
		<div class="text-center"><a type="button" href="add.php" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus"></span> Add Client</a></div>
	</td>
	</tr>

</table>

<?php
include('includes/footer.php')
?>