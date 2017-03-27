<?php

include 'conn.php';
	//2. generate query to select all data from db table
	$sql = "SELECT * FROM party";
    $party_data = $conn->query($sql);


    $sql = "SELECT * FROM booking where book_status = 0";
    $booking_data = $conn->query($sql);

    $sql = "SELECT party_date FROM booking WHERE book_status = 1"; // 1 Mean Booked
    $booking_dates = $conn->query($sql);
    
    while($row = mysqli_fetch_assoc($booking_dates)) {
        $dates[] = $row['party_date'];
        // echo $id[$i];   
        // $i++;
	}
