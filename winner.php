<?php
	//Variables to hold permission details
	$servername = "localhost";
	$username = "username";
	$password = "1Arsenal";
	$db = "MyDB";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $db);

	// Check connection
	if ($conn->connect_error) {
    	die("Database connection failed: " . $conn->connect_error);
	}

	// Store users vote from the AJAX request 
	$q = $_GET['q'];

	/*  Update SQL table to retrieve users votes, UID and submission */
	$sql="SELECT Votes, FirebaseID, Username, Submission FROM cauusers WHERE GameNumber = '".$q."'";

	$result = mysqli_query($conn,$sql); // Store the results of the SQL query in a variable

	if ($result->num_rows > 0) { // Echo the results back to results.html in the xhttp object ;
		while($row = $result->fetch_assoc()) {
        	echo $row['Votes'] . "," . $row['FirebaseID'] . "," . $row['Username'] . "," . $row['Submission'] . ",";
    	}
    }

			mysqli_close($conn); // Close the connection

?>