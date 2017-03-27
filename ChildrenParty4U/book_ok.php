

<?php

session_start();

  $date 	= $_POST['date'];
  $child_no 	= $_POST['child_no'];
  $party_id = $_POST['party_id'];
  $cost = $_POST['cost'];

  include 'conn.php';

 

  $id = $_SESSION['ID'];

  $sql = "INSERT INTO booking (user_id, party_id, no_of_child, book_cost, party_date)
  VALUES ( '$id', '$party_id', '$child_no', '$cost', '$date')";

  if ($conn->query($sql)) {
    //  echo "New record created successfully";
    header('location: booking.php');
    $_SESSION['book_ok'] = "Your booking has been placed. Please wait for Confirmation. Thanks";
 
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
?>