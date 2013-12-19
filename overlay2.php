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

session_start();

if (isset($_POST['Submit'])) { 
	$img_loc = strip_tags($_POST["img_loc"]);
	//echo "Image width " .$img_loc; 

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
      echo '<div class="error_msg">Sorry that image type is not supported</div></div><div class="badge_line"><img src="/badge_line.png"></div><div class="contributer"><p>Created by Brent Scheibelhut</p></div>
	<div class="copyright"><p>Copyright &#169; Brent Scheibelhut</p></div>';
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
list($width, $height, $type, $attr) = getimagesize($img_loc);
//echo "Image width " .$width;
//echo "Image type " .$type;
//echo "Image type " .IMAGETYPE_PNG;

if ($width == 100 && $height == 100) {
	//$image = imagecreatefrompng($img_loc);
	if ($type == 1) { //Checking to see if it is a GIF
	    $image = imagecreatefromgif($newname);
	} elseif ($type == 2) { //Checking to see if it is a JPEG
	    $image = imagecreatefromjpeg($newname);
	} elseif ($type == 3) { //Checking to see if it is a PNG
	    $image = imagecreatefrompng($newname);
	} else {
	    echo '<div class="error_msg">Sorry that image type is not supported</div></div><div class="badge_line"><img src="/badge_line.png"></div><div class="contributer"><p>Created by Brent Scheibelhut</p></div>
	<div class="copyright"><p>Copyright &#169; Brent Scheibelhut</p></div>';
	}
} else {
	// The function resize_image create the image from the file
	$image = resize_image($img_loc, 100, 100);
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
imagedestroy($image);

}

?>