<?php session_start();
  include 'retreive_data.php';
  include 'user_currency.php';

  unset($_SESSION['error']);
 ?>

<!DOCTYPE html>

<html lang="en">
<head>
  <title>All Packages</title>
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
  
   <script>
      $("#changeCurrency").change(function(){
          currency = $('#changeCurrency option:selected').val() // get the selected option's value
          window.location='http://localhost/template/all-packages?currency=' + currency;
//          $("#curr_div").reload("all-packages.php?currency=" + currency);
        }).trigger('change');
  </script>
  
</head>

<body>
  <!-- WRAPPER -->
    <?php include 'header.php'; ?>
    
    <section>
      <div class="container">
      <select class="form-control input-md" onchange="window.location='http://localhost/template/all-packages.php?currency=' + this.value;"  id ="changeCurrency" name="changeCurrency">
				<option value="null">Select Currency</option>
        <option value="GBP">GBP</option>
				<option value="USD">USD</option>
				<option value="EUR">EUR</option>
			
			</select>
      
     

        <h2 class="section-heading">Our Packages</h2>
        <div id="carousel-portfolio-card" class="owl-carousel carousel-nav-hidefirst carousel-portfolio-card">
          <?php foreach($party_data as $row){ ?>
					<div>
						<div class="portfolio-card">
							<img src="assets/img/<?=$row['images']?>" class="img-responsive" alt="Portfolio">
							<div class="info">
								<h3 class="title"><?=$row['party_type']?></h3>
								<p><?=$row['description']?></p>
                <p>Cost Per Child: <?php
                if(isset($_GET['currency'])){
                  convert($_GET['currency'],$row['cost_per_child']);
                }else if(isset($_SESSION['curr'])){
                  convert($_SESSION['curr'],$row['cost_per_child']);
                 }
                 else{
                   echo "£".$row['cost_per_child'];
                 }
                 ?>
                 </p>

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
    
    
    
    <!-- PRICING -->
   
    <!-- END PRICING -->
    <!-- TESTIMONIAL -->
    
    <!-- END TESTIMONIAL -->
    
    <?php include 'footer.php'; ?>
  
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

