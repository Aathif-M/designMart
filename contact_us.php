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

	<title>Design Mart : Contact Us</title>

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
					<li class="nav-item"><a href="contact_us.php" class="nav-link active">Contact Us</a></li>
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
		<h1 class="text-dark pt-4">Contact Us</h1>
		<div class="border-top w-25 mx-auto my-1" style="border-color: #920000 !important"></div>
	</div>

	<!-- contact_text Section -->
	<section class="text-center">
		<div class="container">
			<div class="row">
				<div class="offset-1 col-10">
					<p class="text-dark">
						We are always here to help. If you have any inquiries or concerns about our
						services; fill up the contact form below, we'll be sure to reach you back
						within 24hours. Or contact number to call us or visit us with the help of
						the provided location.
					</p>
					<hr/>
				</div>
			</div>
		</div>
	</section>
	<!-- End of contact_text Section -->

	<!-- form_section -->
	<section class="form_section">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<form class="" action="#" method="post" onsubmit="require validateForm()">
						<div class="form-row">

							<div class="form-group col-md-6">
								<input type="text" class="form-control" placeholder="Full Name" id="name" name="" value="">
							</div>

							<div class="form-group col-md-6">
								<input type="number" class="form-control" placeholder="Contact Number" name="" value="">
							</div>

							<div class="form-group col-md-12">
								<input type="email" class="form-control" placeholder="Email Address" id="email" name="" value="">
							</div>

							<div class="form-group col-md-12">
								<textarea class="form-control" rows="5" id="message"></textarea>
							</div>

						</div>

						<div class="form-row">
							<div class="form-group col-md-12 text-center">
								<button id="defaultbtn" type="submit" class="btn btn-outline-secondary"><i class="fas fa-paper-plane"></i>Send Message</button>
							</div>
						</div>

					</form>
				</div>
				<div class="col-md-6 text-center pt-3">
					<img src="img/contact_us.png" alt="" class="img-fluid w-75">
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="container-fluid">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63320.430035647696!2d80.5906758856955!3d7.294543945522627!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae366266498acd3%3A0x411a3818a1e03c35!2sKandy!5e0!3m2!1sen!2slk!4v1629291367777!5m2!1sen!2slk" width="100%" height="400px" frameborder="0" style="border:0" loading="lazy"></iframe>
		</div>
	</section>
	<!-- End of form_section  -->


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

	<script type="text/javascript">

		function validateForm(){

			var name  = document.getElementById("name").value;
			var email  = document.getElementById("email").value;
			var message = document.getelementByID("message").value;

			if(name==""){
				//alert('Name cannot be an empty value');
				$('#errorDialogname').modal('show');
				return false;
			}
			else if (email=="") {
				$('#errorDialogemail').modal('show');
				return false;
			}
			else if (message=="") {
				$('#errorDialogmessage').modal('show');
				return false;
			}
			return true;


		}//end of validateForm() js function

	</script><!--script ends here-->

	<!-- Modal name -->
	<div class="modal fade" id="errorDialogname" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
						First name cannot be empty.
					</p >
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
					<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
				</div>
			</div>
		</div>
	</div><!--modal fade div ends here-->

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
						Please provide an email address.
					</p >
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
					<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
				</div>
			</div>
		</div>
	</div><!--modal fade div ends here-->

	<!-- Modal message -->
	<div class="modal fade" id="errorDialogmessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
						Oops.. You forgot to type your message.
					</p >
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
					<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
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
