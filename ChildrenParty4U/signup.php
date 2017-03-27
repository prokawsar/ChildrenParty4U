<?php session_start();
	if(isset($_SESSION['user'])){
		header('Location: home.php');
	}
 ?>
 
<!DOCTYPE html>
<html lang="en" class="fullscreen-bg">
<head>
	<title>Sign Up </title>
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

<body class="layout-full">
	<!-- WRAPPER -->
	<?php include 'header.php'; ?>
	<div id="wrapper">
		<div class="cta cta-solid-brand-bg cta-2-columns margin-top-50">
			
		</div>
		
		<div class="page-content">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
						</div>
						<div class="center-block col-md-4">
							<h2 class="heading">Sign Up</h2>
							<div class="margin-bottom-30">&nbsp;</div>
							
							<form class="form-auth-small" action="reg_comp.php" method="post">
								
								<div class="form-group">
									<label class="control-label sr-only">Name</label>
									<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
								</div>
								<div class="form-group">
									<label for="signup-email" class="control-label sr-only">Email</label>
									<input type="username" class="form-control" name="email" id="signup-email" placeholder="Email" required>
								</div>
								<div class="form-group">
									<label class="control-label sr-only">Username</label>
									<input type="text" class="form-control" id="country" name="username" placeholder="Username" required>
								</div>
								<div class="form-group">
									<label for="signup-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" name="password" id="signup-password" placeholder="Password" required>
								</div>
								<div class="form-group">
									<label class="control-label sr-only">Country</label>
									<input type="text" class="form-control" id="country" name="country" placeholder="Country" required>
								</div>
								<div class="form-group">
									<label class="control-label sr-only">Child No</label>
									<input type="text" class="form-control" id="child_no" name="child_no" placeholder="No of Child You Have" required>
								</div>
								<div class="form-group">
									<label class="control-label sr-only">Currency</label>
									<select class="form-control input-md" onchange=""  id ="currency" name="currency" required>
                                        
                                        <option value="GBP">Select You Currency</option>
										<option value="GBP">GBP</option>
                                        <option value="USD">USD</option>
                                        <option value="EUR">EUR</option>
                                    </select>
								</div>

								
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-lg btn-block">Sign Up</button>
									
								</div>
							</form>
							<p>Already have an account? <a href="login.php">Sign In</a></p>
						</div>

						<div class="col-md-4">
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- FOOTER -->
		<?php include 'footer.php'; ?>

	</div>
	<!-- END WRAPPER -->
	<!-- JAVASCRIPT -->
	
</body>
</html>
