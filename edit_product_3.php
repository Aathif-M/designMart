<?php
  require("validate_admin.php");

  //connecting to the database server
  require("db_connection.php");

  require("code_lib.inc.php");

  //lets copy the form field values to variables
  $pro_id         = $_REQUEST['pro_id'];
  $pro_name       = $_REQUEST['pro_name'];
  $pro_material   = $_REQUEST['pro_material'];
  $pro_price      = $_REQUEST['pro_price'];
  $pro_category     = $_REQUEST['pro_category'];

  //lets build a dynamic sql command
  $sql  = "update product set ";
  $sql .= "pro_name='$pro_name',";
  $sql .= "pro_material='$pro_material',";
  $sql .= "pro_category='$pro_category',";
  $sql .= "pro_price=$pro_price where pro_id=$pro_id";

  //execute the sql command
  $x = $mysqli->query($sql);

  if($x > 0){

    //file upload code starts here
      if($_FILES['pro_img']['error']==0 && $_FILES['pro_img']['type']=="image/jpeg"){
        //we can proceed with the upload

        $old_picture_name = getProductPicture($pro_id);

        $filename = $_FILES['pro_img']['tmp_name'];
        $destination;

        if($old_picture_name=="default.jpg"){
            //generate  a new file name
            $destination = $pro_id . "_" . rand().rand().rand().".jpg";
        }
        else{
           $destination = $old_picture_name;
        }


        $image       = "products/large/".$destination;

        $y = move_uploaded_file($filename,"products/large/".$destination);

        $image_info  = getimagesize($image);

        $width = $image_info[0];
        $height = $image_info[1];

        if ($width == 500 && $height == 700) {

          if($y>0){

            //lets update the product table's picture column with the generated file name
            $sql2 = "update product set pro_img='$destination' where pro_id=$pro_id";

            //execute the sql command
            $z = $mysqli->query($sql2);

            //lets copy the image to thumb folder then resize it to a smaller size
            copy("products/large/".$destination,"products/thumb/".$destination);

            //lets resize it
            resizeThumbPicture("products/thumb/",$destination);

            header("location:edit_product_1.php?edit_status=pass");
          }
        }
        else {
          //delete image from destination folder
          unlink("products/large/$destination");

          $sql3 = "update product set pro_img = 'default.jpg' where pro_id = $pro_id";
          $u = $mysqli->query($sql3);

          header("location:edit_product_2.php?edit_status=fail&pro_id=$pro_id");
        }
      }
      else {
        header("location:edit_product_1.php?edit_status=pass");
      }
    //file upload code ends here

  }
  else{
    header("location:edit_product_2.php?edit_status=fail");
  }

 ?>
