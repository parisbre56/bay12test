<?php
header('Content-Type: image/png');

//Create a black image
$image_x = 290;
$image_y = 70;
$im = @imagecreatetruecolor($image_x, $image_y)
	or die('Cannot Initialize new GD image stream');

//Set background and text color
$background = imagecolorallocate($im,0,0,0);
$text_color = imagecolorallocate($im,50,205,50);
imagefill($im, 0, 0, $background);

// Name the font to be used
$font_bold = './CourierBold.ttf';
$font_normal = './Courier.ttf';

//Text size
$text_size = 12;



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

//Text
$text_one = 'It has been';
$text_two = $diff_string;
$text_three = 'days since the last Death';
$text_four = "Last Death: ".$death_name;

//Get the text bounding boxes
$bb_one = imagettfbbox($text_size,0,$font_normal,$text_one);
$bb_two = imagettfbbox($text_size,0,$font_bold,$text_two);
$bb_three = imagettfbbox($text_size,0,$font_normal,$text_three);
$bb_four = imagettfbbox($text_size,0,$font_normal,$text_four);

//Compute their position so that they can be centered in the X and have equal distance in the Y.
$total_y = ($bb_one[1]-$bb_one[7])+ ($bb_two[1]-$bb_two[7])+ ($bb_three[1]-$bb_three[7])+ ($bb_four[1]-$bb_four[7]);
$free_y = ($image_y-$total_y)/5;
$one_x = ($image_x-($bb_one[4]-$bb_one[6]))/2;
$one_y = 1*$free_y+($bb_one[1]-$bb_one[7]);
$two_x = ($image_x-($bb_two[4]-$bb_two[6]))/2;
$two_y = 1*$free_y+($bb_one[1]-$bb_one[7])+$free_y+($bb_two[1]-$bb_two[7]);
$three_x = ($image_x-($bb_three[4]-$bb_three[6]))/2;
$three_y = 1*$free_y+($bb_one[1]-$bb_one[7])+$free_y+($bb_two[1]-$bb_two[7])+$free_y+($bb_three[1]-$bb_three[7]);
$four_x = ($image_x-($bb_four[4]-$bb_four[6]))/2;
$four_y = 1*$free_y+($bb_one[1]-$bb_one[7])+$free_y+($bb_two[1]-$bb_two[7])+$free_y+($bb_three[1]-$bb_three[7])+$free_y+($bb_four[1]-$bb_four[7]);

//Write the text to the image.
imagettftext($im,$text_size,0,$one_x,$one_y,$text_color,$font_normal,$text_one);
imagettftext($im,$text_size,0,$two_x,$two_y,$text_color,$font_bold,$text_two);
imagettftext($im,$text_size,0,$three_x,$three_y,$text_color,$font_normal,$text_three);
imagettftext($im,$text_size,0,$four_x,$four_y,$text_color,$font_normal,$text_four);

//Output the image to the browser and destroy it locally.
imagepng($im);

imagedestroy($im);

?>
