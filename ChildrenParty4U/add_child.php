<?php session_start();
    if(!isset($_SESSION['user'])){
		header('location: login.php');
	}
  //include 'retreive_data.php';
 ?>

<!DOCTYPE html>

<html lang="en">
<head>
  <title>Child Information</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Responsive Website Template">
  <meta name="author" content="The Develovers">
  <!-- CORE CSS -->
  <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="assets/css/elegant-icons.css" rel="stylesheet" type="text/css">
  <!-- THEME CSS -->
  <link href="assets/css/main.css" rel="stylesheet" type="text/css">
  <link href="assets/css/my-custom-styles.css" rel="stylesheet" type="text/css">

  <!-- GOOGLE FONTS -->
  <link href='https://fonts.googleapis.com/css?family=Raleway:700,400,400italic,500' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700,300,300italic' rel='stylesheet' type='text/css'>
  <!-- FAVICONS -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/bravana144.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/bravana114.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/bravana72.png">
  <link rel="apple-touch-icon-precomposed" href="assets/ico/bravana57.png">
  <link rel="shortcut icon" href="assets/ico/favicon.ico">
  <!--JS AND CSS FOR DATEPICKER-->
	<script src="assets/jquery-1.12.4.js"></script>
    <script src="assets/jquery-ui.js"></script>

    <link rel="stylesheet" href="assets/jquery.ui.css">

   <script>
     $(function() {
		$("#datepicker").datepicker({
			minDate: "-20Y",
			maxDate: "+0",
			dateFormat: 'yy-mm-dd',
		
		});
     });
  </script>
  
</head>

<body>

    <?php include 'header.php'; ?>
    <div class="margin-bottom-30px">&nbsp;</div>
    <div class="margin-bottom-30px">&nbsp;</div>
    <div class="margin-bottom-30px">&nbsp;</div>

    <div class="page-content">
			<div class="container">
				<div class="row">

					<div class="col-md-3">
						
					</div>

					<div class="col-md-6">
						
						<h2><small>Add New Child</small></h2>
						<form action="child_comp.php" method="post" id="masked-input-demo" class="form-horizontal label-left">
							<div class="form-group">
								<label for="phone" class="col-xs-6 col-sm-3 control-label">Child name
								</label>
								<div class="col-xs-6 col-sm-9">
									<input type="text" class="form-control" name="child_name" required>
								</div>
							</div>

							<div class="form-group">
								<label for="cost-per-child" class="col-xs-6 col-sm-3 control-label"> Birth Date
								</label>
								<div class="col-xs-6 col-sm-9">
									<input type="text" class="form-control" placeholder="yyyy-mm-dd" id="datepicker"name="birth_date" required>
								</div>
							</div>
					
							<div class="form-group">
								<label for="product-key" class="col-xs-6 col-sm-3 control-label" >Age
									
								</label>
								<div class="col-xs-6 col-sm-9">
									<input type="text"class="form-control" id="age" name="age" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label for="product-key" class="col-xs-6 col-sm-3 control-label">Gender
									
								</label>
								<div class="col-xs-6 col-sm-9">
								
                                    <select class="form-control input-md" onchange=""  id ="gender" name="gender" required>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                     
                                    </select>
								</div>
							</div>
							
								<hr>
								<button type="submit" class="btn btn-primary btn-lg pull-right"><i class="fa "></i> Submit</button>
						</form>		

						<div class="margin-bottom-30px">&nbsp;</div>
						
					</div>

				</div>
					<!--END ROW-->
			
			<div class="col-md-3">
			</div>

			<h2> My Children </h2>
			<div class="row ">
				<table class="table table-hover">
						<thead>
							<tr>
								
								<th>Child Name</th>
								<th>Birth Date</th>
								<th>Age</th>
								<th>Gender</th>
								
							</tr>
						</thead>
						<tbody>
						<?php
						include 'conn.php';
							$sql = "SELECT * FROM children WHERE user_id =". $_SESSION['ID']; // 1 Mean Booked
    						$child_data = $conn->query($sql);
						 foreach($child_data as $row){
							
								echo "<tr><td>".$row['child_name']."</td>";
								echo "<td>".$row['child_bdate']."</td>";
								echo "<td>".$row['age']."</td>";
								echo "<td>".$row['gender']."</td>";
							?>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
		</div>
		<!-- END TESTIMONIAL -->
		
		<?php include 'footer.php'; ?>
		
	</div>
	<script type="text/javascript">
		$(document).ready(function(date) {  
			var current_date = new Date();
			

			$("#datepicker").change(function(event) {
				var total = "";
				 var date = $('#datepicker').val() 
				//alert(date);
				//total = date;

				function getAge(dateString) {
						var today = new Date();
						var birthDate = new Date(dateString);
						var age = today.getFullYear() - birthDate.getFullYear();
						var m = today.getMonth() - birthDate.getMonth();
						if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
							age--;
						}
						return age;
					}
					
				total = getAge(date);
				if (total == 0) {
					$('#age').val('0');
				} else {                
					$('#age').val(total);
				}
			});
		});    
	</script>

    </body>
    </html>