<?php
	//Variables to hold permission details
	$servername = "localhost";
	$username = "cauPlayer";
	$password = "password1";
	$db = "caudatabase";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $db);

	// Check connection
	if ($conn->connect_error) {
    	die("Database connection failed: " . $conn->connect_error);
	}
	
	//Get user details from the request 
   	$gameRef = $_REQUEST['gameRef'];
	$fireID = $_REQUEST['fireUID'];

	$sql="SELECT FirebaseID, Avatar FROM cauusers WHERE GameNumber = '".$gameRef."'"; // SQL query statement

	$result = mysqli_query($conn,$sql); // Store the results of the SQL query in a variable

	if ($result->num_rows > 0) { // Echo the results back to results.html in the xhttp object ;
		while($row = $result->fetch_assoc()) {
        	echo $row['FirebaseID'] . ",".$row['Username'] . ",".$row['Avatar'] . ",";
    	}
    }

	$conn->close(); // Close the connection

?>
