<?php
header ('Content-type:image/gif');
include('GIFEncoder.class.php');

//Delay between frames
$delay=1000;

// Open the first source image
$image = imagecreatefrompng('http://parisbre56-phpexperiment.rhcloud.com/test_image.php');

// Generate GIF from the $image

// We want to put the binary GIF data into an array to be used later,
//  so we use the output buffer.
ob_start();
imagegif($image);
$frames[]=ob_get_contents();

// Delay in the animation.
$framed[]=$delay;

// Clean output buffer.
ob_end_clean();

// Open the second source image
$image = imagecreatefrompng('http://parisbre56-phpexperiment.rhcloud.com/test_image_death.php');

// We want to put the binary GIF data into an array to be used later,
//  so we use the output buffer.
ob_start();
imagegif($image);
$frames[]=ob_get_contents();

// Delay in the animation.
$framed[]=$delay;

// Clean output buffer.
ob_end_clean();

// Generate the animated gif and output to screen.
$gif = new GIFEncoder($frames,$framed,0,2,0,0,0,'bin');
echo $gif->GetAnimation();

?>
