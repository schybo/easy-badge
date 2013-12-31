<?php
//Сheck that we have a file
if((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0)) {
  //Check if the file is JPEG image and it's size is less than 350Kb
  $filename = basename($_FILES['uploaded_file']['name']);
  $ext = substr($filename, strrpos($filename, '.') + 1);
  if (((($ext == "png") && ($_FILES["uploaded_file"]["type"] == "image/png")) ||
    (($ext == "gif") && ($_FILES["uploaded_file"]["type"] == "image/gif")) ||
    ((($ext == "jpg") || ($ext == "jpeg")) && ($_FILES["uploaded_file"]["type"] == "image/jpeg"))) && 
    ($_FILES["uploaded_file"]["size"] < 500000)) {
    //Determine the path to which we want to save this file
      //$temp_file = tempnam(sys_get_temp_dir(), $_FILES['uploaded_file']['name']);
      //$newname = dirname(__FILE__).'/upload/'.$filename;
      $newname = dirname(__FILE__).'/upload/upload.'.$ext;
      //Check if the file with the same name is already exists on the server
      //if (!file_exists($newname)) {
        //Attempt to move the uploaded file to it's new place
        if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname))) {
           //echo "It's done! The file has been saved as: ".$newname;

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

            list($width, $height, $type, $attr) = getimagesize($newname);

            if ($width > 880) {
              $image = resize_width($newname, 700);
            } else {
              if ($type == 1) { //Checking to see if it is a GIF
                  $image = imagecreatefromgif($newname);
              } elseif ($type == 2) { //Checking to see if it is a JPEG
                  $image = imagecreatefromjpeg($newname);
              } elseif ($type == 3) { //Checking to see if it is a PNG
                  $image = imagecreatefrompng($newname);
              } else {
                  include_once("top_html.php");
                  echo '<div class="error_msg">Sorry that image type is not supported</div></div><div class="badge_line"><img src="/badge_line.png"></div><div class="contributer"><p>Created by Brent Scheibelhut</p></div>
              <div class="copyright"><p>Contact brent@scheibelhut.com For Bug Fixes</p></div>';
                  exit;
              }
            }

            imagejpeg($image, 'pre.jpg');
            //header("Location: http://easybadge.herokuapp.com/badge.png");
            //exit();
            imagedestroy($image);

        } else {
           include_once("top_html.php");
           echo '<div class="error_msg">Error: A problem occurred during file upload!</div></div><div class="badge_line"><img src="/badge_line.png"></div><div class="contributer"><p>Created by Brent Scheibelhut</p></div>
  <div class="copyright"><p>Contact brent@scheibelhut.com For Bug Fixes</p></div>';
           exit;
        }
      /*} else {
         include_once("top_html.php");
         echo '<div class="error_msg">Error: File "' .$_FILES["uploaded_file"]["name"]. '" already </div></div><div class="badge_line"><img src="/badge_line.png"></div><div class="contributer"><p>Created by Brent Scheibelhut</p></div>
  <div class="copyright"><p>Contact brent@scheibelhut.com For Bug Fixes</p></div>';
         exit;
      }*/
  } else {
     include_once("top_html.php");
     echo '<div class="error_msg">Error: Only .png, .jpg &#38; .gif images under 500Kb are accepted for upload</div></div><div class="badge_line"><img src="/badge_line.png"></div><div class="contributer"><p>Created by Brent Scheibelhut</p></div>
  <div class="copyright"><p>Contact brent@scheibelhut.com For Bug Fixes</p></div>';
     exit;
  }
} else {
 include_once("top_html.php");
 echo '<div class="error_msg">Error: No file uploaded</div></div><div class="badge_line"><img src="/badge_line.png"></div><div class="contributer"><p>Created by Brent Scheibelhut</p></div>
  <div class="copyright"><p>Contact brent@scheibelhut.com For Bug Fixes</p></div>';
 exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>EasyBadge Creator</title>
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
        <img src="pre.jpg" id="cropbox" />

        <!-- This is the form that our event handler fills -->
        <form action="crop_new.php" method="post" onsubmit="return checkCoords();">
            <input type="hidden" id="x" name="x" />
            <input type="hidden" id="y" name="y" />
            <input type="hidden" id="w" name="w" />
            <input type="hidden" id="h" name="h" />
            <div class="center">
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