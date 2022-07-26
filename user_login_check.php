<?php

  if (isset($_SESSION['email'])) {
    if ($_SESSION['user_group'] == 'user') {
      // header("location:account.php");
    }
    else {
      header("location:login.php");
    }
  }
  else {
    header("location:login.php");
  }
 ?>
