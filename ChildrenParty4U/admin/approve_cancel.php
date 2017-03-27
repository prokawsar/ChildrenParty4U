<?php

include '../conn.php';
include '../mail_sender.php';
	    
        $id = $_GET['id'];
        $user_id = $_GET['user'];
         
        $user_data = "SELECT * FROM users where user_id = $user_id";
        $user_ = $conn->query($user_data);

            foreach($user_ as $row){
                $name = $row['name'];
                $email = $row['email'];
            }

        if($_GET['clicked'] === 'approve'){
            $sql = "UPDATE booking SET book_status= 1 WHERE book_id = $id";
       
            $mail->Body = 'Dear '.$name.",</br>Your booking has been Approved.</br>
            </br>Regards</br>Manager</br>Children Party 4 You</br> ";
        

        }elseif($_GET['clicked'] === 'cancel'){
            $sql = "UPDATE booking SET book_status= -1 WHERE book_id = $id";
            
            $mail->Body = 'Dear '.$name.",</br>Your booking has been Canceled due to some unexpected reason.</br>
            Please try some other days. </br>
            </br>Regards</br>Manager</br>Children Party 4 You</br> ";
           
        }
        elseif($_GET['clicked'] === 'delete'){
           $sql = "DELETE FROM party WHERE party_id = $id";
         
        }
        
        $mail->addAddress($email, $name);
        
        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }

        $conn->query($sql);

      header('location: admin.php');