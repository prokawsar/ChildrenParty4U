<?php

include 'conn.php';
session_start();


$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];
$country = $_POST['country'];
$currency = $_POST['currency'];
$child = $_POST['child_no'];



    $sql = "INSERT INTO users (name, user_name, email, password, country, currency, no_of_child)
	VALUES ('$name', '$username', '$email', '$pass', '$country', '$currency', '$child')";

	if ($conn->query($sql) === TRUE) {
	 //   echo "New record created successfully";
	    $_SESSION['succMsg'] ="You have signed up successfully";
	    header('location: login.php');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

