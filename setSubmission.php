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
	$fireUID = $_REQUEST['fireUID'];
   	$Submission = $_REQUEST['Submission'];

	/*  Update SQL table to set users submission, based on their UID */
   	$sql = "UPDATE cauusers 
  	SET Submission='$Submission'
  	WHERE FirebaseID='$fireUID';";

	if(mysqli_query($conn, $sql)) { // Check status of call (development purposes)
    		echo "Added " . $sql . " to the database under UID: " . $fireUID;
	} else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	$conn->close(); // Close the connection

?>