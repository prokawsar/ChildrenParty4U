<?php

include '../conn.php';


	$type 	= $_POST['party_type'];
	$cost = $_POST['cost_child'];
	$party_length 	= $_POST['party_length'];
	$max 	= $_POST['max_child'];
	$product 	= $_POST['product'];
	$desc = $_POST['description'];
	$image = $_FILES["image"]["tmp_name"];

	$flag = true;
	if(is_uploaded_file($_FILES["image"]["tmp_name"])){
		$image = $_FILES["image"]["name"];
		echo "True";
	
	}else if(isset($_GET['true'])){
		$image = $_GET['imagel'];
	//	$image = $_FILES["image"]["name"];
		echo "False";
		$flag = false;
	}


if(isset($_GET['true'])){
	$id = $_GET['id'];
	$sql = "UPDATE party SET party_type='$type', description='$desc', max_child='$max', cost_per_child='$cost',
			party_length='$party_length', service='$product', images='$image' WHERE party_id=$id";

} else{
	$sql = "INSERT INTO party (party_type, description, max_child, cost_per_child, party_length, service, images)
	VALUES ('$type', '$desc', '$max','$cost','$party_length','$product','$image')";

}

	if ($conn->query($sql)) {
	//  echo "New record created successfully";

		if(!isset($_GET['true']) || $flag){
			//File upload
			 include 'fileupload.php';
		}

		header('location: admin.php');
		
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();


