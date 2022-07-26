<?php
  session_start();
  //lets validate the user

  if($_SESSION['user_group'] == 'admin'){
    //redirect the user to relavant page

  }
  else {
    header("location:admin_login.php?validation=fail");
  }
 ?>
