<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    

    <title>Admistration</title>
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

  <body>
    <!-- Affix Navigation Bar
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
        <p class="navbar-brand">Cards Against University</p>
      </div>
      
      <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <!-- Navigation options centered -->
        <ul class="nav navbar-nav">

        </ul>
        <!-- Navigation option to the right -->
        <ul class="nav navbar-nav navbar-right">
          <li onclick="logOut()"><a href="index.html"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
      </div>
      </div>
    </div>
  </nav><!-- ./navigation Bar -->   

  </br>
   <!--UserID, FirebaseID, Username, Credits, Coins, GamesPlayed, GamesWon, University, GamesLost-->

   <center><h1>Global Stats</h1></center>

    <div class="row-fluid">
        <div class="span12">
            <div class="container">
<br><br>
              <form method="post" action="delete.php" >
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="adminBoard">
                            <div class="alert alert-info">
                                <strong><i class="icon-user icon-large"></i>&nbsp;Delete Multiple Data</strong>
                &nbsp;&nbsp;Check the radio Button and click the Delete button to Delete Data 
                            </div>
                            <thead>
                                <tr> <!--Table row names-->
                                    <th>UserID</th>
                                    <th>FirebaseIB</th>
                                    <th>UserName</th>
                                    <th>Credits</th>
                                    <th>Coins</th>
                                    <th>Games Played</th>
                                    <th>Games Won</th>
                                    <th>University</th>
                                    <th>GamesLost</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
        <?php 

      $servername = "localhost"; // Store servername in variable
			$username = "cauPlayer";   // Store username of DB in variable
			$password = "password1";   // Store password of DB in variable
			$dbname = "caudatabase";   // Store DB password in variable

          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          } 

          // Store result of SQL query in a variable called query
          $query=mysqli_query($conn, "select UserID, FirebaseID, Username, Credits, Coins, GamesPlayed, GamesWon, University, GamesLost from caudatabase.cauusers")or die(mysqli_connect_error());
          
          // Traverse results of query
          while($row=mysqli_fetch_array($query)){
          $id=$row['UserID'];

        ?>
                              
        <tr id="adminRow">
          <td id="adminData"><?php echo $row['UserID'] ?></td>      <!--Display User ID-->
          <td id="adminData"><?php echo $row['FirebaseID'] ?></td>  <!--Display Firebase ID-->
          <td id="adminData"><?php echo $row['Username'] ?></td>    <!--Display Username--> 
          <td id="adminData"><?php echo $row['Credits'] ?></td>     <!--Display Users Credits-->
          <td id="adminData"><?php echo $row['Coins'] ?></td>       <!--Display Users coins-->
          <td id="adminData"><?php echo $row['GamesPlayed'] ?></td> <!--Display Users number of games played-->
          <td id="adminData"><?php echo $row['GamesWon'] ?></td>    <!--Display Users number of games won-->
          <td id="adminData"><?php echo $row['University'] ?></td>  <!--Display Users University-->
          <td id="adminData"><?php echo $row['GamesLost'] ?></td>   <!--Display Users number of games lost-->
         
        <td>
          <input name="selector[]" type="checkbox" value="<?php echo $id; ?>"> <!--Display users ID in form-->
          </td>
              </tr>
                         
                <?php } $conn->close();?> <!--Close connection to DB-->
        </tbody>
      </table>
            <input type="submit" class="btn btn-danger" value="Delete" name="delete"> <!--Button to delete user-->
          
</form>

        </div>
        </div>
        </div>
    </div>



  </body>

  </html>