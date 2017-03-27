<?php session_start();
	if(!isset($_SESSION['admin'])){
		header('location: ../error_page.php');
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add new party</title>
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
	<!-- WRAPPER -->
		<?php include 'admin_header.php'; ?>
		<!-- END NAVBAR -->
		<div class="page-content">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						
					</div>

					<div class="col-sm-6">
						
						<h2><small>Add New Party</small></h2>
						<form action="add_comp.php" method="post" id="masked-input-demo" class="form-horizontal label-left" enctype="multipart/form-data">
							<div class="form-group">
								<label for="phone" class="col-xs-6 col-sm-3 control-label">Type of Party
								</label>
								<div class="col-xs-6 col-sm-9">
									<input type="text" class="form-control" name="party_type">
								</div>
							</div>

							<div class="form-group">
								<label for="cost-per-child" class="col-xs-6 col-sm-3 control-label">Cost Per Child
								</label>
									<div class="col-xs-6 col-sm-9">
									
										<input type="text" class="form-control" name="cost_child">
										<span class="input-group-addon">£</span>
									</div>
							</div>
					
							<div class="form-group">
								<label for="product-key" class="col-xs-6 col-sm-3 control-label">Length of Party
									<br>
									<small>(In minute)</small>
								</label>
								<div class="col-xs-6 col-sm-9">
									<input type="number"class="form-control" name="party_length">
								</div>
							</div>
							<div class="form-group">
								<label for="product-key" class="col-xs-6 col-sm-3 control-label">Chdilren could Attend
									<br>
									<small>(Max child)</small>
								</label>
								<div class="col-xs-6 col-sm-9">
									<input type="number" class="form-control" name="max_child">
								</div>
							</div>
							<div class="form-group">
								<label for="product-key" class="col-xs-6 col-sm-3 control-label">Product / Services
									<br>
									<small>(Extra service)</small>
								</label>
								<div class="col-xs-6 col-sm-9">
									<input type="text" class="form-control" name="product">
								</div>
							</div>
							<div class="form-group note-group-select-from-files">
								<label>Select a Party Image</label>
								<input class="note-image-input form-control" type="file" name="image" accept="image/*" multiple="multiple">
							</div>
							<h2><small>Party Description</small></h2>
								<p>Write some description</p>
								<textarea id="textarea-counter-demo" name="description" class="textarea-counting form-control" rows="6" cols="30" maxlength="300"></textarea>
								<p class="help-block text-right js-textarea-help">
									<span class="text-muted"> characters remaining</span>
								</p>
								<hr>
								<button type="submit" class="btn btn-primary btn-lg pull-right"><i class="fa "></i> Submit</button>
						</form>		

						<div class="margin-bottom-30px">&nbsp;</div>
						
					</div>

				</div>

			</div>
			</div>
			<div class="col-md-3">
			</div>
		</div>
		
		<!-- END TESTIMONIAL -->
		
		<?php include '../footer.php'; ?>
		
	</div>
	<!-- END WRAPPER -->
	<!-- JAVASCRIPT -->
	<script src="../assets/js/jquery-2.1.1.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/plugins/easing/jquery.easing.min.js"></script>
	<script src="../assets/js/plugins/jquery-maskedinput/jquery.maskedinput.min.js"></script>
	<script src="../assets/js/plugins/datepicker/bootstrap-datepicker.js"></script>
	<script src="../assets/js/plugins/moment/moment.min.js"></script>
	<script src="../assets/js/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="../assets/js/plugins/clockpicker/bootstrap-clockpicker.min.js"></script>
	<script src="../assets/js/plugins/bootstrap-markdown/bootstrap-markdown.js"></script>
	<script src="../assets/js/plugins/bootstrap-markdown/markdown.js"></script>
	<script src="../assets/js/plugins/bootstrap-markdown/to-markdown.js"></script>
	<script src="../assets/js/plugins/summernote/summernote.min.js"></script>
	<script src="../assets/js/bravana.js"></script>
</body>

