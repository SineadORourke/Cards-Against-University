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
	
	//Get user details from the request 
	$fireUID=$_REQUEST['fireUID'];
   	$username=$_REQUEST['username'];
    	$uni=$_REQUEST['uni'];
    
      	$sql = "INSERT INTO CAUUsers (FirebaseID, Username, Credits, Coins, Avatar, GamesPlayed, GamesWon, University, Votes, GameNumber, Submission, GamesLost) VALUES ('$fireUID', '$username', 0, 0, 'defaultavatar.png', 0, 0, '$uni', '', '', '', 0)";

	if (mysqli_query($conn, $sql)) {
    		echo "Added " . $sql . " to the database under UID: " . $fireUID;
	} else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

?>

