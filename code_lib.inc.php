<?php
/* image resize function starts here */
function resizeThumbPicture($path, $image_name)	{
  $uploadedfile = $path.$image_name;//actual path of the image


  // Capture the original size of the uploaded image
  list($width,$height,$type) = getimagesize($uploadedfile);


  if(@$width==@$height){
    @$newwidth=150;
    @$newheight=150;
  }
  else if(@$width>@$height){
    //landscape
    @$newwidth=150;
    @$newheight=120;
  }
  else if(@$height>@$width){
    //portrait
    @$newwidth=85;
    @$newheight=112;
  }



  if($type==1)
  {
    $src = imagecreatefromgif(@$uploadedfile);
  }
  else if($type==2)
  {
    $src = imagecreatefromjpeg(@$uploadedfile);
  }
  else if($type==3)
  {
    $src = imagecreatefrompng(@$uploadedfile);
  }


  @$tmp=imagecreatetruecolor(@$newwidth,@$newheight);
  imagecopyresampled($tmp,$src,0,0,0,0,@$newwidth,@$newheight,@$width,@$height);
  @$filename = $path.$image_name;
  imagejpeg($tmp,$filename,100);//100 means full 100% quality
  imagedestroy($src);
  imagedestroy($tmp); // NOTE: PHP will clean up the temp

  }/* image resize function ends   here */

//************ file resize code with PHP end


 //get the picture name from product table via pid
 function getProductPicture($pro_id){
   global $mysqli;
   $sql = "select pro_img from product where pro_id=$pro_id";
   $rs  = $mysqli->query($sql);
   $row = mysqli_fetch_assoc($rs);
   return $row['pro_img'];
 }


 ?>
