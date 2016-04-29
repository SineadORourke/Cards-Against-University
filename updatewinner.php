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

	// Store winners UID that has been passed across 
	$fireUID = $_REQUEST['winnerID'];

	/*  Update SQL table to add credits and coins to winner as well as increasing personal stats */
	$sql = "UPDATE cauusers 
  	SET Credits = Credits+5, Coins = Coins+5, GamesPlayed = GamesPlayed+1, GamesWon = GamesWon+1
  	WHERE FirebaseID='$fireUID';";

	if(mysqli_query($conn, $sql)) { // Check the succes of the call (development purposes)
    		echo "Updated the winners stats";
	} else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn); // Close the connection

?>