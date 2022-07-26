<?php

  require("validate_admin.php");
  //adding a new record to the table product in the db_ad4850 database

  //1st lets connect to the database server
  require("db_connection.php");
  require("code_lib.inc.php");

  //store the form field values to variables
    $pro_id       = $_REQUEST['pro_id'];

    //building a dynamic sql command
    $sql = "delete from product where pro_id=$pro_id";

    //lets execute the sql command
    $x = $mysqli->query($sql);

    header("location:delete_product_1.php?delete_status=pass");

?>
