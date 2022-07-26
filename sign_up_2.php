<?php
  //1st lets connect to the database server

  require("db_connection.php");
  require("code_lib.inc.php");

  //store the form field values to variables
    $name         = $_REQUEST['name'];
    $contact_no   = $_REQUEST['contact_no'];
    $address      = $_REQUEST['address'];
    $email        = $_REQUEST['email'];
    $access_code  = crypt($_REQUEST['access_code'],"x07h");


  //building a dynamic sql command
     $sql  = "insert into user (email,access_code,name,address,contact_no) values(";
     $sql .= "'$email',";
     $sql .= "'$access_code',";
     $sql .= "'$name',";
     $sql .= "'$address',";
     $sql .= "$contact_no)";

    //lets execute the sql command
    $x = $mysqli->query($sql);


    if($x>0){

      session_start();

      $sql2 = "select * from user where email='$email'";

      $rs = $mysqli->query($sql2);

      if(mysqli_num_rows($rs)>0){  //Checking for No. of rows = 0

        $row = mysqli_fetch_assoc($rs);  //Assigning acquired rows to $row

        }


      $_SESSION['email']    = $email;
      $_SESSION['user_group']    = $row['user_group'];

      header("location:account.php?status=pass");
    }

    else{

      header("location:sign_up.php?status=fail");

    }

 ?>
