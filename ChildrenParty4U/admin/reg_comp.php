<?php
// ADMIN REGISTRATION DATA INPUT

include '../conn.php';
session_start();

$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];

if (!empty($name) && !empty($username) && !empty($email) && !empty($pass) ) {

    $sql = "INSERT INTO users (name, user_name, email, password, user_type)
	VALUES ('$name', '$username', '$email', '$pass', 1)";

	if ($conn->query($sql) === TRUE) {
	   // echo "New record created successfully";
	   // header('location: add_admin.php');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
else{
	$_SESSION['errMsg'] = "You must have to fill all Fields !";
	echo "You must have to fill all Fields !";

}
