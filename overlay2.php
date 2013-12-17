<?php 

session_start();

if (isset($_POST['Submit'])) { 
	$img_loc = strip_tags($_POST["img_loc"]);
	//echo "Image width " .$img_loc; 

function resize_image($file, $w, $h, $crop=FALSE) {
    list($width, $height) = getimagesize($file);
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
    $src = imagecreatefrompng($file);
    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    return $dst;
}

//echo "Thank you for using EasyBadge Creator 1!";
//This file path DOES NOT change
$file2 = 'http://i.imgur.com/JBqXqTW.png';

// First image
list($width, $height, $type, $attr) = getimagesize($img_loc);
//echo "Image width " .$width;
//echo "Image type " .$type;
//echo "Image type " .IMAGETYPE_PNG;

if ($width == 100 && $height == 100) {
	$image = imagecreatefrompng($img_loc);
	/*if ($type == 2) { //Checking to see if it is a JPEG
		$image = imagecreatefromjpeg($img_loc);
	} elseif ($type == 3) { //Checking to see if it is a PNG
		$image = imagecreatefrompng($img_loc);
	} else {
		echo "Sorry that image type is not supported";
	}*/
} else {
	$image = resize_image($img_loc, 100, 100);
}

//echo "Thank you for using EasyBadge Creator! 2";
// Second image (the overlay)
$overlay = imagecreatefrompng($file2);

// We need to know the width and height of the overlay
list($width, $height, $type, $attr) = getimagesize($file2);

// Apply the overlay
imagecopy($image, $overlay, 0, 0, 0, 0, $width, $height);
imagedestroy($overlay);

//filename to save badge to
$save_file = 'http://easybadge.herokuapp.com/badge.png';

// Output the results
//echo "Thank you for using EasyBadge Creator!";
//header('Content-type: image/png');
imagepng($image, 'badge.png');
//header("Location: http://easybadge.herokuapp.com/badge.png");
//exit();
echo '</br><img src="' . $save_file . '"/>';
imagedestroy($image);

}

?>