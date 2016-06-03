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
	
	//Store user details from the request 
	$fireUID = $_REQUEST['fireUID'];
   	$vote = $_REQUEST['vote'];
   	$GameNumber = $_REQUEST['GameNumber'];
   	$Submission = $_REQUEST['Submission'];
    	
    /*  Update SQL table to add users votes and number game they are playing in */
  	$sql = "UPDATE cauusers 
  	SET Votes='$vote', GameNumber='$GameNumber'
  	WHERE FirebaseID='$fireUID';";

	if(mysqli_query($conn, $sql)) {  // Check the succes of the call (development purposes)
    		echo "Added " . $sql . " to the database under UID: " . $fireUID;
	} else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	$conn->close();  // Close the connection

?>
