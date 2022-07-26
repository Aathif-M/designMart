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

	<title>Design Mart : Home</title>

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

					<li class="nav-item"><a href="index.php" class="nav-link active">Home</a></li>
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
					<li class="nav-item"><a href="about_us.php" class="nav-link ">About Us</a></li>
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


	<!-- Image Carousel -->
	<div class="carousel slide" id="carousel" data-ride="carousel" data-interval="5000">

		<!-- Carousel Content -->
		<div class="carousel-inner">

			<div class="carousel-item active">
				<img src="img/carousel1.jpeg" alt="" class="w-100">
			</div>

			<div class="carousel-item">
				<img src="img/carousel2.jpeg" alt="" class="w-100">
			</div>

			<div class="carousel-item">
				<img src="img/carousel3.jpeg" alt="" class="w-100">
			</div>

		</div>
		<!-- End Carousel Content -->


		<!-- Previous & Next Buttons -->
		<a href="#carousel" class="carousel-control-prev" role="button" data-slide="prev">
			<span class="fas fa-chevron-left fa-2x"></span>
		</a>

		<a href="#carousel" class="carousel-control-next" role="button" data-slide="next">
			<span class="fas fa-chevron-right fa-2x"></span>
		</a>
		<!-- End Previous & Next Buttons -->


	</div>
	<!-- End Image Carousel -->


	<!-- Main Page Heading -->
	<div class="col-12 text-center mt-5">
		<h1 class="text-dark pt-4">Featured</h1>
		<div class="border-top w-25 mx-auto my-1" style="border-color: #920000 !important"></div>
		<p class="lead">Browse through some of our products</p>
	</div>

	<!-- Three Column Section -->
	<div class="container">
		<div class="row my-5">

      <div class="card-holder col-lg-3 col-md-3 col-sm-12 mb-4 mx-0 text-center">
        <div class="card w-100 p-3 mx-0 text-center">
          <a  data-fancybox="gallery" href="img/homeimg1.jpeg">
            <img class="w-100" src="img/homeimg1.jpeg">
          </a>
          <a href="gallery.php?category=Shalwar" class="btn btn-outline-secondary btn-md mt-3 w-50 text-center"
          style="margin: auto">
            Shop now
          </a>
        </div>
      </div>

      <div class="card-holder col-lg-3 col-md-3 col-sm-12 mb-4 mx-0 text-center">
        <div class="card w-100 p-3 mx-0 text-center">
          <a  data-fancybox="gallery" href="img/homeimg2.jpeg">
            <img class="w-100" src="img/homeimg2.jpeg">
          </a>
          <a href="gallery.php?category=Saree" class="btn btn-outline-secondary btn-md mt-3 w-50 text-center"
          style="margin: auto">
            Shop now
          </a>
        </div>
      </div>

      <div class="card-holder col-lg-3 col-md-3 col-sm-12 mb-4 mx-0 text-center">
        <div class="card w-100 p-3 mx-0 text-center">
          <a  data-fancybox="gallery" href="img/homeimg3.jpeg">
            <img class="w-100" src="img/homeimg3.jpeg">
          </a>
          <a href="gallery.php?category=Chudidar" class="btn btn-outline-secondary btn-md mt-3 w-50 text-center"
          style="margin: auto">
            Shop now
          </a>
        </div>
      </div>

      <div class="card-holder col-lg-3 col-md-3 col-sm-12 mb-4 mx-0 text-center">
        <div class="card w-100 p-3 mx-0 text-center">
          <a  data-fancybox="gallery" href="img/homeimg4.jpeg">
            <img class="w-100" src="img/homeimg4.jpeg">
          </a>
          <a href="gallery.php?category=Ghagra Choli" class="btn btn-outline-secondary btn-md mt-3 w-50 text-center"
          style="margin: auto">
            Shop now
          </a>
        </div>

      </div>
		</div>
	</div>


	<!-- Start Fixed Background IMG -->
	<div class="fixed-background">

		<div class="row py-5">
			<div class="col-12 text-center">

				<h1>Experience the elagance</h1>
				<h3>See more of what we offer</h3>
				<a href="gallery.php" class="btn btn-outline-secondary btn-md" id="defaultbtn">Gallery</a>

			</div>
		</div>

		<div class="fixed-wrap">
			<div class="fixed"></div>
		</div>

	</div>

	<!-- Start Two Column Section -->
	<div class="container my-5">
		<div class="row py-4">

			<div class="col-lg-6 mb-4 my-lg-auto">
				<h1 class="text-dark font-weight-bold mb-3">Get the best out of us</h1>
				<p class="mb-4">Become a member and get latest updates, new arrivals and manymore...	</p>

				<a href="sign_up.php" class="btn btn-outline-secondary btn-lg ">Become a member</a>

			</div>

			<div class="col-lg-6 align-right"><img src="img/scenic.jpeg" alt="" class="w-100"></div>

		</div>
	</div>
	<!-- End Two Column Section -->


	<!-- Start Jumbotron -->
	<div class="jumbotron py-5 mb-0">
		<div class="container">
			<div class="row">

				<div class="col-md-7 col-lg-8 col-xl-9 my-auto">
					<h4>Tell us more of what you think</h4>
				</div>

				<div class="col-md-5 col-lg-4 col-xl-3 pt-4 pt-md-0">
					<a href="contact_us.php" class="btn btn-outline-secondary btn-lg">Contact Us Today</a>
				</div>

			</div>
		</div>
	</div>
	<!-- End Jumbotron -->


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
