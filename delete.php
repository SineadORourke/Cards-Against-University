<?php
$servername = "localhost"; 		// Store servername into a variable
	$username = "cauPlayer";	// Store username of table into a variable for access
	$password = "password1";	// Store Table password into a variable for access
	$dbname = "caudatabase";	// Store DB password into a variable for access

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname); // Create a connection to the DB/Table
	// Check connection
	if ($conn->connect_error) { // Display error if unsucessful 
	    die("Connection failed: " . $conn->connect_error);
	} 


	if (isset($_POST['delete'])){ // If instruction passed is to delete then run the following code

		$id=$_POST['selector'];	// Set contents to value of selector id 

		$N = count($id); // Variable N will count the number of id's passed

	for($i=0; $i < $N; $i++) // Loop through query results
	{
		$result = mysqli_query($conn, "DELETE FROM caudatabase.cauusers where UserID='$id[$i]'"); // Query to delete selected id's from DB
	}
	header("location: admin.php"); // Set header
	$conn->close();					// Close connection to DB
	}
?>
