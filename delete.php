<?php
$servername = "localhost";
	$username = "cauPlayer";
	$password = "password1";
	$dbname = "caudatabase";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 


if (isset($_POST['delete'])){

$id=$_POST['selector'];

$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($conn, "DELETE FROM caudatabase.cauusers where UserID='$id[$i]'");
}
header("location: admin.php");
$conn->close();
}
?>
