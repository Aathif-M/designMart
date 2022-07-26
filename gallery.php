<?php
	require("db_connection.php");
	session_start();

	// echo "<pre>";
	// print_r($_REQUEST);
	// echo "</pre>";


	if (isset($_REQUEST['category'])) {
		$category = $_REQUEST['category'];
		// print_r($category);
	}
	elseif (isset($_REQUEST['cat'])) {
		$category = $_REQUEST['cat'];
	}
	else {
		header("location:gallery.php?category=Shalwar");
	}

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

	<title>Design Mart : Gallery</title>

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

	<!-- Main Page Heading -->
	<div class="col-12 text-center mt-5">
		<h1 class="text-dark pt-4"><?php echo $category; ?></h1>
		<div class="border-top w-25 mx-auto my-1" style="border-color: #920000 !important"></div>
		<p class="lead mb-5">Browse through some of our products</p>
	</div>

	<div class="container">

		<div class="row text-center">
			<form class="form w-100" action="gallery.php" method="post" enctype="multipart/form-data">

			 <!-- Search -->
			 <div class="form-row w-100 text-center p-2 mb-4 mt-0 ">

				 <input type="hidden" id="cat" name="cat" value="<?php print_r($category)	; ?>">

				 <!-- Textbox -->
				 <div class="col-md-6 col-sm-12 mt-2">
					 <input type="text" class="form-control w-100 mr-3" placeholder="Search by keyword" id="search" name="search">
				 </div>

				 <!-- Search button -->
				 <div class="col-md-1 col-sm-6 text-right mt-2">
					 <input class="btn btn-secondary m-0 " type="submit" id="defaultbtn" name="" value="Search">
				 </div>

				 <!-- Clear Search button -->
				 <div class="col-md-3 col-sm-6 text-left mt-2">

					 <?php
					 if (isset($_REQUEST['search'])) {
						 if ($_REQUEST['search'] != "") {
							 ?>
								<input class="btn btn-secondary m-0" type="submit" id="defaultbtn" name="" value="Clear Search">
							 <?php
						 }
					 }
					 ?>

				 </div>
			 </div><!-- form-row ends -->
		 </form><!-- form ends here -->
		</div>

		<div class="row">
				<?php
				if (isset($_REQUEST['search'])) {
					if ($_REQUEST['search'] != "") {

						$searchName = $_REQUEST['search'];

						$sqlName = "select * from product where pro_name like '%$searchName%' && pro_category='$category'";

						$rsName = $mysqli->query($sqlName);

						if (mysqli_num_rows($rsName)>0) {
							// code...
							while ($rowName = mysqli_fetch_assoc($rsName)) {
								// code...
								?>
								<div class="card-holder col-lg-4 col-md-4 col-sm-12 mb-4 mx-0 ">
									<div class="card w-100 p-3 mx-0">
										<a  data-fancybox="gallery" href="products/large/<?php echo $rowName['pro_img']; ?>">
											<img class="w-100" src="products/large/<?php echo $rowName['pro_img']; ?>">
										</a>
										<div class="card-body pt-3">
											<h5 class="card-pro_name" style="text-align:center;"><?php echo $rowName['pro_name'] ?></h5>
											<p class="font-weight-bold p-0 m-0" style="text-align:center;">Rs. <?php echo $rowName['pro_price']; ?>.00</p>
											<p class="font-weight-normal" style="text-align:center;"><?php echo $rowName['pro_material']; ?></p>
										</div>
									</div>
								</div>

								<?php
							}
						}

					}
					else {
						//we display all
						$sql = "select * from product where pro_category = '$category'";
						// print_r($sql);

						$rs = $mysqli->query($sql);

						if (mysqli_num_rows($rs)>0) {
							// code...
							while ($row = mysqli_fetch_assoc($rs)) {
								// code...
								?>
								<div class="card-holder col-lg-4 col-md-4 col-sm-12 mb-4 mx-0 ">
									<div class="card w-100 p-3 mx-0">
										<a  data-fancybox="gallery" href="products/large/<?php echo $row['pro_img']; ?>">
											<img class="w-100" src="products/large/<?php echo $row['pro_img']; ?>">
										</a>
										<div class="card-body pt-3">
											<h5 class="card-pro_name" style="text-align:center;"><?php echo $row['pro_name'] ?></h5>
											<p class="font-weight-bold p-0 m-0" style="text-align:center;">Rs. <?php echo $row['pro_price']; ?>.00</p>
											<p class="font-weight-normal" style="text-align:center;"><?php echo $row['pro_material']; ?></p>
										</div>
									</div>
								</div>

								<?php
							}
						}
					}
				}
				else {
					//we display all
					$sql = "select * from product where pro_category = '$category'";
					// print_r($sql);

					$rs = $mysqli->query($sql);

					if (mysqli_num_rows($rs)>0) {
						// code...
						while ($row = mysqli_fetch_assoc($rs)) {
							// code...
							?>
							<div class="card-holder col-lg-4 col-md-4 col-sm-12 mb-4 mx-0 ">
								<div class="card w-100 p-3 mx-0">
									<a  data-fancybox="gallery" href="products/large/<?php echo $row['pro_img']; ?>">
										<img class="w-100" src="products/large/<?php echo $row['pro_img']; ?>">
									</a>
									<div class="card-body pt-3">
										<h5 class="card-pro_name" style="text-align:center;"><?php echo $row['pro_name'] ?></h5>
										<p class="font-weight-bold p-0 m-0" style="text-align:center;">Rs. <?php echo $row['pro_price']; ?>.00</p>
										<p class="font-weight-normal" style="text-align:center;"><?php echo $row['pro_material']; ?></p>
									</div>
								</div>
							</div>

							<?php
						}
					}
				}

				 ?>

		</div>
		<!-- End of row -->
	</div>
	<!-- End of Container -->

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
