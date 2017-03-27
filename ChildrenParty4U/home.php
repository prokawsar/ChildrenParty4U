<?php session_start();
	if(!isset($_SESSION['user'])){
		header('location: login.php');
	}
	include 'retreive_data.php';
	include 'user_currency.php';

	unset($_SESSION['error']);
	
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>User Dashboard | Children Party 4 You</title>
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
			
		<?php
		 include 'header.php'; ?>
		
		<!--CURRENCY-->
		<!--http://stackoverflow.com/questions/14096066/jquery-ajax-post-and-refresh-page-content-without-reload-page-->
	
		<!-- AVAILABLE DATES -->
		
		<section>
			

			<!--<div class="form-group">
				<a href="booking.php"><input type="button" class="btn btn-primary btn-lg btn-block" value="BOOK YOUR PARTY"></a>
							
			</div>-->
			
			<div class="container">
				<p> Your Currency Set as: <?php echo $_SESSION['curr']; ?> </p>
				<h2>Available Dates</h2>
					<div class="margin-bottom-30">&nbsp;</div>

				<div class="row">
					<div class="col-md-4"> </div>
					<div class="center-block col-md-4">
						<div class="center-block" id="datepicker"></div>
					</div>
				</div>
			</div>
		</section>
		<section>
			<div class="container">
				<h2 class="section-heading">Our Packages</h2>
				<div id="carousel-portfolio-card" class="owl-carousel carousel-nav-hidefirst carousel-portfolio-card">
					<?php foreach($party_data as $row){ ?>
					<div>
						<div class="portfolio-card">
							<img src="assets/img/<?=$row['images']?>" class="img-responsive" alt="Portfolio">
							<div class="info">
								<h3 class="title"><?=$row['party_type']?></h3>
								<p><?=$row['description']?></p>
								<p>Cost Per Child: <?php convert($_SESSION['curr'], $row['cost_per_child'])?></p>
				                <p>Max Child Could Attend: <?=$row['max_child']?></p>
								<a href="booking.php" class="btn btn-primary btn-sm">BOOK NOW <i class="fa fa-angle-right"></i></a>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>

			</div>
		</section>
		<!-- END OUR PORTFOLIO -->
		
	
		
		<!-- END TESTIMONIAL -->
		
		<?php include 'footer.php'; ?>
		
	</div>
	<!-- END WRAPPER -->
	<!-- JAVASCRIPT -->
	<!--<script src="assets/js/jquery-2.1.1.min.js"></script>-->
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/plugins/easing/jquery.easing.min.js"></script>
	<script src="assets/js/plugins/morphext/morphext.min.js"></script>
	<script src="assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>
	<script src="assets/js/bravana.js"></script>
	 
	 
	
	<!-- END DEMO PANEL -->
</body>
