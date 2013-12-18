<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>EasyBadge Creator</title>
  <meta name="description" content="EasyBadge Creator - create badges with fancy rims for gamification in the work place easily">
  <meta name="author" content="SitePoint">
  <link rel="icon" href="favicon.ico" type="image/x-icon" />

  <link rel="stylesheet" href="/style.css" type="text/css" charset="utf-8" >
  <style type="text/css">
  .header, .xxsm_header {
    font-family: 'vag_rounded_black_ssibold';
  }
  body{
    font-family: 'cartogothic_stdregular', Helvetica,Arial,sans-serif;
  }
  </style>
  <!-- Attach our CSS -->
  <link rel="stylesheet" href="reveal.css"> 
  
  <!-- Attach necessary scripts -->
  <!-- <script type="text/javascript" src="jquery-1.4.4.min.js"></script> -->
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
  <script type="text/javascript" src="jquery.reveal.js"></script>
</head>
<body>
<div class="top">
  <img src="logo.png">
</div>
<div class="first">
  <div class="head1">Thank you for using EasyBadge</div>
  <div class="head2">Please right click the image and choose 'Save As' to download them image</div>
</body>
</html>

<?php
//Сheck that we have a file
if((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0)) {
  //Check if the file is JPEG image and it's size is less than 350Kb
  $filename = basename($_FILES['uploaded_file']['name']);
  $ext = substr($filename, strrpos($filename, '.') + 1);
  if (((($ext == "png") && ($_FILES["uploaded_file"]["type"] == "image/png")) ||
    (($ext == "gif") && ($_FILES["uploaded_file"]["type"] == "image/gif")) ||
    (($ext == "jpg") && ($_FILES["uploaded_file"]["type"] == "image/jpeg"))) && 
    ($_FILES["uploaded_file"]["size"] < 350000)) {
    //Determine the path to which we want to save this file
      //$temp_file = tempnam(sys_get_temp_dir(), $_FILES['uploaded_file']['name']);
      $newname = dirname(__FILE__).'/upload/'.$filename;
      //Check if the file with the same name is already exists on the server
      if (!file_exists($newname)) {
        //Attempt to move the uploaded file to it's new place
        if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname))) {
           //echo "It's done! The file has been saved as: ".$newname;

            function resize_image($file, $w, $h, $crop=FALSE) {
                list($width, $height, $type, $attr) = getimagesize($file);
                $r = $width / $height;
                if ($crop) {
                    if ($width > $height) {
                        $width = ceil($width-($width*abs($r-$w/$h)));
                    } else {
                        $height = ceil($height-($height*abs($r-$w/$h)));
                    }
                    $newwidth = $w;
                    $newheight = $h;
                } else {
                    if ($w/$h > $r) {
                        $newwidth = $h*$r;
                        $newheight = $h;
                    } else {
                        $newheight = $w/$r;
                        $newwidth = $w;
                    }
                }
                if ($type == 1) {
                  $src = imagecreatefromgif($file);
                } elseif ($type == 2) {
                  $src = imagecreatefromjpeg($file);
                } elseif ($type == 3) {
                  $src = imagecreatefrompng($file);
                } else {
                  echo '<div class="error_msg">Sorry that image type is not supported</div></div><div class="badge_line"><img src="/badge_line.png"></div>';
                }
                $dst = imagecreatetruecolor($newwidth, $newheight);
                imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

                return $dst;
            }

            //This file path DOES NOT change
            //This is the hardcoded badge overlay
            //$file2 = 'http://i.imgur.com/JBqXqTW.png';
            $file2 = 'badge-ring.png';

            // First image
            list($width, $height, $type, $attr) = getimagesize($newname);

            if ($width == 100 && $height == 100) {
              //$image = imagecreatefrompng($img_loc);
              if ($type == 1) { //Checking to see if it is a GIF
                $image = imagecreatefromgif($newname);
              } elseif ($type == 2) { //Checking to see if it is a JPEG
                $image = imagecreatefromjpeg($newname);
              } elseif ($type == 3) { //Checking to see if it is a PNG
                $image = imagecreatefrompng($newname);
              } else {
                echo '<div class="error_msg">Sorry that image type is not supported</div></div><div class="badge_line"><img src="/badge_line.png"></div>';
              }
            } else {
              $image = resize_image($newname, 100, 100);
            }

            // Second image (the overlay)
            $overlay = imagecreatefrompng($file2);

            // We need to know the width and height of the overlay
            list($width, $height, $type, $attr) = getimagesize($file2);

            // Apply the overlay
            imagecopy($image, $overlay, 0, 0, 0, 0, $width, $height);
            imagedestroy($overlay);

            //filename to save badge to
            $save_file = '/badge.png';

            // Output the results
            //echo '<div class="header">Thank you for using EasyBadge Creator!</div>';
            //echo '</br>';
            //echo '<div class="sm_header">Please right click the image and choose save as to download them image</div>';
            //header('Content-type: image/png');
            imagepng($image, 'badge.png');
            //header("Location: http://easybadge.herokuapp.com/badge.png");
            //exit();
            echo '<div class="img_holder"><img src="' . $save_file . '"/></div></div><div class="badge_line"><img src="/badge_line.png"></div>';
            //echo '<img src="' . $save_file . '"/>';
            imagedestroy($image);
            //echo $newname;
            //array_map('unlink', glob("/upload/*.png"));
            //array_map('unlink', glob("/upload/*.gif"));
            //unlink($filepath);
            //$file_loc = '/upload/'.$filename;
            //unlink($file_loc);
        } else {
           echo '<div class="error_msg">Error: A problem occurred during file upload!</div></div><div class="badge_line"><img src="/badge_line.png"></div>';
        }
      } else {
         echo '<div class="error_msg">Error: File "' .$_FILES["uploaded_file"]["name"]. '" already </div></div><div class="badge_line"><img src="/badge_line.png"></div>';
      }
  } else {
     echo '<div class="error_msg">Error: Only .png, .jpg &#38; .gif images under 350Kb are accepted for upload</div></div><div class="badge_line"><img src="/badge_line.png"></div>';
  }
} else {
 echo '<div class="error_msg">Error: No file uploaded</div></div><div class="badge_line"><img src="/badge_line.png"></div>';
}
?>