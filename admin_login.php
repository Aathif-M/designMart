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

    </script>

    <title>Design Mart : Admin Login</title>
  </head>
  <body class="admin_login_body">

    <div class="container-fluid">
  		<div class="row">
  			<div class="col-md-4 col-sm-4 col-xs-12"></div>
  			<div class="col-md-4 col-sm-4 col-xs-12 my-5" id="admin_login_form">

          <img src="img/logo.png" class="img-fluid" alt="">
  				<h1 class="text-Primary pt-4 text-center mb-4">Admin Login</h1>

          <?php
						if (isset($_REQUEST['validation'])) {
							if ($_REQUEST['validation'] == 'fail') {

								?>
								<h5 class="text-danger text-center mb-3">Authorized access only</h5>

								<div class="alert alert-danger alert-dismissible text-center mb-4 login_failed_message">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<p class="">Incorrect email or password</p>
								</div>
								<?php

							}
						}

					?>

  				<form class="" action="admin_login_2.php" onsubmit="return validateForm()" method="post">

            <div class="form-group col-lg-12 col-md-12">

               <label class="label mx-3" for="email">Email</label>
               <div class="input-group mx-1 mb-2 ">
                 <div class="input-group-prepend">
                   <div class="input-group-text">
                     <i class="fas fa-user"></i>
                   </div>
                 </div>
                 <input type="email" class="form-control"
                  id="email" name="email" placeholder="Enter your email address">
             </div>
           </div>

           <div class="form-group col-lg-12 col-md-12">

              <label class="label mx-3" for="password">Password</label>
              <div class="input-group mx-1 mb-2 ">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-lock"></i>
                  </div>
                </div>
                <input type="password" class="form-control"
                 id="access_code" name="access_code" placeholder="Enter your account password">
            </div>
          </div>

  					<div class="form-group text-center">
  						<input type="submit" value="Log in" class="btn w-50" id="defaultbtn">
  					</div>

  				</form><!-- end of form -->
  			</div>
  		</div><!-- end of row -->

  	</div><!-- end of container-->

    <div class="container">
      <div class="text-center copyright">

        <p>2021 &copy; All Rights Reserved </p>
        <br/>
        <p>Designed and Developed by Mohamed Aathif</p>

      </div><!-- end of footer div-12 -->
    </div><!-- end of row-->




  </body>
</html>                                                                                                                                                                                                                
