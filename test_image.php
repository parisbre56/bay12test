<?php
header('Content-Type: image/png');


$image_x = 210;
$image_y = 60;



// Name the font to be used
$font_bold = './ArialBold.ttf';
//$font_normal = './Arial.ttf';
//$font_bold = './InconsolataBold.ttf';
$font_normal = './Inconsolata.ttf';
//Font size
$font_size = 11;


//////////////////////////////////////////////////////////////

//INCIDENT DATE!!!

$incident_date = new DateTime('21-May-2015');


//INCIDENT NAME!!!

$incident_name = 'NUKE DOOR';

//////////////////////////////////////////////////////////////




//Get current date.
$current_date = new DateTime('now');


//Get day difference and put it in a string.
$diff_days =  $incident_date->diff($current_date);
$diff_string = sprintf('%03d',$diff_days->days);

//Text
$text_one = 'It has been';
$text_two = $diff_string;
//$text_two = 'ONGOING: DO NOT PANIC';
$text_three = 'days since the last Incident';
$text_four = "Last: ".$incident_name;

$width = strlen($text_four) * 7 + 15;
if($width > $image_x)
	$image_x = $width;

//Create a black image
$im = @imagecreatetruecolor($image_x, $image_y)
	or die('Cannot Initialize new GD image stream');

//Set background and text color
$background = imagecolorallocate($im,0,0,0);
$text_color = imagecolorallocate($im,50,205,50);
imagefill($im, 0, 0, $background);

//Get the text bounding boxes
$bb_one = imagettfbbox($font_size,0,$font_normal,$text_one);
$bb_two = imagettfbbox($font_size,0,$font_bold,$text_two);
$bb_three = imagettfbbox($font_size,0,$font_normal,$text_three);
$bb_four = imagettfbbox($font_size,0,$font_normal,$text_four);

//Compute their position so that they can be centered in the X and have equal distance in the Y.
$total_y = ($bb_one[1]-$bb_one[7])+ ($bb_two[1]-$bb_two[7])+ ($bb_three[1]-$bb_three[7])+ ($bb_four[1]-$bb_four[7]);
$free_y = ($image_y-$total_y)/5;
$one_x = ($image_x-($bb_one[4]-$bb_one[6]))/2;
$one_y = 1*$free_y+($bb_one[1]-$bb_one[7]);
$two_x = ($image_x-($bb_two[4]-$bb_two[6]))/2;
$two_y = 1*$free_y+($bb_one[1]-$bb_one[7])+2*$free_y+($bb_two[1]-$bb_two[7]);
$three_x = ($image_x-($bb_three[4]-$bb_three[6]))/2;
$three_y = 1*$free_y+($bb_one[1]-$bb_one[7])+$free_y+($bb_two[1]-$bb_two[7])+$free_y+($bb_three[1]-$bb_three[7]);
$four_x = ($image_x-($bb_four[4]-$bb_four[6]))/2;
$four_y = 1*$free_y+($bb_one[1]-$bb_one[7])+$free_y+($bb_two[1]-$bb_two[7])+$free_y+($bb_three[1]-$bb_three[7])+$free_y+($bb_four[1]-$bb_four[7]);

//Write the text to the image.
imagettftext($im,$font_size,0,$one_x,$one_y,$text_color,$font_normal,$text_one);
imagettftext($im,$font_size,0,$two_x,$two_y,$text_color,$font_bold,$text_two);
imagettftext($im,$font_size,0,$three_x,$three_y,$text_color,$font_normal,$text_three);
imagettftext($im,$font_size,0,$four_x,$four_y,$text_color,$font_normal,$text_four);

//Output the image to the browser and destroy it locally.
imagepng($im);

imagedestroy($im);

?>
