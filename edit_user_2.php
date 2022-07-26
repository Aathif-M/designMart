<?php
  require("user_login_check.php");
  //connecting to the database server

  require("db_connection.php");
  require("code_lib.inc.php");

  // print_r($_REQUEST);

  //lets copy the form field values to variables
  $email         = $_REQUEST['email'];
  $name          = $_REQUEST['name'];
  $contact_no    = $_REQUEST['contact_no'];
  $address       = $_REQUEST['address'];

  //lets build a dynamic sql command
  $sql  = "update user set ";
  $sql .= "name='$name',";
  $sql .= "contact_no=$contact_no,";
  $sql .= "address='$address' where email='$email'";


  //execute the sql command
  $x = $mysqli->query($sql);

  if($x > 0){
    // echo "successfully updated";

    header("location:account.php?status=updated");
  }
  else{
    // echo "saving changes failed";
    header("location:account.php?status=fail");
  }

 ?>
