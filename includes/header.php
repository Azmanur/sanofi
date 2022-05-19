<?php
//  session_start();
//  include("includes/config.php");
//  ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include('includes/links.php') ?>
	<title>Header</title>
</head>

<body>
	<header>
		<div class="header-top-bar bg-success">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-8">
						<ul class="top-bar-info list-inline-item pl-0 mb-0">

							<?php if (strlen($_SESSION['login'])) {
							?>
								<li class="list-inline-item">
									| Welcome - <?php echo $_SESSION['name'] ?>
								</li>
							<?php } ?>
							<li class="list-inline-item">
								| <a href="mycart.php"><i class="icofont-cart"></i> My cart</a>
							</li>
							<li class="list-inline-item">
								| <a href="wishlist.php"> <i class="icofont-heart"></i> Wishlist</a>
							</li>
							<?php if (strlen($_SESSION['login']) == 0) {   ?>
								<li class="list-inline-item">
									| <a href="login.php"><i class="icofont-login"></i> User Login</a>
								</li>
								<li class="list-inline-item">
									| <a href="doc/login.php"><i class="icofont-login"></i> Doctor Login</a>
								</li>
								<li class="list-inline-item">
									| <a href="signup.php"><i class="icofont-sign-in"></i> Sign Up </a>
								</li>
							<?php } else { ?>
								<li class="list-inline-item">
									| <a href="my-account.php"><i class="icofont-user"></i> My Account
									</a>
								</li>
								<li class="list-inline-item">
									| <a href="logout.php"><i class="icofont-logout"></i> Logout </a>
								</li>
							<?php } ?>
						</ul>
					</div>

				</div>
			</div>
		</div>

		<div>
			<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
				<a class="navbar-brand" href="#">
					<img src="../images/logo.png" alt="logo" height="36">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse text-white" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto topnav">
						<li class="nav-item active">
							<a class="nav-link" href="index.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">About Us</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="services.php">Our Services</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="service.php">Services</a>
						</li>
						<?php if (strlen($_SESSION['login']) == 0) {
						?>
							<li class="nav-item"><a class="nav-link" href="#">My Profile</a></li>
						<?php } ?>
						<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
						<form class="form-inline" name="search" method="post" action="product_search.php">
							<input class="form-control mr-sm-2" type="search" name="medicine" placeholder="Search" aria-label="Search">
							<button class="btn btn-outline-primary my-2 bg-light" type="submit">
								<i class="icofont icofont-search"></i>
							</button>
						</form>
					</ul>
				</div>
			</nav>
		</div>
	</header>
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>