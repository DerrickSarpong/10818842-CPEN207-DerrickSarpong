<?php
session_start();

$hostname = "localhost";
$username = "root";
$pass = "";
$database= "Project1";

$sql = new mysqli($hostname, $username, $pass, $database);
if(mysqli_connect_error()) {
	echo "Could not connect to the database: ".$sql->error;
} 


if(!isset($_SESSION["email"])) {
	header("location: ../index.html");
} else {
	$email = $_SESSION["email"];

	$details = "SELECT * FROM users WHERE email = '$email'";
	$details_result = $sql->query($details);
	if($details_result->num_rows > 0) {
		while($info = $details_result->fetch_assoc()) {
			$fname = $info["fname"];
			$lname = $info["lname"];
         $username = $info["username"];
			$dob = $info["dob"];
			$contact = $info["contact"];
			$email = $info["email"];
         $password = $info["password"];
         $password2 = $info["confirmpassword"];
		}
	}

}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<p>Registered</p>
	<p>First Name: <?php echo $fname ?> </p>
   <p>Second Name: <?php echo $lname ?></p>
   <p>Username: <?php echo $username ?> </p>
	<p>Date of Birth: <?php echo $dob ?></p>
	<p>Contact: <?php echo $contact ?></p>
	<P>Email: <?php echo $email ?></P>
   <p>Password: <?php echo $password ?></p> 
   <p>Password2: <?php echo $confirmpassword ?></p> 
	<br>
	<button onclick="window.location = '../php/logOut.php';">Log Out</button>
	</body>
</html>

?>