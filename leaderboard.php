<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    

    <title>Leaderboard</title>
	<link rel="stylesheet" href="cauStyle.css">

	<!-- Firebase library -->
    <script src='https://cdn.firebase.com/js/client/2.4.1/firebase.js'></script>
	
	<!--Links for Bootstrap-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
  
	</head>
	
	
	

<body data-spy="scroll" data-target=".navbar" data-offset="50" id="main"> 

	<!-- Navigation Bar
    ================================================== -->
	<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197" id="navigationColour">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
				<img src="avatars/logo.png" alt="logo" id="Logo">
				<p class="navbar-brand">Cards Against University : Leaderboard</p>
			</div>
			<div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<!-- Navigation options centered -->
				<ul class="nav navbar-nav">
					<li><a href="main.html#section1">Home</a></li>
					<li><a href="gameInPlay.html">Play</a></li>
					<li><a href="#">Leaderboard</a></li>
					<li><a href="main.html#section2">How to Play</a></li>
					<li class="dropdown navbar-right" id="profile"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Profile <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="profilePage.html">Personal Stats</a></li>
						</ul>
					</li>
				</ul>
				<!-- Navigation option to the right -->
				<ul class="nav navbar-nav navbar-right">
					<li onclick="logOut()"><a href="welcome_page.html"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				</ul>
			</div>
			</div>
		</div>
	</nav><!-- ./navigation Bar -->    
	
	
	
	<!--Leaderboard Header with dropdown menu-->
	<div>
	<h1 id="leaderHeader">Cards Against University Leaderboard: 
	<select name="edition">
    <option value="Maynooth Edition">Maynooth Edition</option>
    <option value="Trinity Edition">Trinity Edition</option>
    <option value="UCC Edition">UCC Edition</option>
    <option value="All Editions">All Editions</option>
  </select></h1>
  </div>
  
  
  </br>
  </br>
<?php

// Store database/table references in variables
	$servername = "localhost";
	$username = "cauPlayer";
	$password = "password1";
	$dbname = "caudatabase";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error); // Display an error message when needed
	} 

	$sql = "SELECT Avatar, Username, Credits, University FROM caudatabase.cauusers ORDER BY Credits DESC"; // SQL select statement
	$leaderResult = mysqli_query($conn, $sql) or die(mysqli_connect_error()); // Store results in variable

	$leaderArray1 = array(); // Declare array variable

	while($row = mysqli_fetch_assoc($leaderResult)) { // Traverse results and store individual results in variable to display in HTML
		$item = array();
		$item['Avatar'] = $row['Avatar'];
		$item['Username'] = $row['Username'];
		$item['University'] = $row['University'];
		$item['Credits'] = $row['Credits'];
	    $leaderArray1[] = $item;
	}

	$conn->close(); // Close connection to db
?>
	
	<!--Top3 leaderboard-->	<div id="Leaderboard">
	<table class="table table-responsive" id="leaderTable">
				<tbody><?php
					$number = 0;

					foreach ($leaderArray1 as $index => $row): // Loop through results variable and display to HTML
					$number++;
					?>

					<tr id="leaderRow">
	
						<td class="leaderData"><?php echo $number?></td>
						<td class="leaderData"><image src="avatars/<?php echo $row['Avatar']?>" alt "Default Logo" width="100" height="100"></td>
						<td class="leaderData"><div style='width: 40px;'><?php echo $row['Username'] ?></div></td>
						<td class="leaderData"><div style='width: 40px;'><?php echo $row['University'] ?></div></td>
						<td class="leaderData"><div style='width: 40px;'><?php echo $row['Credits'] ?></div></td>

					</tr><?php endforeach;?>
				
				</tbody>
			</table>
		

	
		 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
	
	 </body>
</html>
