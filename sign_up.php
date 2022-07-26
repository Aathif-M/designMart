<!DOCTYPE html>
<html lang="en" dir="ltr">
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

    <title>Design Mart: Sign up</title>

  </head>
  <body>


    <nav class="bg-dark text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-12" ></div>
          <div class="col-md-4 col-sm-12 py-3 px-5">
            <a href="index.php"><img class="w-100 img-fluid" src="img/logoWhite.png" alt="logo"></a>
          </div>
        </div>
      </div>
  	</nav>

    <div class="container text-center p-0">
      <h1 class="text-dark pt-4 text-center">Sign Up</h1>
      <div class="border-top w-25 mx-auto mb-2" style="border-color: #920000 !important"></div>
      <p>Have an account? <a href="login.php">Log in here</a></p>

      <div class="row my-4">
        <div class="col-md-3 col-sm-4 col-xs-12"></div>
        <div class="col-md-6 col-sm-4 col-xs-12">

          <?php

          if (isset($_REQUEST['status'])){
            if($_REQUEST['status']=="fail"){
              // echo "<h2 class='text-success'>Record Successfully Added</h2>";
              ?>
              <div class="alert alert-danger alert-dismissible text-center login_failed_message">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p class="lead m-0">Failed to create account Try again...</p>
                </br>
                <p class="mb-2">Try using a different email</p>
              </div>
              <?php
            }
          }

          ?>

          <form class="form" action="sign_up_2.php" method="post">
            <div class="form-row">

              <div class="form-group col-md-6 text-left">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="" required>
              </div>

              <div class="form-group col-md-6 text-left">
                <label for="contact_no">Contact Number</label>
                <input type="number" class="form-control" name="contact_no" id="contact_no" value="" required>
              </div>

              <div class="form-group col-md-12 text-left">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" id="address" value="">
              </div>

              <div class="form-group col-md-6 text-left">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="" required>
              </div>

              <div class="form-group col-md-6 text-left">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="access_code" id="access_code" value="" required>
              </div>

              <div class="form-group col-md-8 text-left">
                <p>By signing in you agree to our <a href="t&c.php">Terms & Conditions</a></p>
              </div>

              <div class="form-group col-md-4 text-left">
                <input type="submit" value="Sign Up" class="btn btn-outline-secondary w-100" id="defaultbtn">
              </div>

            </div>
          </form>
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
  </body>
</html>
