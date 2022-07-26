<?php
  require("validate_admin.php");
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
          <div class="row my-4">

            <form class="form w-100" action="edit_product_1.php" method="post" enctype="multipart/form-data">

             <!-- Search -->
             <div class="form-row w-100 text-center p-2 mb-4 mt-0 ">

               <!-- Textbox -->
               <div class="col-md-6 col-sm-12 mt-2">
                 <input type="text" class="form-control w-100 mr-3" placeholder="Search by product ID or keyword" id="search" name="search">
               </div>

               <!-- Search button -->
               <div class="col-md-2 col-sm-6 text-left mt-2">
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

           <div class="row col-lg-12 col-md-12">
             <?php

              if (isset($_REQUEST['edit_status'])) {
                if ($_REQUEST['edit_status'] == 'pass') {
                  ?>
                  <!-- Successful alert box -->
                  <div class="alert alert-success alert-dismissible text-center login_failed_message col-lg-12">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <p class="lead">Product successfully updated</p>
                  </div>
                  <?php
                }
              }

              ?>
           </div>
             <div class="row w-100" style="overflow-x:auto;">
               <table class="col-sm-12">
                 <tr>
                   <th class="col-md-2 col-sm-2 text-center text-dark">Product ID</th>
                   <th class="col-md-2 col-sm-2 text-center text-dark">Name</th>
                   <th class="col-md-1 col-sm-1 text-center text-dark">Price</th>
                   <th class="col-md-2 col-sm-2 text-center text-dark">Material</th>
                   <th class="col-md-1 col-sm-1 text-center text-dark">Category</th>
                   <th class="col-md-2 col-sm-2 text-center text-dark">Image</th>
                   <th class="col-md-3 col-sm-3 text-center text-dark">Action</th>
                 </tr>

                 <?php

                 if (isset($_REQUEST['search'])) {
                   if ($_REQUEST['search'] != "") {

                     $search = $_REQUEST['search'];

                      //SQL commands
                      $sqlSearchID = "select * from product where pro_id = $search";
                      $sqlSearchName = "select * from product where pro_name like '%$search%'";

                      //Search by ID
                      $rsSearchID = $mysqli->query($sqlSearchID);

                      //Search by Name
                      $rsSearchName = $mysqli->query($sqlSearchName);


                      //Search by ID
                      if ($rsSearchID != "") {

                        if(mysqli_num_rows($rsSearchID)>0){

                          while ($rowSearchID = mysqli_fetch_assoc($rsSearchID)){
                            ?>
                            <tr>
                              <td class="text-center lead"><?php echo $rowSearchID['pro_id']; ?></td>
                              <td class="text-center"><?php echo $rowSearchID['pro_name']; ?></td>
                              <td class="text-center">Rs.<?php echo $rowSearchID['pro_price']; ?></td>
                              <td class="text-center"><?php echo $rowSearchID['pro_material']; ?></td>
                              <td class="text-center"><?php echo $rowSearchID['pro_category']; ?></td>
                              <td class="text-center">
                                <a  data-fancybox="gallery" href="products/large/<?php echo $row2['pro_img']; ?>">
                                  <img src="products/thumb/<?php echo $rowSearchID['pro_img']; ?>" alt="product thumb">
                                </a>
                              </td>
                              <td class="text-center">
                                <a class="btn btn-sm w-75 btn-secondary" id="defaultbtn" href="edit_product_2.php?pro_id=<?php echo $rowSearchID['pro_id']; ?>">Edit</a>
                              </td>
                            </tr>
                            <?php
                          }
                        }
                        else {
                           ?>
                           <tr>
                             <p class="lean text-light">There no matches found</p>
                           </tr>
                           <?php

                         }
                      }
                      //Search by Name
                      else if(mysqli_num_rows($rsSearchName)>0){

                        while ($rowSearchName = mysqli_fetch_assoc($rsSearchName)){
                          ?>
                          <tr>
                            <td class="text-center lead"><?php echo $rowSearchName['pro_id']; ?></td>
                            <td class="text-center"><?php echo $rowSearchName['pro_name']; ?></td>
                            <td class="text-center">Rs.<?php echo $rowSearchName['pro_price']; ?></td>
                            <td class="text-center"><?php echo $rowSearchName['pro_material']; ?></td>
                            <td class="text-center"><?php echo $rowSearchName['pro_category']; ?></td>
                            <td class="text-center">
                              <a  data-fancybox="gallery" href="products/large/<?php echo $row2['pro_img']; ?>">
                                <img src="products/thumb/<?php echo $rowSearchName['pro_img']; ?>" alt="product thumb">
                              </a>
                            </td>
                            <td class="text-center">
                              <a class="btn btn-sm w-75 btn-secondary" id="defaultbtn"
                              href="edit_product_2.php?pro_id=<?php echo $rowSearchName['pro_id']; ?>">Edit</a>
                            </td>
                          </tr>
                          <?php
                        }
                      }
                      else {
                         ?>
                         <tr>
                           <p class="lean text-light">There no matches found</p>
                         </tr>
                         <?php

                       }
                     }
                    else {
                    $sql2 = "select * from product";

                    $rs2 = $mysqli->query($sql2);

                    if(mysqli_num_rows($rs2)>0){
                     while ($row2 = mysqli_fetch_assoc($rs2)){
                       ?>
                       <tr>
                         <td class="text-center lead"><?php echo $row2['pro_id']; ?></td>
                         <td class="text-center"><?php echo $row2['pro_name']; ?></td>
                         <td class="text-center">Rs.<?php echo $row2['pro_price']; ?></td>
                         <td class="text-center"><?php echo $row2['pro_material']; ?></td>
                         <td class="text-center"><?php echo $row2['pro_category']; ?></td>
                         <td class="text-center">
                           <a  data-fancybox="gallery" href="products/large/<?php echo $row2['pro_img']; ?>">
                             <img src="products/thumb/<?php echo $row2['pro_img']; ?>" alt="product thumb">
                           </a>
                         </td>
                         <td class="text-center">
                           <a class="btn btn-sm w-75 btn-secondary" id="defaultbtn" href="edit_product_2.php?pro_id=<?php echo $row2['pro_id']; ?>">Edit</a>
                         </td>
                       </tr>
                       <?php
                     }
                   }
                  }
                }
                 else {
                   $sql2 = "select * from product";
                  // print_r($sql2);

                  $rs2 = $mysqli->query($sql2);
                  // print_r($rs2);

                  if(mysqli_num_rows($rs2)>0){
                    while ($row2 = mysqli_fetch_assoc($rs2)){
                      ?>
                      <tr>
                        <td class="text-center lead"><?php echo $row2['pro_id']; ?></td>
                        <td class="text-center"><?php echo $row2['pro_name']; ?></td>
                        <td class="text-center">Rs.<?php echo $row2['pro_price']; ?></td>
                        <td class="text-center"><?php echo $row2['pro_material']; ?></td>
                        <td class="text-center"><?php echo $row2['pro_category']; ?></td>
                        <td class="text-center">
                          <a  data-fancybox="gallery" href="products/large/<?php echo $row2['pro_img']; ?>">
                            <img src="products/thumb/<?php echo $row2['pro_img']; ?>" alt="product thumb">
                          </a>
                        </td>
                        <td class="text-center">
                          <a class="btn btn-sm w-75 btn-secondary" id="defaultbtn" href="edit_product_2.php?pro_id=<?php echo $row2['pro_id']; ?>">Edit</a>
                        </td>
                      </tr>
                      <?php
                    }
                  }
                 }

                ?>

              </table> <!--Table ends here-->
             </div> <!--Row ends here-->

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
