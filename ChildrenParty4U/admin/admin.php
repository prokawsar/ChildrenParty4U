<?php session_start();
	if(!isset($_SESSION['admin'])){
		header('location: ../error_page.php');
	}

	include '../retreive_data.php';
 ?>

<!DOCTYPE html>

<html lang="en">
<head>
	<title>Admin Panel | Children Party 4 You</title>
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
	<!--JS AND CSS FOR DATEPICKER-->
	<script src="../assets/jquery-1.12.4.js"></script>
    <script src="../assets/jquery-ui.js"></script>

    <link rel="stylesheet" href="../assets/jquery.ui.css">
	<script type="text/javascript">
		// THIS DATES WILL BE BOOKED FROM DB
		// http://stackoverflow.com/questions/10220642/pass-php-array-into-javascript-array
		// https://jsfiddle.net/prokawsar/jqb5gwe8/1/

			var unavailable_hash = (() => {
				let unavailable = {};
				var jArray = <?php echo json_encode($dates); ?>;
				
				jArray.map((date) => {

						let [year, month, day] = date.split('-').map((x) => parseInt(x));
						return `${year}-${month}-${day}`;

					}).forEach((date) => {
						unavailable[date] = false;
					});
			
				return unavailable;
			})();

		var current_date = new Date();
		current_date.setDate(current_date.getDate() - 1);

		// http://stackoverflow.com/questions/3605214/javascript-add-leading-zeroes-to-date
		// var MyDateString = current_date.getFullYear() + '-' + ('0' + (current_date.getMonth()+1)).slice(-2) + '-' +('0'+ (current_date.getDate())).slice(-2);


		$(function() {
		$("#datepicker").datepicker({
			minDate: -0,
			maxDate: "+1M +15D",
			dateFormat: 'yy-mm-dd',
			beforeShowDay: (date) => {
			let date_str = `${date.getFullYear()}-${date.getMonth()+1}-${date.getDate()}`;

			let logic = date < current_date;
			logic = logic || (date_str in unavailable_hash && unavailable_hash[date_str] === false);
			

			if (logic) {
				return [false, '', 'Unavailable'];
			} else {
				return [true, '', 'Available'];
			}
			}
			});
		});

    </script>
</head>

<body>
	<!-- WRAPPER -->
        <?php include 'admin_header.php'; ?>
		<!-- END NAVBAR -->

        <div class="page-header">
			<div class="container">
				<h1 class="page-title pull-left">ADMIN PANEL</h1>
				
			</div>
		</div>
		<!-- PARTY WITH EDITABLE -->
        <div class="container">

		<h2>Booked and Available Dates</h2>
		<div class="margin-bottom-30">&nbsp;</div>
		
		<div class="row">
			<div class="col-md-4"> </div>
			<div class="center-block col-md-4">
				<div class="center-block" id="datepicker"></div>
			</div>
		</div>
		
        	<!--<div class="row">
				<?php// foreach($party_data as $row){
							// $id[] = $row['party_id'];
				 ?>
					<div class="col-sm-6 col-md-4">
						<div class="thumbnail">
							<img src="../assets/img/<?=$row['images']?>" alt="">
							<div class="caption">
								<h4><?=$row['party_type']?></h4>
								<p><?=$row['description']?></p>
								<a href="update_party.php?id=<?=$row['party_id']?>" class="btn btn-primary" role="button">Edit</a> <a href="#" class="btn btn-default" role="button">Delete</a>
							</div>
						</div>
					</div>
				<?php //} ?>

			</div>-->
			<div class="row">
			<div class="margin-bottom-30">&nbsp;</div>
       		 <h2> Current Party </h2>
				<table class="table table-striped">
						<thead>
							<tr>
								<th>Image </th>
								<th>Party Name</th>
								<th>Party Description</th>
								<th>Cost Per Child</th>
								<th>Max Child</th>
								<th>Action</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
						<?php foreach($party_data as $row){
				 			?>
							<tr>
								<td><img src="../assets/img/<?=$row['images']?>" width="120" height="100"/></td>
								<td><?=$row['party_type']?></td>
								<td><?=$row['description']?></td>
								<td><?=$row['cost_per_child']?></td>
								<td><?=$row['max_child']?></td>
								<td><a href="update_party.php?id=<?=$row['party_id']?>" class="btn btn-primary" role="button">Edit</a></td>
								<td><a href="approve_cancel.php?id=<?=$row['party_id']?>&clicked=delete" class="btn btn-danger" role="button">Delete</a></td>
							
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			<div class="margin-bottom-30">&nbsp;</div>

			<h2> Party Booking Request </h2>
			<div class="row">
				<table class="table table-striped">
						<thead>
							<tr>
								
								<th>Client Name</th>
								<th>Party Type</th>
								<th>Date</th>
								<th>Action</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
						<?php foreach($booking_data as $row){
							$user_id = $row['user_id'];
							$party_id = $row['party_id'];

							$user_data = "SELECT name FROM users where user_id = $user_id";
				            $user_ = $conn->query($user_data);
							
							$party_data = "SELECT party_type FROM party where party_id = $party_id";
				            $party_ = $conn->query($party_data);
							
							foreach($user_ as $temp){
								echo "<tr><td>".$temp['name']."</td>";
							} 
							foreach($party_ as $temp){
								echo "<td>".$temp['party_type']."</td>";
							 } ?>
							<td><?=$row['party_date']?></td>
							
								<td><a  href="approve_cancel.php?id=<?=$row['book_id']?>&clicked=approve&user=<?=$row['user_id']?>" name="approve" type="submit" class="btn btn-primary">Approve</a></td>
								<td><a href="approve_cancel.php?id=<?=$row['book_id']?>&clicked=cancel&user=<?=$row['user_id']?>" name="cancel" type="submit" class="btn btn-warning">Cancel</a></td>
								
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
        </div>
		
		<!-- TESTIMONIAL -->
		
		<!-- END TESTIMONIAL -->
		
		<?php include '../footer.php';?>
	

	</div>
	<!-- END WRAPPER -->
	<!-- JAVASCRIPT -->
	<!--<script src="assets/js/jquery-2.1.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/plugins/easing/jquery.easing.min.js"></script>
	<script src="assets/js/plugins/morphext/morphext.min.js"></script>
	<script src="assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>
	<script src="assets/js/bravana.js"></script>
	-->
	<script>
	function del_confirm() {
				var flag = confirm('Are you sure you want to DELETE this party from database?');
				if (flag == true) {	
				//	$sql = "DELETE FROM party WHERE party_id = $id";
				//	$conn->query($sql);
				
				} else {
					
				}
			}
    </script>

	
	<!-- END DEMO PANEL -->
</body>

