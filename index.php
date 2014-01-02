<!doctype html>

<html lang="en">
<head>
  <!-- Update your html tag to include the itemscope and itemtype attributes. -->
  <html itemscope itemtype="http://schema.org/CreativeWork">
  <meta charset="utf-8">

  <title>EasyBadge Creator</title>
  <meta name="description" content="EasyBadge Creator - create badges with fancy rims for gamification in the work place easily">
  <meta name="author" content="SitePoint">
  <link rel="icon" href="favicon.ico" type="image/x-icon" />
  	<!-- Google Authorship and Publisher Markup -->
	<link rel="author" href="https://plus.google.com/109561166639292857885/posts"/>
	<link rel="publisher" href="https://plus.google.com/109561166639292857885"/>

	<!-- Schema.org markup for Google+ -->
	<meta itemprop="name" content="EasyBadge Creator">
	<meta itemprop="description" content="Easily create fancy badges for Work.com or other recognition programs">
	<meta itemprop="image" content="http://easybadge.herokuapp.com/images/logo_bad.png">

	<!-- Twitter Card data -->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@4schybo">
	<meta name="twitter:title" content="EasyBadge">
	<meta name="twitter:description" content="Easily create fancy badges for Work.com or other recognition programs">
	<meta name="twitter:creator" content="@4Schybo">
	<!-- Twitter summary card with large image must be at least 280x150px -->
	<meta name="twitter:image:src" content="http://easybadge.herokuapp.com/images/logo_bad.png">

	<!-- Open Graph data -->
	<meta property="og:title" content="EasyBadge" />
	<meta property="og:type" content="CreativeWork" />
	<meta property="og:url" content="http://easybadge.herokuapp.com" />
	<meta property="og:image" content="http://easybadge.herokuapp.com/images/logo_bad.png" />
	<meta property="og:description" content="Easily create fancy badges for Work.com or other recognition programs" />
	<meta property="og:site_name" content="Easy Badge" />
	<meta property="article:published_time" content="2013-12-15T05:59:00+01:00" />
	<meta property="article:modified_time" content="2013-12-15T19:08:47+01:00" />
	<meta property="fb:admins" content="Facebook numberic ID" />

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
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
  <script type="text/javascript" src="/js/jquery.reveal.js"></script>
</head>
<body>
<?php include_once("analyticstracking.php") ?>
<div class="top">
	<div class="head_logo">
		<img src="/images/logo_bad.png">
	</div>
	<div class="work_logo">
		<a href="http://work.com"><img src="/images/work_blue.jpg"></a>
	</div>
</div>
<div class="first">
	<a href="#" class="info" data-reveal-id="myModal" data-animation="fade">
		<div class="cta">
			?
		</div>
	</a>
	<div class="header">
		Create a badge from a file on your computer:
	</div>
	<div class="instruction1">
	<ol>
	  <li>Upload an image</li>
	</ol>
	</div>
	<div class="choose_holder">
		<form enctype="multipart/form-data" action="upload2.php" method="post">
	    <input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
	    Choose a file to upload: <input name="uploaded_file" type="file"/>
    </div>
    <div class="upload_holder">
    <input type="submit" value="Upload" class="upload"/>
 		</form> 
 	</div>
</div>
<div class="second">
	<a href="#" class="info" data-reveal-id="myModal" data-animation="fade">
		<div class="cta">
			?
		</div>
	</a>
	<div class="header">
		Create a badge from a file on the web:
	</div>
	<div class="instruction2">
	<ol>
	  <li>Paste a direct link to and image on the web</li>
	  <!--<li>Upload an square image (ratio of 1:1) to a site that hosts images (Eg. Imgur)</li>
	  <li>Provide the direct link to the image (on Imgur this is called the 'Direct Link' in the sidebar)</li>-->
	</ol>
	</div>
	<div class="address">
		<form action="crop_web.php" method="post">
		Address of image: <input type="text" name="img_loc"><br></div>
	<div class="submit">
		<input type="Submit" name="Submit" class="button">
		</form>
	</div>
</div>
<div class="footer">
	<div class="badge_line"><img src="/badge_line.png"></div>
	<div class="contributer"><p>Created by Brent Scheibelhut</p></div>
	<div class="copyright"><p>Contact brent@scheibelhut.com For Bug Fixes</p></div>
</div>
<div id="myModal" class="reveal-modal">
	<h1>More Information</h1>
	<ul>
	  <!--<li>If the image is larger than 100&#42;100, EasyBadge will resize the image (quality could be reduced)</li>-->
	  <!--<li>To make sure you don't lose quality, try to upload badges than are originally 100&#42;100</li>-->
	  <li>You may have to play around with different crops to get one that works best</li>
	  <li>For images off imgur, the direct link is the one with 'i.imgur' and the file extension</li>
	  <li>Currently this badge creator only overlays the image. So no 3D badge creations are available</li>
	  <li>If applicable please use a white background instead of a transparent background. Transparency will become black. Not white</li>
	  <li>At this time we only support .PNG, .JPG &#38; .GIF</li>
	</ul>
	<a class="close-reveal-modal">&#215;</a>
</div>	
</body>
</html>