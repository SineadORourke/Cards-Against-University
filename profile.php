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
    
	
	//Select all the user details which correspond to the firebaseID
    $sql = "SELECT * FROM CAUUsers WHERE FirebaseID = '$fireUID'";
	$result = mysqli_query($conn, $sql);

	//Printing out the result set
	while($row = mysqli_fetch_array($result)){
		
		//Simple if else statement to determine someone's degree status based on their credits
		$credits = $row['Credits'];
		if($credits<100){
			$degreeString="Undergrad";
		}else if($credits<200){
			$degreeString="Bachelor Arts";
		}else{
			$degreeString="PHD";
		}

		//Calculate the success rate/percentage
		if($row['GamesPlayed']==0){
			$percentage = 0;
		}else{
			$percentage = ceil(($row['GamesWon']/$row['GamesPlayed'])*100);
		}

		
		//Prints out the user's details in a bootstrap grid
		echo "<div class='container-fluid'>";
		echo "<div class='col-sm-6' id='leftProfile'>";
		echo "</br><div><img src='avatars/".$row['Avatar']."' alt 'Default Logo' width='350' height='350' id='avatar'></div></br></br>"; //Print user's avatar
		echo "<div><button id='changeAvatar' onclick='changeAvatar()'>Change Avatar</button></div></div>";//button to change avatar
		echo "<div class='table-responsive col-sm-6' id='rightProfile'>";
		echo "<div id='printStats'><h1 id='user'>".$row['Username']."</h1>";				//Print user's username
		echo "<h2 id='statusProfile'>Degree: ".$degreeString."</h2>";			//Print their degree status
		echo "<br/>";
		echo "<table class='table' id='profileTable'>";
		echo "<tr><td id='profileData'>Credits</td><td id='profileData'>".$row['Credits']."</td></tr>";				//Print credits
		echo "<tr><td id='profileData'>Coins</td><td id='profileData'>".$row['Coins']."</td></tr>";					//Print coins
		echo "<tr><td id='profileData'>Games Played</td><td id='profileData'>".$row['GamesPlayed']."</td></tr>";	//Print games played
		echo "<tr><td id='profileData'>Games Won</td><td id='profileData'>".$row['GamesWon']."</td></tr>";			//Print games won
		echo "<tr><td id='profileData'>Success Rate</td><td id='profileData'>".$percentage."%</td></tr>";			//Print success rate
		echo "</table></div></div>";
		
		

	}	

	mysqli_close($conn); // Close connection to DB

?>


