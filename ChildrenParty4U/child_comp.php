<?php

session_start();

$name 	= $_POST['child_name'];
$date 	= $_POST['birth_date'];
$age 	= $_POST['age'];
$gender = $_POST['gender'];

include 'conn.php';
  
  $id = $_SESSION['ID'];
  $sql = "INSERT INTO children (user_id, child_name, gender, child_bdate, age)
  VALUES ( '$id', '$name', '$gender', '$date', '$age')";

  if ($conn->query($sql)) {
    //  echo "New record created successfully";
    header('location: add_child.php');
 
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

?>



