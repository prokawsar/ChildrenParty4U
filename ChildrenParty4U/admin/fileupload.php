<?php
	$target_dir = "../assets/img/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST['party_type'])) {
		
		if($_FILES["image"]["size"] > 500000) {
			$uploadOk = 0;
			echo "<br>File Size is larger then 5MB.";
		} else {
			$uploadOk = 1;
		}
		
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			echo "<br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		
		if ($uploadOk == 0) {
			echo "<br>Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
			} else {
				echo "<br>Sorry, there was an error uploading your file.";
			}

		}
	}
?>