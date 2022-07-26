<?php
  require("validate_admin.php");
  require("db_connection.php");

  require("sessionSave.php");
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
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

    <title>Design Mart: Dashboard</title>
  </head>
  <body>

    <div class="container text-center">
      <div class="row" id="top_row">
            <img class="img-fluid col-md-3 my-3" src="img/logo.png" alt="">
      </div>

      <div class="row second-row">
        <div class="col-md-3 dash_nav">
          <ul>

            <li class="dash_nav_item"><a href="dashboard.php" class="dash_nav_link active">Dashboard</a></li>
            <li class="dash_nav_item"><a href="add_product_1.php" class="dash_nav_link">Add Product</a></li>
            <li class="dash_nav_item"><a href="edit_product_1.php" class="dash_nav_link">Edit Product</a></li>
            <li class="dash_nav_item"><a href="delete_product_1.php" class="dash_nav_link">Delete Product</a></li>
            <li class="dash_nav_item"><a href="logout.php" class="dash_nav_link"><span class="fas fa-user"></span> Log Out</a></li>

          </ul>

        </div>
        <div class="col-md-9 text-left my-4">
          <h2 class="text-light">Dashboard</h2>
          <h4 class="text-light">Signed in as : <?php print_r($row['name']) ?> </h4>
          <hr/>
          <div class="row my-4">

            <div class="col-md-3 mx-3 my-2 dash-tiles">
              <h3>Add Products</h3>
              <p>Go here to add a new product to be displayed in your website</p>
              <a href="add_product_1.php" class="btn w-50" id="defaultbtn">ADD</a>
            </div>

            <div class="col-md-3 mx-3 my-2 dash-tiles">
              <h3>Edit Products</h3>
              <p>Go here to search and edit and make changes or updates to  your products</p>
              <a href="edit_product_1.php" class="btn w-50" id="defaultbtn">EDIT</a>
            </div>

            <div class="col-md-3 mx-3 my-2 dash-tiles">
              <h3>Delete Products </h3>
              <p>Go here to search and delete a product from your website</p>
              <br/>
              <a href="delete_product_1.php" class="btn w-50" id="defaultbtn">DELETE</a>
            </div>

          </div> <!--Row ends here-->

        </div>

      </div> <!--Row div ends here-->

      <!-- Start Footer -->
    	<footer>
    		<div class="container">
    			<div class="row text-light text-center py-4 justify-content-center">

    				<div class="col-sm-11 col-md-9 col-lg-7">
    					<img src="img/logoWhite.png" alt="Design Mart white">
    					<p class="my-0">2021 &copy; All Rights Reserved | Designed and Developed by Mohamed Aathif</p>
              </br>


    					<ul class="social pt-3">
    						<li><a href="#" target="_blank"><i class="fab fa-facebook"></i></a></li>
    						<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
    						<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
    						<li><a href="#" target="_blank"><i class="fab fa-youtube"></i></a></li>
    					</ul>

    				</div>
    			</div>
    		</div> <!--Container div ends here-->
    	</footer>
    	<!-- End Footer -->

    </div> <!--Container div ends here-->
  </body>
</html>
