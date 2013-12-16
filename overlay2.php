<?php 

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

//$file1 = resize_image('http://i.imgur.com/30v87S8.png', 100, 100);
//$img = '/badge.png';
//file_put_contents($img, file_get_contents($file1));

//This file path DOES NOT change
$file2 = 'http://i.imgur.com/JBqXqTW.png';

// First image
$image = resize_image('http://i.imgur.com/YGsIlOx.png', 100, 100);//imagecreatefrompng($file1);
//$image->resize(100,100);

// Second image (the overlay)
$overlay = imagecreatefrompng($file2);

// We need to know the width and height of the overlay
list($width, $height, $type, $attr) = getimagesize($file2);

// Apply the overlay
imagecopy($image, $overlay, 0, 0, 0, 0, $width, $height);
imagedestroy($overlay);

// Output the results
header('Content-type: image/png');
imagepng($image, 'badge4.png');
imagedestroy($image);

?>