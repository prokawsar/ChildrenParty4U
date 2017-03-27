<?php 
session_start();
if(isset($_SESSION['admin'])){
	unset($_SESSION['admin']);
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Children Party 4 You</title>
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
</head>

<body>
	<!-- WRAPPER -->
		<?php include 'header.php'; ?>
		<!-- END NAVBAR -->
		<!-- HERO UNIT -->
		<section class="hero-unit hero-fullwidth fullwidth-image hero-rotating-words">
			<div class="hero-content">
				<div class="container">
					<h2 class="heading">Party Management for Children</h2>
					<p class="lead">Made <span id="rotating-words" class="rotating-words">with love &amp; passion, for your next party, to save your time</span></p>
					<a href="booking.php" class="btn btn-primary btn-lg">PURCHASE</a> <a href="all-packages.php" class="btn btn-default btn-lg">SEE ALL PACKAGES</a>
				</div>
			</div>
		</section>
		<!-- END HERO UNIT -->
		<!-- OUR PORTFOLIO -->
	
		<!-- END OUR PORTFOLIO -->
		<!-- STORY -->
		<section>
			<div class="container">
				<h2 class="section-heading">Booking Process</h2>
				<div class="tabbed-content-chronological">
					<div class="tab-content">
						<div class="tab-pane fade in active" id="story-2005">
							<div class="media">
								<div class="media-left">
									<img src="assets/img/bg-story-beginning.png" alt="Background Story">
								</div>
								<div class="media-body padding-left-30">
									<h3>The Beginning</h3>
									<p>Completely </p>
									<p>Proactively exploit focused paradigms rather than technically sound solutions. Professionally recaptiualize emerging methods of empowerment with proactive bandwidth. Dramatically supply professional strategic theme.</p>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="story-2007">
							<div class="media">
								<div class="media-left">
									<img src="assets/img/bg-story-known.png" alt="Background Story">
								</div>
								<div class="media-body padding-left-30">
									<h3>Make a Account</h3>
									<p>Collaboratively e-enable parallel growth strategies via pandemic schemas. </p>
									<p>Synergistically infomediaries rather than interactive scenarios. Quickly deliver maintainable could happen through online application.</p>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="story-2008">
							<div class="media">
								<div class="media-left">
									<img src="assets/img/bg-story-winner.png" alt="Background Story">
								</div>
								<div class="media-body padding-left-30">
									<h3>Choose a Package</h3>
									<p></p>
									<p>Competently</p>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="story-2010">
							<div class="media">
								<div class="media-left">
									<img src="assets/img/bg-story-funded.png" alt="Background Story">
								</div>
								<div class="media-body padding-left-30">
									<h3>Make a Booking</h3>
									<p>Dramatically supply adaptive imperatives and stand-alone content. Seamlessly pursue exceptional solutions after web-enabled potentialities. Synergistically negotiate alternative best practices whereas professional "outside the box" thinking.</p>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="story-2016">
							<div class="media">
								<div class="media-left">
									<img src="assets/img/bg-story-rising.png" alt="Background Story">
								</div>
								<div class="media-body padding-left-30">
									<h3>Complete Process</h3>
									<p>Progressively envisioneer clicks-and-mortar services with state of the art growth strategies. Efficiently syndicate interactive infrastructures through open-source human capital. Competently plagiarize future-proof applications without world-class portals. Interactively envisioneer excellent imperatives vis-a-vis value-added sources. Dramatically benchmark go forward sources via.</p>
									<p></p>
								</div>
							</div>
						</div>
					</div>
					<div class="custom-tabs-circle">
						<ul class="nav" role="tablist">
							<li class="active"><a href="#story-2005" role="tab" data-toggle="tab">1st Step</a></li>
							<li><a href="#story-2007" role="tab" data-toggle="tab">2nd Step</a></li>
							<li><a href="#story-2008" role="tab" data-toggle="tab">3rd Step</a></li>
							<li><a href="#story-2010" role="tab" data-toggle="tab">4th Step</a></li>
							<li><a href="#story-2016" role="tab" data-toggle="tab">5th Step</a></li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<!-- END STORY -->

		<?php include 'footer.php'; ?>
		
	</div>
	<!-- END WRAPPER -->
	<!-- JAVASCRIPT -->
	<script src="assets/js/jquery-2.1.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/plugins/easing/jquery.easing.min.js"></script>
	<script src="assets/js/plugins/morphext/morphext.min.js"></script>
	<script src="assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>
	<script src="assets/js/bravana.js"></script>
	

	
	<!-- END DEMO PANEL -->
</body>

