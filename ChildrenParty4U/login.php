<?php session_start();
	if(isset($_SESSION['user'])){
		header('Location: home.php');
	}
 ?>

<!DOCTYPE html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | </title>
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
	<div class="wrapper">

		<div class="cta cta-solid-brand-bg cta-2-columns margin-top-50">
			
		</div>
	<div class="margin-bottom-30">&nbsp;</div>
	
	<div id="container">
		<div class="row">
						<div class="col-md-4">
						</div>
						<div class="center-block col-md-4">
							<?php if(isset($_SESSION['error'])){ ?>
							<div class="alert alert-danger" role="alert">
								<?php echo $_SESSION['error']; ?>
							</div>
							<?php } ?>
							<h2 class="heading">Sign In</h2>
							<div class="margin-bottom-30">&nbsp;</div>

							<form class="form-auth-small" action="log_comp.php" method="post">
								
								<div class="form-group">
									<label class="control-label sr-only">Username</label>
									<input type="text" class="form-control" id="country" name="username" placeholder="Username" required>
								</div>
								<div class="form-group">
									<label for="signup-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" name="password" id="signup-password" placeholder="Password" required>
								</div>
								
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-lg center-block pull-right">Sign In</button>
									
								</div>
							</form>
							<p>Don't' have an account? Here <a href="signup.php">Sign Up</a></p>
						</div>

						<div class="col-md-4">
						</div>
					</div>
				</div>

		<!-- FOOTER -->
		<?php include 'footer.php'; ?>

	</div>
</div>
	<!-- END WRAPPER -->
	<!-- JAVASCRIPT -->
	
</body>
</html>
