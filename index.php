<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<?php

// MY CART
if (isset($_GET['action']) && $_GET['action'] == 'add') {
	$id = intval($_GET['pid']);
	if (isset($_SESSION['cart'][$id])) {
		$_SESSION['cart'][$id]['quantity']++;
	} else {
		$sql_p = "SELECT * FROM medicine WHERE id={$id}";
		$query_p = mysqli_query($con, $sql_p);

		if (mysqli_num_rows($query_p) != 0) {
			$row = mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row['id']] = array("quantity" => 1, "price" => $row_p['medicinePrice']);
		} else {
			$message = "Product ID is invalid";
		}
	}
	echo "<script>alert('Product has been added to the cart')</script>";
	echo "<script type='text/javascript'> document.location ='mycart.php'; </script>";
}

?>

<style>

</style>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Sanofi</title>
	<?php include('includes/links.php') ?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
</head>

<body style="background-color: #e4e4e4;">
	<?php include('includes/header.php') ?>

	<!-- Banner Start -->
	<section class="banner">
		<div class="container">
			<div class="row">
				<div class=" col-md-6 ">
					<div class="block">
						<h1 style="margin-top:50px; font-size:60px; color:black; text-shadow: 1px 1px 2px white;">Delivering Medicine to
							<span style="font-weight: bold; color:gold; text-shadow: 1px 1px 1px white;">Your Doorstop!</span>
						</h1>
						<p style="color:black;">We are providing you this opportunity to buy authentic medicine from online, you can buy your desireable medicine and take our service.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Banner End -->

	<section class="features">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="feature-block d-lg-flex">
						<div class="feature-item mb-5 mb-lg-0">
							<div class="feature-icon mb-4" style="text-align: center;">
								<i class="icofont-medicine"></i>
							</div>
							<h4 class="mb-3" style="text-align: center;"><span style="color: #E12454;">100% </span>Authentic Products</h4>
							<p class="mb-4" style="text-align: center;">We only collect our products from well known company.</p>
							<p class="mb-4" style="text-align: center;">
								<a href="product_search.php" class="btn btn-main">Search Products</a>
							</p>
						</div>

						<div class="feature-item mb-5 mb-lg-0">
							<div class="feature-icon mb-4" style="text-align: center;">
								<i class="icofont-clock-time"></i>
							</div>
							<h4 class="mb-3" style="text-align: center;"><span style="color: #E12454;">24/7 </span>Service</h4>
							<p class="mb-4" style="text-align: center;">We give our customer 24 hour service everyday.</p>
							<p class="mb-4" style="text-align: center;">
								<a href="#" class="btn btn-main">See Services</a>
							</p>
						</div>

						<div class="feature-item mb-5 mb-lg-0">
							<div class="feature-icon mb-4" style="text-align: center;">
								<i class="icofont-delivery-time"></i>
							</div>
							<h4 class="mb-3" style="text-align: center;"><span style="color: #E12454;">Fast </span>Delivery</h4>
							<p style="text-align: center;">We deliver our customers order as fast as we can.</p>
							<p class="mb-4" style="text-align: center;">
								<a href="#" class="btn btn-main">Shop Now</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Shop area -->

	<!-- Featured -->
	<section class="shop" style="height:2100px">
		<div class="col-md-12 mt-100" style="text-align:center; padding:50px;">
			<h1>Featured <span style="color:#E12454">Products</span></h1>
		</div>


		<div class="col-md-12">
			<div class="container">
				<div class="row">
					<?php
					$get_product = "select * from medicine where feature='yes' order by 1 DESC LIMIT 0,6 ";
					$run_products = mysqli_query($con, $get_product);

					while ($row_product = mysqli_fetch_array($run_products)) {

						$pro_id = $row_product['id'];
						$pro_title = $row_product['name'];
						$pro_price = $row_product['price'];
						$pro_company = $row_product['company'];
						$pro_img1 = $row_product['image1'];
						$pro_avail = $row_product['product_availability'];
					?>

						<div class='col-md-4' style='margin-bottom:30px;'>
							<div class='card' style='width: 18rem; text-align:center;'>
								<?php echo "<img class='card-img-top' src='images/medicines/$pro_img1'  alt='Card image cap' style='width:250px; height:220px'>"
								?>
								<div class='card-body'>
									<h5 class='card-title'><?php echo $pro_title ?></h5>

									<!-- Product Reviews -->

									<div class="">
										<?php
										// $pid=$row['id'];
										$sel = "select round(AVG(ratting),1) as rr from ratting 
											WHERE pid='$pro_id' AND isapproved='1'";

										$rs = mysqli_query($con, $sel);
										$rss = mysqli_fetch_array($rs);



										?>

										<?php
										$i = 1;
										while ($i <= 5) {

											if ($i <= $rss['rr']) {

												echo '<span class="icofont-star checked"></span>';
											} else {

												echo '<span class="icofont-star"></span>';
											}
											$i++;
										}

										?>
									</div>

									<!-- Product Reviews End-->






									<p> BDT <?php echo $pro_price ?> </p>
									<a href='product_details.php?pid=<?php echo $pro_id; ?>' class='btn btn-primary'>More
										Details</a>

									<?php
									if ($pro_avail == 'In Stock') {
										echo "<a href='index.php?page=product&action=add&pid= $pro_id' class='btn btn-primary' style='background-color:#222222'>Add To Cart</a>";
									} else {
										echo "<a href='#' class='btn btn-primary' style='background-color:white; color:red;'>Out of Stock</a>";
									}
									?>


								</div>
							</div>
						</div>

					<?php
					}
					?>

				</div>
			</div>
		</div>

		<!-- Featured End -->


		<!-- New Products -->
		<div class="col-md-12 mt-100" style="text-align:center; padding:50px;">
			<h1>New <span style="color:#E12454">Products</span> </h1>
		</div>

		<div class="col-md-12">
			<div class="container">
				<div class="row">
					<?php
					$get_product = "select * from medicine order by 1 DESC LIMIT 0,3 ";
					$run_products = mysqli_query($con, $get_product);

					while ($row_product = mysqli_fetch_array($run_products)) {

						$pro_id = $row_product['id'];
						$pro_title = $row_product['name'];
						$pro_price = $row_product['price'];
						$pro_company = $row_product['company'];
						$pro_img1 = $row_product['image1'];
						$pro_avail = $row_product['product_availability'];
					?>

						<div class='col-md-4' style='margin-bottom:30px;'>
							<div class='card' style='width: 18rem; text-align:center;'>
								<?php echo "<img class='card-img-top' src='images/medicines/$pro_img1'  alt='Card image cap' style='width:250px; height:220px'>"
								?>
								<div class='card-body'>
									<h5 class='card-title'><?php echo $pro_title ?></h5>

									<!-- Product Reviews -->

									<div class="">
										<?php
										$pid = $row['id'];
										$sel = "select round(AVG(ratting),1) as rr from ratting 
											WHERE pid='$pro_id' AND isapproved='1'";

										$rs = mysqli_query($con, $sel);
										$rss = mysqli_fetch_array($rs);
										?>

										<?php
										$i = 1;
										while ($i <= 5) {

											if ($i <= $rss['rr']) {

												echo '<span class="icofont-star checked"></span>';
											} else {

												echo '<span class="icofont-star"></span>';
											}
											$i++;
										}

										?>
									</div>

									<!-- Product Reviews End-->


									<p> BDT <?php echo $pro_price ?> </p>
									<a href='product_details.php?pid=<?php echo $pro_id; ?>' class='btn btn-primary'>More
										Details</a>



									<?php
									if ($pro_avail == 'In Stock') {
										echo "<a href='index.php?page=product&action=add&pid=$pro_id;' class='btn btn-primary' style='background-color:#222222'>Add To Cart</a>";
									} else {
										echo "<a href='#' class='btn btn-primary' style='background-color:white; color:red;'>Out of Stock</a>";
									}
									?>


								</div>
							</div>
						</div>

					<?php
					}
					?>

				</div>
			</div>
		</div>
		<!-- NEW End -->
	</section>

	<!-- Shop End -->

	<!--Scripts -->
	<?php include('includes/footer.php') ?>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

	<?php
	//  include('includes/scripts.php')
	?>


</body>

</html>