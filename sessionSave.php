<?php

  require("db_connection.php");

  $email = $_SESSION['email'];

  $sql = "select * from user where email='$email'";

  $rs = $mysqli->query($sql);

  if(mysqli_num_rows($rs)>0){
    $row = mysqli_fetch_assoc($rs);
  }
// print_r($row);

 ?>
