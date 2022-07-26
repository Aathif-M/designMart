<?php
	require("db_connection.php");
	session_start();

	if (isset($_SESSION['email'])) {
    if ($_SESSION['user_group'] == 'user') {

    }
    else {
      header("location:login.php");
    }
  }
  else {
    header("location:login.php");
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

	<title>Design Mart : Edit User</title>

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

	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12"></div>
			<div class="col-md-4 col-sm-4 col-xs-12 my-5" id="loginform" >

				<h1 class="text-dark pt-4 text-center">Edit Account</h1>
				<div class="border-top w-50 mx-auto mb-4" style="border-color: #920000 !important"></div>

				<?php

					$email = $_SESSION['email'];

					$sql = "select * from user where email = '$email'";
					$rs = $mysqli->query($sql);

					if(mysqli_num_rows($rs) > 0){
						$row = mysqli_fetch_assoc($rs);

					}

				?>

				<form class="form" action="edit_user_2.php" method="post" enctype="multipart/form-data">

					<div class="form-row align-item-left">
						 <div class="form-group col-lg-12 col-md-12">
							 <input type="hidden" id="email"  name="email" value="<?php echo $row['email']?>">
								<label class="label mx-1" for="name">Name</label>
								<div class="input-group mx-1 mb-2 ">

									<input type="text" class="form-control " id="name" name="name" value="<?php echo $row['name']; ?>" required>

							</div>
						</div><!-- end of form group size 6-->
					</div><!--FORM ROW END HERE  -->

					<div class="form-row align-item-left">
						 <div class="form-group col-lg-12 col-md-12">
							 <input type="hidden" name="email" value="<?php echo $row['email']?>">
								<label class="label mx-1" for="name">Contact Number</label>
								<div class="input-group mx-1 mb-2 ">

									<input type="number" class="form-control " id="contact_no" name="contact_no" value="<?php echo $row['contact_no']; ?>">

							</div>
						</div><!-- end of form group size 6-->
					</div><!--FORM ROW END HERE  -->

					<div class="form-row align-item-left">
						 <div class="form-group col-lg-12 col-md-12">
							 <input type="hidden" name="email" value="<?php echo $row['email']?>">
								<label class="label mx-1" for="name">Address</label>
								<div class="input-group mx-1 mb-2 ">

									<textarea class="form-control" name="address" id="address" rows="2"><?php echo $row['address']; ?></textarea>

							</div>
						</div><!-- end of form group size 6-->
					</div><!--FORM ROW END HERE  -->

					<div class="form-row">

						 <div class="form-group col-lg-6 col-md-6">

									<input type="submit"
										class="form-control btn btn-success"  name="submit" id="defaultbtn"
										value="Save Changes">

							</div>
						</div><!-- end of form group size 6-->
					</div><!--FORM ROW END HERE  -->

				</form><!-- end of form-->
			</div>
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
