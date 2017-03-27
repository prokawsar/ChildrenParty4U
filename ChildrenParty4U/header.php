
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top ">
			<div class="container">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav-collapse">
					<span class="sr-only">Toggle Navigation</span>
					<i class="fa fa-bars"></i>
				</button>
				<a href="#" class="navbar-brand">
					<img src="assets/img/logo.png" alt="Bravana Logo">
				</a>
				
				<div id="main-nav-collapse" class="collapse navbar-collapse">
					<ul class="nav navbar-nav main-navbar-nav">
						<li>
							<a href="index.php" class="" ><i class="fa fa-home"></i> HOME </a>
						</li>

						
						<li class="dropdown ">
							<a href="all-packages.php" class="dropdown-toggle disabled" data-toggle="dropdown"><i class="fa fa-paper-plane"></i> PACKAGES <i class="fa fa-angle-down"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">PIRATE</a></li>
								<li><a href="#">BUILD A BEAR</a></li>
								
								<li><a href="#">STAR WARS</a></li>
							</ul>
						</li>
						<?php if (isset($_SESSION['user'])){ ?>
						<li>
							
							<a href='booking.php' class='btn' ><i class='fa fa-hand-pointer-o'></i>BOOK YOUR PARTY</a>
								
						</li>
						<li>
							<a href='add_child.php' class='btn' ><i class='fa fa-heart'></i>MY CHILD</a>
						<?php }
							 ?>
							 </li>
						<li class="dropdown ">
							<a href="#" class="dropdown-toggle disabled" data-toggle="dropdown"><i class="fa fa-user"></i> MY ACCOUNT <i class="fa fa-angle-down"></i></a>
							<ul class="dropdown-menu" role="menu">
							  <?php if (!isset($_SESSION['user'])){ ?>

								<li><a href="login.php">SIGN IN</a></li>
								<li><a href="signup.php">REGISTER</a></li>
								<?php
                                  } else{
                                    echo '<li><a href="home.php">MY DASHBOARD</a></li>';
									echo '<li><a href="log_out.php">LOG OUT</a></li>';
								  }
                                ?>
								
							</ul>
						</li>
						
					</ul>
				</div>
				<!-- END MAIN NAVIGATION -->
		</div>
	</nav>
