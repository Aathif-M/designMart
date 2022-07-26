<?php
  //start the session facility
  session_start();

  //connect to database server
  require("db_connection.php");

  //lets capture values to variables

  $email     = $_REQUEST['email'];
  $access_code = $_REQUEST['access_code'];

  //lets build the dynamic sql command
  $sql = "select * from user where email='$email'";

  //execute the sql command
  $rs = $mysqli->query($sql);

  if(mysqli_num_rows($rs)>0){  //Checking for No. of rows = 0

    $row = mysqli_fetch_assoc($rs);  //Assigning acquired rows to $row

    if($row['access_code'] == crypt($access_code,$row['access_code'])){  //Matching access_code

      if ($row['user_group'] == 'user') {
        // code...
        $_SESSION['email']    = $email;
        $_SESSION['user_group']    = $row['user_group'];
        header("location:account.php?status=logged");
      }
      else {
        header("location:login.php?status=fail");
      }
    }
    else{  //access_code not matched
      header("location:login.php?status=fail");
    }
  }
  else{  //Matchingemail not foud
    header("location:login.php?status=fail");
  }

 ?>
