<?php
header('Content-Type: image/png');

//TODO Could make this automated? Read a text file containing the image locations and combine them? 

//Distance between the two images
$gap=0

//Open images
$image1=imagecreatefromgd('http://parisbre56-phpexperiment.rhcloud.com/test_image.php');
$image2=imagecreatefromgd('http://parisbre56-phpexperiment.rhcloud.com/test_image_death.php');

//Get size
$image1_x=imagesx($image1);
$image1_y=imagesy($image1);

$image2_x=imagesx($image2);
$image2_y=imagesy($image2);

//Compute new size
$new_x=$image1_x+$gap+$image2_x;
$new_y=max($image1_y,$image2_y);

//Create new image
$new=imagecreatetruecolor($new_x,$new_y);

//Copy images to new image
imagecopy($new,$image1,0,0,0,0,$image1_x,$image1_y);
imagecopy($new,$image2,$image1_x+$gap,0,0,0,$image2_x,$image2_y);

//Output image to browser and destroy local resources
imagepng($new);

imagedestroy($image1);
imagedestroy($image2);
imagedestroy($new);

?>
