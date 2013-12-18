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
	<div class="instruction1">
	<ol>
	  <li>Upload an image (with a ratio of 1:1) </li>
	</ol>
	</div>
	<div class="choose">
		<form enctype="multipart/form-data" action="upload.php" method="post">
	    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
	    Choose a file to upload: <input name="uploaded_file" type="file" />
    </div>
    <div class="upload">
    <input type="submit" value="Upload"/>
 		</form> 
 	</div>
 	<a href="#" class="info" data-reveal-id="myModal" data-animation="fade">
		<div class="cta">
			More Info
		</div>
	</a>
	<!--</br>
	<ul>
	  <li><b>Note:</b> If the image is larger than 100&#42;100, EasyBadge will resize the image (quality could be reduced)</li>
	  <li><b>Note:</b> To make sure you don't lose quality, try to upload badges than are originally 100&#42;100</li>
	  <li><b>Note:</b> You may have to play around with different sizes (such as 90&#42;90) to get the crop that works best</li>
	  <li><b>Note:</b> Imgur provides easy access to crop and resize your image by clicking 'Edit Image'</li>
	  <li><b>Note:</b> Currently this badge creator only overlays the image. So no 3D badge creations are available</li>
	  <li><b>Note:</b> At this time we only support .PNG &#38; .GIF due to limitations of the Heroku Buildpack</li>
	</ul>-->
</div>
<div class="second">
	<div class="instruction2">
	<ol>
	  <li>Upload an image (with a ratio of 1:1) to a site that hosts images (Eg. Imgur)</li>
	  <li>Provide the direct link to the image (on Imgur this is called the 'Direct Link' in the sidebar)</li>
	</ol>
	</div>
	<div class="address">
		<form action="overlay2.php" method="post">
		Address of image: <input type="text" name="img_loc"><br></div>
	<div class="submit">
		<input type="Submit" name="Submit" style="width:100px; height:100px;">
		</form>
	</div>
	<a href="#" class="info" data-reveal-id="myModal" data-animation="fade">
		<div class="cta">
			More Info
		</div>
	</a>
</div>
<div class="footer">
	<div class="badge_line"><img src="/badge_line.png"></div>
</div>
<div id="myModal" class="reveal-modal">
	<h1>More Information</h1>
	<ul>
	  <li>If the image is larger than 100&#42;100, EasyBadge will resize the image (quality could be reduced)</li>
	  <li>To make sure you don't lose quality, try to upload badges than are originally 100&#42;100</li>
	  <li>You may have to play around with different sizes (such as 90&#42;90) to get the crop that works best</li>
	  <li>Imgur provides easy access to crop and resize your image by clicking 'Edit Image'</li>
	  <li>Currently this badge creator only overlays the image. So no 3D badge creations are available</li>
	  <li>At this time we only support .PNG &#38; .GIF due to limitations of the Heroku Buildpack</li>
	</ul>
	<a class="close-reveal-modal">&#215;</a>
</div>	
</body>
</html>