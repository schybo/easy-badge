<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>EasyBadge Creator</title>
  <meta name="description" content="EasyBadge Creator - create badges with fancy rims for gamification in the work place easily">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="/style.css" type="text/css" charset="utf-8" >
  <style type="text/css">
	.header {
		font-family: 'vag_rounded_black_ssibold';
	}
  </style>
</head>
<body>
<div class="header"> EasyBadge Creator </div>
<div class="instruction">
	<ol>
	  <li>Upload an image (with a ratio of 1:1) to a site that hosts images (Eg. Imgur)</li>
	  <li>Provide the direct link to the image (on Imgur this is called the 'Direct Link' in the sidebar)</li>
	</ol>
	<div class="address">
		<form action="overlay2.php" method="post">
		Address of image: <input type="text" name="img_loc"><br></div>
	<div class="submit">
		<input type="Submit" name="Submit" style="width:100px; height:100px;">
		</form>
	</div>
	</br>
	<ul>
	  <li><b>Note:</b> if the image is larger than 100&#42;100, EasyBadge will resize the image (quality could be reduced)</li>
	  <li><b>Note:</b> To make sure you don't lose quality, try to upload badges than are originally 100&#42;100</li>
	  <li><b>Note:</b> You may have to play around with different sizes (such as 90&#42;90) to get the crop that works best</li>
	  <li><b>Note:</b> Imgur provides easy access to crop and resize your image by clicking 'Edit Image'</li>
	  <li><b>Note:</b> Currently this badge creator only overlays the image. So no 3D badge creations are available</li>
	  <li><b>Note:</b> At this time we only support .PNG &#38; .GIF due to limitations of the Heroku hosting</li>
	</ul>
</div>
<div class="badge_line"><img src="/badge_line.png"></div>
</body>
</html>