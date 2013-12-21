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
    $save_file = '/badge.png';

    imagepng($image, 'badge.png');
    //header("Location: http://easybadge.herokuapp.com/badge.png");
    //exit();
    echo '<img src="' . $save_file . '"/>';
    /*echo '<div class="img_holder"><img src="' . $save_file . '"/></div></div><div class="badge_line"><img src="/badge_line.png"></div><div class="contributer"><p>Created by Brent Scheibelhut</p></div>
      <div class="copyright"><p>Copyright &#169; Brent Scheibelhut</p></div>';*/
    imagedestroy($image);

    exit;
}

?>
