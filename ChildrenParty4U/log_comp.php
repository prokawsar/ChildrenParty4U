<?php
session_start();
include 'conn.php';

$username = $_POST['username'];
$pass = $_POST['password'];


    $sql = "select * from users where user_name = '$username' and password = '$pass'";
	$row = $conn->query($sql);
	
	    if($row->num_rows == 1){
			// CHECKING IF USER IS A ADMIN
			foreach($row as $res){ 
				if($res['user_type'] == 1){
					$_SESSION['admin'] = $username;
					$_SESSION['ID'] = $res['user_id'];
					header('location: admin/admin.php');
				}else{
					// IF A USER STORE THEIR USERNAME, ID AND CURRENCY
					$_SESSION["user"] = $username;
					$_SESSION['ID'] = $res['user_id'];
					$_SESSION['curr'] = $res['currency'];
					header('Location: home.php');
				}
				break;
			}
			unset($_SESSION['error']);
	    }
	    else{
	    //	echo "Incorrect";
	    	 $_SESSION['error'] = "Invalid Username or Password";	
	    	 header('Location: login.php');
	    }


