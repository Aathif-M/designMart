<?php

  require("validate_admin.php");
  //adding a new record to the table product in the db_ad4850 database

  //1st lets connect to the database server
  require("db_connection.php");
  require("code_lib.inc.php");

  //store the form field values to variables
    $pro_name       = $_REQUEST['pro_name'];
    $pro_price      = $_REQUEST['pro_price'];
    $pro_material   = $_REQUEST['pro_material'];
    $pro_category   = $_REQUEST['pro_category'];

  //building a dynamic sql command
     $sql  = "insert into product (pro_name,pro_price,pro_material,pro_category) values(";
     $sql .= "'$pro_name',";
     $sql .= "$pro_price,";
     $sql .= "'$pro_material',";
     $sql .= "'$pro_category')";

    //lets execute the sql command
    $x = $mysqli->query($sql);

    $last_id     = $mysqli->insert_id;

    if($x>0){ //Check record added to database status

      //upload code start here
        if($_FILES['pro_img']['error'] == 0 && $_FILES['pro_img']['type']=="image/jpeg"){ //Check image errors
          //can  upload
          $filename    = $_FILES['pro_img']['tmp_name'];
          $destination = $last_id . "_".rand().rand().rand().".jpg";
          $image       = "products/large/".$destination;

          $y = move_uploaded_file($filename,"products/large/".$destination);

          $image_info  = getimagesize($image);

          $width = $image_info[0];
          $height = $image_info[1];


          if ($width == 500 && $height == 700) { //Check image dimentions

            if($y>0){ //image successfully copied to folder

              //lets update the product table's picture column with the generated file name
              $sql2 = "update product set pro_img='$destination' where pro_id=$last_id";

              //execute the sql command
              $z = $mysqli->query($sql2);

              //lets copy the image to thumb folder then resize it to a smaller size
              copy("products/large/".$destination,"products/thumb/".$destination);

              //lets resize it
              resizeThumbPicture("products/thumb/",$destination);

              header("location:add_product_1.php?add_status=pass");
            }
          }
          else { //image dimentions not accepted

            //sql command to delete unmatched dimentions record
            $sql3 = "delete from product where pro_id = $last_id";

            //execute sql command
            $d = $mysqli->query($sql3);

            //delete image from destination folder
            unlink("products/large/$destination");

            header("location:add_product_1.php?add_status=fail");
          }
        }
        else {

          //sql command to delete unmatched dimentions record
          $sql3 = "delete from product where pro_id = $last_id";

          //execute sql command
          $d = $mysqli->query($sql3);

          header("location:add_product_1.php?add_status=fail");
        }
      //upload code ends here
    }
    else{ //Record wasn't added to database
      header("location:add_product_1.php?add_status=fail");
    }

 ?>
