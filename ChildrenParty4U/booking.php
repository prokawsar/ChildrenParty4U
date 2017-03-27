<?php session_start();
	if(!isset($_SESSION['user'])  && !isset($_SESSION['admin'])){
		header('location: login.php');
	}
	include 'retreive_data.php';
	include 'user_currency.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Book a Party | Children Party 4 You</title>
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

    <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
    
    <!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
    
    <script src="assets/jquery-1.12.4.js"></script>
    <script src="assets/jquery-ui.js"></script>

    <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
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
			if(isset($_SESSION['user'])){
				include 'header.php';
			}else if(isset($_SESSION['admin'])){
				include 'admin/admin_header.php';
			} 
			?>
         <div class="page-content">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
						</div>


						<div class="center-block col-md-6">
						<!--SHOWING SUCCESSFUL MESSAGE-->
						<?php if(isset($_SESSION['book_ok'])){ ?>
							<div class="alert alert-success" role="alert">
								<?php echo $_SESSION['book_ok'];
									unset($_SESSION['book_ok']);
								 ?>

							</div>
							<?php } ?>

							
							<h2 class="heading">Book a Party</h2>
							<div class="margin-bottom-30">&nbsp;</div>
						
                            <form class="form-auth-small" action="book_comp.php" method="post">
								
                                

								<div class="form-group">
                                    <label class="col-md-3 control-label">Party Type</label>
                                    <div class="col-md-9">
                                        <select class="form-control input-md" name="party_name" >
											<option value="null">Select a Package</option>
											<?php  while($row = mysqli_fetch_assoc($party_data)) {
												echo "<option value=".$row['party_id'] . ">". $row['party_type']. "    ( ". converti($row['cost_per_child']). "/child )</option>";
												
												}
											?>
                                            
                                        </select>
                                    </div>
							    </div>
								</br>
								</br>
								
									<!--http://stackoverflow.com/questions/24865496/displaying-a-html-select-value-in-the-same-page-->
									<!--http://stackoverflow.com/questions/19581683/get-value-of-div-content-using-jquery-->
								
								

                                <div class="form-group">
									<label class="control-label sr-only">Select a Date</label>
                                     <input class="form-control" type="text" id="datepicker" name="party_date" placeholder="Select a Date">
                                </div>

								<div class="form-group">
									<label class="control-label sr-only">Child No</label>
									<input type="text" class="form-control" id="country" name="child_no" placeholder="Total Number of Child">
								</div>
								
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-lg btn-block">Book Now</button>
									
								</div>
							</form>
					
						</div>

						<div class="col-md-3">
						</div>
					</div>
				</div>
			</div>
		</div>
        
        <?php include 'footer.php'; ?>
		
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
