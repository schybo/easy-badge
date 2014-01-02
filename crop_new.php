<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>EasyBadge Creator</title>
  <meta name="description" content="EasyBadge Creator - create badges with fancy rims for gamification in the work place easily">
  <meta name="author" content="SitePoint">
  <link rel="icon" href="favicon.ico" type="image/x-icon" />

  <link rel="stylesheet" href="/css/style.css" type="text/css" charset="utf-8" >
  <style type="text/css">
  .nothing{
    font-family: 'vag_rounded_black_ssibold';
  }
  body{
    font-family: 'cartogothic_stdregular', Helvetica,Arial,sans-serif;
  }
  </style>
  <!-- Attach our CSS -->
  <!--<link rel="stylesheet" href="/css/reveal.css">--> 
  
  <!-- Attach necessary scripts -->
  <!-- <script type="text/javascript" src="jquery-1.4.4.min.js"></script> -->
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
  <!--<script type="text/javascript" src="jquery.reveal.js"></script>-->
</head>
<body>
<?php include_once("analyticstracking.php") ?>
<div class="top">
  <div class="head_logo">
    <a href="/index.php"><img src="/images/logo_bad.png"></a>
  </div>
  <div class="work_logo">
    <a href="http://work.com"><img src="/images/work_blue.jpg"></a>
  </div>
</div>
<div class="first_other">
  <div class="head1">Thank you for using EasyBadge</div>
  <div class="head2">Please right click the image and choose 'Save As' to download them image</div>
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $targ_w = $targ_h = 100;
    $jpeg_quality = 90;
    $output_filename = 'cropped.png';

    $src = 'pre.jpg';
    $img_r = imagecreatefromjpeg($src);
    $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

    imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
    $targ_w,$targ_h,$_POST['w'],$_POST['h']);

    /*header('Content-type: image/jpeg');
    imagejpeg($dst_r,null,$jpeg_quality);*/

    // Comment out the header() call
    // header('Content-type: image/jpeg');

    imagejpeg($dst_r, $output_filename, $jpeg_quality);

    $file2 = 'badge-ring.png';

    $image = imagecreatefromjpeg($output_filename);

    // First image
    list($width, $height, $type, $attr) = getimagesize($img_loc);

    // Second image (the overlay)
    $overlay = imagecreatefrompng($file2);

    // We need to know the width and height of the overlay
    list($width, $height, $type, $attr) = getimagesize($file2);

    // Apply the overlay
    imagecopy($image, $overlay, 0, 0, 0, 0, $width, $height);
    imagedestroy($overlay);

    //filename to save badge to
    //$save_file = "/badge.png";
    $draft_save_file = tempnam("/", "badge") . ".png";
    $save_file = str_replace("/tmp", "", $draft_save_file);
    echo $save_file;
    //$save_file = '/badge.png';
    $good_save = str_replace("/", "", $save_file);
    //$good_save = $save_file;
    //$good_save = "badge.png";
    echo $good_save;
    //echo $good_save;

    imagepng($image, $good_save);
    //header("Location: http://easybadge.herokuapp.com/badge.png");
    //exit();
    //echo '<img src="' . $save_file . '"/>';
    echo '<div class="img_holder"><img src="' . $save_file . '"/></div><a href="javascript:history.go(-1)"><div class="new_crop">&lt;&lt; Try A New Crop</div></a></div><div class="badge_line"><img src="/badge_line.png"></div><div class="contributer"><p>Created by Brent Scheibelhut</p></div>
      <div class="copyright"><p>Contact brent@scheibelhut.com For Bug Fixes</p></div>';
    imagedestroy($image);

    exit;
}

?>
