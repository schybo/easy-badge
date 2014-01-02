<?php 

//session_start();

if (isset($_POST['Submit'])) { 
  $img_loc = strip_tags($_POST["img_loc"]);
  //echo "Image width " .$img_loc; 

  function resize_width($file, $w) {
      // Loading the image and getting the original dimensions
      list($width, $height, $type, $attr) = getimagesize($file);

      if ($type == 1) {
        $image = imagecreatefromgif($file);
      } elseif ($type == 2) {
        $image = imagecreatefromjpeg($file);
      } elseif ($type == 3) {
        $image = imagecreatefrompng($file);
      } else {
        include_once("top_html.php");
        echo '<div class="error_msg">Sorry that image type is not supported</div></div><div class="badge_line"><img src="/badge_line.png"></div><div class="contributer"><p>Created by Brent Scheibelhut</p></div>
<div class="copyright"><p>Contact brent@scheibelhut.com For Bug Fixes</p></div>';
        exit;
      }

      $orig_width = imagesx($image);
      $orig_height = imagesy($image);
      $width = $w;

      // Calc the new height
      $height = (($orig_height * $width) / $orig_width);

      // Create new image to display
      $new_image = imagecreatetruecolor($width, $height);

      // Create new image with changed dimensions
      imagecopyresized($new_image, $image,
        0, 0, 0, 0,
        $width, $height,
        $orig_width, $orig_height);

      return $new_image;
  }



  list($width, $height, $type, $attr) = getimagesize($img_loc);


  if ($width > 880) {
    $image = resize_width($img_loc, 700);
  } else {
    if ($type == 1) { //Checking to see if it is a GIF
        $image = imagecreatefromgif($img_loc);
    } elseif ($type == 2) { //Checking to see if it is a JPEG
        $image = imagecreatefromjpeg($img_loc);
    } elseif ($type == 3) { //Checking to see if it is a PNG
        $image = imagecreatefrompng($img_loc);
    } else {
        include_once("top_html.php");
        echo '<div class="error_msg">Sorry that image type is not supported</div></div><div class="badge_line"><img src="/badge_line.png"></div><div class="contributer"><p>Created by Brent Scheibelhut</p></div>
    <div class="copyright"><p>Contact brent@scheibelhut.com For Bug Fixes</p></div>';
        exit;
    }
  }

  //filename to save badge to
  //$save_file = '/pre.png';
  $temp_name = tempnam("/", "pre") . ".jpg";
  $temp2_name = str_replace("/tmp", "", $temp_name);
  //$save_file = str_replace("/tmp", "", $temp_name);
  //echo $save_file;
  //$save_file = '/badge.png';
  //$good_save = str_replace("/", "", $save_file);
  //$pre_image = str_replace("/", "", $temp_name);
  $pre_image = str_replace("/", "", $temp2_name);
  //$_POST['pre_pic'] = $pre_image; 
  //echo $pre_image;

  //imagejpeg($image, 'pre.jpg');
  imagejpeg($image, $pre_image);
  //header("Location: http://easybadge.herokuapp.com/badge.png");
  //exit();
  imagedestroy($image);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Live Cropping Demo</title>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  <script src="/js/jquery.min.js"></script>
  <script src="/js/jquery.Jcrop.js"></script>
  <link rel="stylesheet" href="/css/main.css" type="text/css" />
  <link rel="stylesheet" href="/css/demos.css" type="text/css" />
  <link rel="stylesheet" href="/css/jquery.Jcrop.css" type="text/css" />

<script type="text/javascript">

  $(function(){

    $('#cropbox').Jcrop({
      aspectRatio: 1,
      onSelect: updateCoords
    });

  });

  function updateCoords(c)
  {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  };

  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    alert('Please select a crop region then press submit.');
    return false;
  };

</script>
<style type="text/css">
  #target {
    background-color: #ccc;
    width: 500px;
    height: 330px;
    font-size: 24px;
    display: block;
  }
</style>

  <link rel="stylesheet" href="/css/style.css" type="text/css" charset="utf-8" >
  <style type="text/css">
  .nothing {
    font-family: 'vag_rounded_black_ssibold';
  }
  body{
    font-family: 'cartogothic_stdregular', Helvetica,Arial,sans-serif;
  }
  </style>
  <!-- Attach our CSS -->
  <link rel="stylesheet" href="/css/reveal.css">  
  
  <!-- Attach necessary scripts -->
  <!-- <script type="text/javascript" src="jquery-1.4.4.min.js"></script> -->
  <script type="text/javascript" src="/js/jquery.reveal.js"></script>

</head>
<body>
<div class="top">
  <div class="head_logo">
    <a href="/index.php"><img src="/images/logo_bad.png"></a>
  </div>
  <div class="work_logo">
    <a href="http://work.com"><img src="/images/work_blue.jpg"></a>
  </div>
</div>
<div class="container">
<div class="row">
<div class="span12">
<div class="jc-demo-box">

<div class="page-header">
<h1>Crop Your Badge!</h1>
</div>

        <!-- This is the image we're attaching Jcrop to -->
        <img src="<?php echo $pre_image ?>" id="cropbox" />

        <!-- This is the form that our event handler fills -->
        <form action="crop_new.php?pre_image=<?php echo $pre_image ?>" method="post" onsubmit="return checkCoords();">
            <input type="hidden" id="x" name="x" />
            <input type="hidden" id="y" name="y" />
            <input type="hidden" id="w" name="w" />
            <input type="hidden" id="h" name="h" />
            <div class="center">
              <!--<input type="hidden" name="pre_image" value="pre_image" />-->
              <input type="submit" value="Crop Image" class="btn btn-large btn-inverse" />
            </div>
        </form>

    </div>
    </div>
    </div>
    </div>
    <div class="footer_other">
      <div class="badge_line"><img src="/badge_line.png"></div>
      <div class="contributer"><p>Created by Brent Scheibelhut</p></div>
      <div class="copyright"><p>Contact brent@scheibelhut.com For Bug Fixes</p></div>
    </div>
</body>

</html>
