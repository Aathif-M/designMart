<?php

  require("validate_admin.php");
  require("db_connection.php");

  $email = $_SESSION['email'];

  $sql = "select * from user where email='$email'";

  $rs = $mysqli->query($sql);

  if(mysqli_num_rows($rs)>0){
    $row = mysqli_fetch_assoc($rs);
  }

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

    <title>Design Mart: Edit Products</title>
  </head>
  <body>

    <div class="container text-center">
      <div class="row" id="top_row">
            <img class="img-fluid col-md-3 my-3" src="img/logo.png" alt="">
      </div>

      <div class="row second-row">
        <div class="col-md-3 dash_nav">
          <ul>

            <li class="dash_nav_item"><a href="dashboard.php" class="dash_nav_link">Dashboard</a></li>
            <li class="dash_nav_item"><a href="add_product_1.php" class="dash_nav_link">Add Product</a></li>
            <li class="dash_nav_item"><a href="edit_product_1.php" class="dash_nav_link active">Edit Product</a></li>
            <li class="dash_nav_item"><a href="delete_product_1.php" class="dash_nav_link">Delete Product</a></li>
            <li class="dash_nav_item"><a href="logout.php" class="dash_nav_link"><span class="fas fa-user"></span> Log Out</a>
            </li>

          </ul>

        </div>

        <div class="col-md-9 text-left my-4">

          <h2 class="text-light">Edit Products</h2>
          <h4 class="text-light">Signed in as : <?php print_r($row['name']) ?></h4>
          <hr/>

          <?php

            $pro_id = $_REQUEST['pro_id'];

            //SQL command
            $sql = "select * from product where pro_id = $pro_id";

            $rs = $mysqli->query($sql);

            if(mysqli_num_rows($rs) > 0){

              //copy the record from resource
              $row = mysqli_fetch_assoc($rs);
            }

            if (isset($_REQUEST['edit_status'])) {
      				if ($_REQUEST['edit_status'] == 'fail') {
      					// echo "<h2 class='text-danger'>Add new record failed.!</h2>";
      					?>
                <div class="alert alert-danger alert-dismissible text-center login_failed_message">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <p class="p-0 m-2 lead">Failed to update product image</p>
                  <p class="p-0 mb-3" style="font-size: 17px;">Please check image dimentions</p>
                </div>
      					<?php
      				}

      			}
          ?>

          <!-- row div starts here -->
          <div class="row">
            <form class="form-control add_form" action="edit_product_3.php" method="post" enctype="multipart/form-data">

              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="name" class="label mx-1 text-light">Product Name</label>
                  <input type="hidden" name="pro_id" value="<?php echo $row['pro_id']?>">
                  <input type="text" class="form-control" name="pro_name" id="pro_name" maxlength="18"  value="<?php echo $row['pro_name']?>" required>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="price" class="label mx-1 text-light">Product Price</label>
                  <input type="hidden" name="pro_id" value="<?php echo $row['pro_id']?>">
                  <input type="number" class="form-control col-md-8" name="pro_price" id="pro_price"  value="<?php echo $row['pro_price']?>" required>
                </div>

                <div class="form-group col-md-6">
                  <label for="name" class="label mx-1 text-light">Product Material</label>
                  <input type="hidden" name="pro_id" value="<?php echo $row['pro_id']?>">
                  <input type="text" class="form-control" name="pro_material" id="pro_material"   value="<?php echo $row['pro_material']?>" required>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="price" class="label mx-1 text-light">Product Category</label>
                  <input type="hidden" name="pro_id" value="<?php echo $row['pro_id']?>">

                  <select class="form-control col-md-6" id="pro_category" name="pro_category"  value="<?php echo $row['pro_category']?>" required>
                    <option>Shalwar</option>
                    <option>Chudidar</option>
                    <option>Ghagra Choli</option>
                    <option>Saree</option>
                  </select>
                </div>

                <div class="form-group col-md-6">
                  <label for="name" class="label mx-1 text-light">Product Image (Use a 500 × 700 jpeg type image)</label>
                  <input type="hidden" name="pro_id" value="<?php echo $row['pro_id']?>">
                  <div class="input-group mx-1 mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-camera"></i>
                      </div>
                    </div>
                    <input type="file" class="form-control" name="pro_img" id="pro_img">
                    <a  data-fancybox="gallery" href="products/large/<?php echo $row['pro_img']?>"><img src="products/thumb/<?php echo $row['pro_img']?>" class="w-100"></a>
                  </div>
                  <p class="text-light"><span class="font-weight-bold">NOTE : </span> Your image will not be displayed if not a jpeg type image</p>
                </div>
              </div>

              <div class="form-row my-3">
                <input type="submit" name="submit" value="Save changes" class="btn mx-1" id="defaultbtn">
              </div>


            </form><!-- Form ends here -->
          </div><!-- row div ends here -->

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
