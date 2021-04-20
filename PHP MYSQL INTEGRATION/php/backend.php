<?php
//start session
session_start();

//Connect to the database
$hostname = "localhost";
$username = "root";
$pass = "";
$database = "project1";

$sql = new mysqli($hostname, $username, $pass, $database);
if(mysqli_connect_error()) {
	echo "Could not connect to the database: ".$sql->error;
} 


// Signing up
if(isset($_POST["firstname"])) {
	//Recieve inputs

	$firstName = $_POST["firstname"];
	$lastName = $_POST["surname"];
	$username = $_POST["username"];
	$dob = $_POST["dob"];
	$contact = $_POST["phone"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$password2 = $_POST["password2"];

	//Check database for same email
	$user_query = "SELECT * FROM users WHERE email = '$email'";
	$user_result = $sql->query($user_query);
	if($user_result->num_rows > 0) {
		echo "This email account is already registered";
	} else {
		if($password1 != $password2) {
			echo "Passwords are not the same";
		} else {
			//sign up
			$signup = "INSERT INTO users(fname, lname, sn, dob, contact, email, password) VALUES ('$firstName', '$lastName', '$sn', '$dob', '$contact', '$email', '$password1')";

			if($sql->query($signup)) {
				$_SESSION["email"] = $email;
				echo "registered";
			} else {
				echo "user not registered: ".$sql->error;
			}
		}
	}

}


//Signing In
if(isset($_POST["email2"])) {
	//Recieve inputs

	$email = $_POST["email2"];
	$password1 = $_POST["password"];

	//sign in
	$user_query = "SELECT * FROM users WHERE email = '$email' AND password = '$password1'";
	$user_result = $sql->query($user_query);

	if($user_result->num_rows > 0) {
		$_SESSION["email"] = $email;
		echo "logged";
	} else {
		echo "Email or password is incorrect";
	} 

}

?>