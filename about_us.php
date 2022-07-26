<?php
	require("db_connection.php");
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">



	<!-- Bootstrap 4.5 CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Style CSS -->
	<link rel="stylesheet" href="style.css">

	<!-- attach the JS files -->
	<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/fontawesome-all.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
	<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

	<title>Design Mart : About Us</title>

</head>
<body>

	<!-- Navigation -->
	<nav class="navbar bg-light navbar-light navbar-expand-lg">
		<div class="container">

			<a href="index.php" class="navbar-brand"><img src="img/logo.png" alt="logo"></a>

			<button class="navbar-toggler" type="button" data-toggle="collapse"
				data-target="#navbarResponsive">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarResponsive">

				<ul class="navbar-nav ml-auto">

					<li class="nav-item"><a href="index.php" class="nav-link ">Home</a></li>
					<li class="nav-item">
  					<div class="dropdown">
    					<button class="dropbtn nav-link">Gallery
      					<i class="fa fa-caret-down"></i>
    					</button>
    					<div class="dropdown-content">
      					<a href="gallery.php?category=Shalwar">Shalwar</a>
      					<a href="gallery.php?category=Saree">Saree</a>
      					<a href="gallery.php?category=Chudidar">Chudidar</a>
      					<a href="gallery.php?category=Ghagra Choli">Ghagra Choli</a>
    					</div>
  					</div>
					</li>
					<li class="nav-item"><a href="contact_us.php" class="nav-link ">Contact Us</a></li>
					<li class="nav-item"><a href="about_us.php" class="nav-link active">About Us</a></li>
					<li class="nav-item"><a href="account.php" class="nav-link "><span class="fas fa-user"></span>
						<?php

						if (isset($_SESSION['user_group'])) {

							$user_group = $_SESSION['user_group'];

					 		if ($user_group == 'user') {
								$email 			= $_SESSION['email'];
								$sql = "select * from user where email='$email'";

								$rs = $mysqli->query($sql);

								if(mysqli_num_rows($rs)>0){
									$row = mysqli_fetch_assoc($rs);

									if ($row['name'] == '') {
										echo "Login";
									}
									else {
										print_r($row['name']);
									}
								}
					 		}
							else {
									echo "Login";
								}
						}
						else {
							echo "Login";
						}
						 ?>
					 </a></li>

				</ul>

			</div>

		</div>
	</nav>
	<!-- End Navigation -->

	<!-- Main Page Heading -->
	<div class="col-12 text-center mt-5">
		<h1 class="text-dark pt-4">About Design Mart</h1>
		<div class="border-top w-25 mx-auto my-1" style="border-color: #920000 !important"></div>
	</div>

	<!-- about_company_section -->
	<section class="about_company_section">
		<div class="container p-1 p-sm-3">
			<div class="row my-3">

				<div class="col-md-3">
					<img class="img-fluid" src="img/logo.png" alt="Design Mart">
				</div>

				<div class="col-md-9 text-justify">
					<p class="text-dark">
						We Design Mart are a clothing store specialized in selling imported women’s dress items such as
						Shalwars, Chudidar, Ghagra Choli and many more by expanding the services that we offer.
					</p>
					<p class="text-dark">
						We have more than 5 branches island wide and are still looking for opportunities to expand even further.
					</p>
					<p class="text-dark">
						We are a well reknown business which has won a god place in the market for selling textile goods because we sell high quality products and offer high level of 24/7 customer service.
					</p>
					<p class="text-dark">
						The purpose of this website for now is just to showcase the products we have. Further more we are planning to expand this site to make online purchases.
					</p>
				</div>

			</div>

			<div class="row my-3">

				<div class="col-md-12 col-lg-6 text-justify">

					<h1 class="text-dark pt-4">Our Mission</h1>
					<p class="text-dark">
						To create the most compelling business for textile trades of the 21st century
						by reachimg a wider audience and providing the best possible service.
					</p>

				</div>

				<div class="col-md-12 col-lg-6 text-justify">

					<h1 class="text-dark pt-4">Our Vision</h1>
					<p class="text-dark">
						To provide the people a place where they can "one-stop-buy" everything they desire
						without the inconvenience of physical shopping.
					</p>

				</div>

			</div>
		</div>
	</section>
	<!-- End of about_company_section -->

	<!-- Start Footer -->
	<footer>
		<div class="container">
			<div class="row text-light text-center py-4 justify-content-center">

				<div class="col-sm-11 col-md-9 col-lg-7">
					<img src="img/logoWhite.png" alt="Design Mart white">
					<p class="my-0">2021 &copy; All Rights Reserved | Designed and Developed by Mohamed Aathif</p>
					</br>
					<p class="my-0"><a href="terms_and_conditions.php" id="tc">Terms & Conditions</a></p>

					<ul class="social pt-3">
						<li><a href="#" target="_blank"><i class="fab fa-facebook"></i></a></li>
						<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
						<li><a href="#" target="_blank"><i class="fab fa-youtube"></i></a></li>
					</ul>

				</div>

			</div>

		</div>

	</footer>
	<!-- End Footer -->

	<!-- Script Source Files -->

	<!-- jQuery -->
	<script src="js/jquery-3.5.1.min.js"></script>
	<!-- Bootstrap 4.5 JS -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Popper JS -->
	<script src="js/popper.min.js"></script>
	<!-- Font Awesome -->
	<script src="js/all.min.js"></script>

	<!-- End Script Source Files -->
</body>
</html>
