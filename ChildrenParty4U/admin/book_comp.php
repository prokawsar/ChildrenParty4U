<?php session_start();
    if( !isset($_SESSION['admin'])){
		header('location: login.php');
	}
  //include 'retreive_data.php';
 if($_POST){
  $date 	= $_POST['party_date'];
  $child_no 	= $_POST['child_no'];
  $party_id = $_POST['party_name'];
 } else{
   header('lcoation: booking.php');
 }
include '../conn.php';
 ?>

<!DOCTYPE html>

<html lang="en">
<head>
  <title>Booking Invoice</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Responsive Website Template">
  <meta name="author" content="The Develovers">
  <!-- CORE CSS -->
 <link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/elegant-icons.css" rel="stylesheet" type="text/css">
	<!-- THEME CSS -->
	<link href="../assets/css/main.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/my-custom-styles.css" rel="stylesheet" type="text/css">

  <!-- GOOGLE FONTS -->
  <link href='https://fonts.googleapis.com/css?family=Raleway:700,400,400italic,500' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700,300,300italic' rel='stylesheet' type='text/css'>
  <!-- FAVICONS -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/bravana144.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/bravana114.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/bravana72.png">
  <link rel="apple-touch-icon-precomposed" href="assets/ico/bravana57.png">
  <link rel="shortcut icon" href="assets/ico/favicon.ico">
 
</head>

<body>

    <?php
        include 'admin_header.php';
     ?>
    <div class="margin-bottom-30px">&nbsp;</div>
    <div class="margin-bottom-30px">&nbsp;</div>
    <div class="margin-bottom-30px">&nbsp;</div>

    <div class="page-content">
			<div class="container">
				<div class="row">

					<div class="col-md-3">
						
					</div>

					<div class="col-md-6">
						
						<h2><small>Order Invoice</small></h2>
            <form action="book_ok.php" method="post">
						<table class="table table-hover">
						<thead>
							<tr>
								
								<th>Info</th>
								<th>Details</th>
								
							</tr>
						</thead>
						<tbody>
             <?php
				
                $sql = "SELECT cost_per_child FROM party WHERE party_id =" .$party_id; // 1 Mean Booked
        
    						$book_data = $conn->query($sql);
              
                foreach($book_data as $row){
	  							$CPC = $row['cost_per_child'];
                }
                
                $cost = $CPC * $child_no;
                
                $sql = "SELECT party_type FROM party WHERE party_id =" .$party_id;
    						$party_ = $conn->query($sql);
              
                foreach($party_ as $row){
	  							$party_name = $row['party_type'];
                }
							 ?>
                <!--<tr> <td> Your Name: </td> </tr>-->
                <tr> <td> Date: </td> <?php echo "<td><input type='hidden' value='".$date."' name='date'</input>".$date."</td>"; ?> </tr>
                <tr> <td> Selected Party: </td> <?php echo "<td><input type='hidden' value='".$party_name."' name='party_name'</input>".$party_name."</td>"; ?> </tr>
                <tr>  <td> Cost Per Child: </td><?php echo "<td><input type='hidden' value='".$CPC."' name='cpc'</input>".$CPC."</td>"; ?></tr>
                <tr> <td> Total Child No: </td><?php echo "<td><input type='hidden' value='".$child_no."' name='child_no'</input>".$child_no."</td>"; ?></tr>
                <tr><td> Total Cost: </td> <?php echo "<td><input type='hidden' value='".$cost."' name='cost'</input>".$cost."</td>"; ?></tr>
                <input type="hidden" name="party_id" value="<?php echo $party_id; ?>"> </input>

							<?php //} ?>
						</tbody>
					</table>
              <div class="form-group">
                
                      <button type="submit" class="btn btn-primary btn-lg btn-block center-block">Place Booking</button>
              
                </div>
                    
          </form>
            
						<div class="margin-bottom-30px">&nbsp;</div>
						
					</div>
				</div>
					<!--END ROW-->
			<div class="col-md-3">
			</div>

		</div>
		<!-- END TESTIMONIAL -->
		
		<?php include '../footer.php'; ?>
		
	</div>

    </body>
    </html>
