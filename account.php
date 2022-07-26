<?php

	require("db_connection.php");
	session_start();

	require("user_login_check.php");

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

	<title>Design Mart : Account</title>

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
					<li class="nav-item"><a href="account.php" class="nav-link active"><span class="fas fa-user"></span>
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

	<div class="container-fluid p-0">

		<?php
			if (isset($_REQUEST['status'])) {
				if ($_REQUEST['status'] == 'pass') {
					?>
						<div class="alert alert-success alert-dismissible text-center login_failed_message">
	  					<button type="button" class="close" data-dismiss="alert">&times;</button>
							<p class="">Your account has been successfully created</p>
						</div>
					<?php
				}else if($_REQUEST['status']=="updated"){
					// echo "<h2 class='text-success'>Record Successfully Added</h2>";
					?>
					<div class="alert alert-success alert-dismissible text-center login_failed_message">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<p class="">Account successfully updated!</p>
					</div>
					<?php
				}
				else if($_REQUEST['status']=="logged"){
					// echo "<h2 class='text-success'>Record Successfully Added</h2>";
					?>
					<div class="alert alert-success alert-dismissible text-center login_failed_message">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<p class="">Welcome back <?php echo $row['name'] ?>!</p>
					</div>
					<?php
				}
				else{
					// echo "<h2 class='text-danger'>Add new record failed.!</h2>";
					?>
					<div class="alert alert-danger alert-dismissible text-center login_failed_message">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<p class="">Failed to update account</p>
					</div>
					<?php
				}

			}
		 ?>

		<div class="row my-5 account_top_row">

			<div class="col-md-1 col-sm-12"></div>

			<div class="col-md-7 col-sm-12 my-5">
				<h1 class="text-dark">Your Account Area</h1>
				<br />
				<h4 class="text-dark">Welcome Back <?php print_r($row['name']) ?></h4>
				<a href="edit_user.php" class="btn btn-secondary" id="defaultbtn">Edit Account Details</a>
			</div>

			<div class="col-md-3 col-sm-12 text-right my-5">
				<a href="user_logout.php" class="btn btn-secondary" id="defaultbtn">Log out</a>
			</div>

			<div class="col-md-1 col-sm-12"></div>

		</div>
	</div>


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

	<!-- Start Script -->
	<script type="text/javascript">

		function validateForm(){

			var email  = document.getElementById("email").value;
			var password  = document.getElementById("password").value;

			if (email=="") {
				$('#errorDialogemail').modal('show');
				return false;
			}
			else if (password=="") {
				$('#errorDialogpassword').modal('show');
				return false;
			}
			return true;

		}//end of validateForm() js function

	</script><!--script ends here-->

	<!-- Modal email -->
	<div class="modal fade" id="errorDialogemail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Invalid Input Detected</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>
						Please enter an email address.
					</p >
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-warning" id="defaultbtn" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div><!--modal fade div ends here-->

	<!-- Modal password -->
	<div class="modal fade" id="errorDialogpassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Invalid Input Detected</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>
						Please enter a password.
					</p >
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-warning" id="defaultbtn" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div><!--modal fade div ends here-->

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
