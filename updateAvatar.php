<?php
	//Variables to hold permission details
	$servername = "localhost";
	$username = "cauPlayer";
	$password = "password1";
	$db = "caudatabase";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $db);

	// Check connection
	if (mysqli_connect_error()) {
    	die("Database connection failed: " . mysqli_connect_error());
	}
	
	//Get firebaseID from the request 
	$fireUID=$_REQUEST['fireUID'];
	$avatar=$_REQUEST['avatar'];
    
	
	//Select all the user details which correspond to the firebaseID
    $sql = "UPDATE CAUUsers SET Avatar = '$avatar' WHERE FirebaseID = '$fireUID'";
	$result = mysqli_query($conn, $sql); 

	$conn->close(); // Close the connection
?>