<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>EasyBadge Creator</title>
  <meta name="description" content="EasyBadge Creator - create badges with fancy rims for gamification in the work place easily">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="css/styles.css?v=1.0">
</head>
<body>

<ul>
  <li>Upload an image (with a ratio of 1:1) to site which hosts images (Eg. Imgur)</li>
  <li>Provide the direct link to the image (on Imgur this is called the 'Direct Link' in the sidebar)</li>
  <li>Note if the image is larger than 100&#42;100, it will resize the image and the quality could possibly be reduced</li>
  <li>Therefore try to upload badges than are originally 100&#42;100</li>
  <li>You may have to play around with different sizes (such as 90&#42;90) to get the crop that works best</li>
  <li><b>Note:</b> Imgur provides easy access to crop and resize your image by clicking 'Edit Image'</li>
  <li><b>Note:</b> Currently this badge creator only overlays the image. So no 3D badge creations are available</li>
  <li><b>Note:</b> At this time we only support .PNG &#38; .GIF due to limitations of the Heroku hosting</li>
</ul>

<form action="overlay2.php" method="post">
Address of image: <input type="text" name="img_loc"><br>
<input type="Submit" name="Submit">
</form>

</body>
</html>