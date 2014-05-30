<?php
header('Content-Type: image/png');

//Create a black image
$im = @imagecreatetruecolor(198, 56)
	or die('Cannot Initialize new GD image stream');

//Set background and text color
$background = imagecolorallocate($im,0,0,0);
$text_color = imagecolorallocate($im,50,205,50);
imagefill($im, 0, 0, $background);

// Name the font to be used
$font_bold = './DejaVuSans-Bold.ttf';
$font_normal = './DejaVuSans.ttf';



//////////////////////////////////////////////////////////////

//DEATH DATE!!!

$death_date = new DateTime('30-May-2014');

//DEATH NAME!!!

$death_name = 'Grate #5';

//////////////////////////////////////////////////////////////




//Get current date.
$current_date = new DateTime('now');


//Get day difference and put it in a string.
$diff_days =  $death_date->diff($current_date);
$diff_string = sprintf('%03d',$diff_days->days);


//Write the text to the image.
imagettftext($im,10,0,50,14,$text_color,$font_normal,'It has been');
imagettftext($im,10,0,75,26,$text_color,$font_bold,$diff_string);
imagettftext($im,10,0,5,38,$text_color,$font_normal,'days since the last Death');
imagettftext($im,10,0,5,50,$text_color,$font_normal,"Last Death: ".$death_name);

//Output the image to the browser and destroy it locally.
imagepng($im);

imagedestroy($im);

?>
