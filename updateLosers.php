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

	$user = $_REQUEST['fireUID']; // Store the loser UID's that were passed over into variables
	/*$losertwo = $_REQUEST['loserID2'];
	$loserthree = $_REQUEST['loserID3'];
	$loserfour = $_REQUEST['loserID4'];*/

	/* Update SQL table to reflect the number of games played and lost */
	$sql = "UPDATE cauusers 
  	SET GamesPlayed = GamesPlayed+1
  	WHERE FirebaseID='$user';"; /* CURRENT USER */
  	/*OR FirebaseID='$losertwo'
  	OR FirebaseID='$loserthree'
  	OR FirebaseID='$loserfour';";*/

	if(mysqli_query($conn, $sql)) { // Echo out if the call was succesful or not (Development purposes);
    		echo "Updated the losers stats" . "<br>";
    		echo $loserone . " " . "<br>".$losertwo . " " . "<br>".$loserthree . " " . "<br>".$loserfour . " ". "<br>";
	} else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn); // Close the connection

?>