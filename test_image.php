<?php
header('Content-Type: image/png');

//Create a black image
$im = @imagecreatetruecolor(200, 55)
	or die('Cannot Initialize new GD image stream');

//Set background and text color
$background = imagecolorallocate($im,0,0,0);
$text_color = imagecolorallocate($im,50,205,50);
imagefill($im, 0, 0, $background);

// Name the font to be used
$font_bold = './DejaVuSans-Bold.ttf';
$font_normal = './DejaVuSans.ttf';



//////////////////////////////////////////////////////////////

//INCIDENT DATE!!!

$incident_date = new DateTime('4-Apr-2014');

//INCIDENT NAME!!!

$incident_name = 'Spider Tank';

//////////////////////////////////////////////////////////////




//Get current date.
$current_date = new DateTime('now');


//Get day difference and put it in a string.
$diff_days =  $incident_date->diff($current_date);
$diff_string = sprintf('%03d',$diff_days->days);


//Write the text to the image.
/* THESE ARE OLD. They're small and can't be made bold.
imagestring($im , 1 , 45, 5 , 'It has been' , $text_color);
imagestring($im , 1 , 65, 15, $diff_string , $text_color);
imagestring($im , 1 , 5 , 25, 'days since the last Incident', $text_color);
imagestring($im , 1 , 5 , 35, "Last Incident: ".$incident_name, $text_color);
*/
imagettftext($im,10,0,50,12,$text_color,$font_normal,'It has been');
imagettftext($im,10,0,75,24,$text_color,$font_bold,$diff_string);
imagettftext($im,10,0,5,36,$text_color,$font_normal,'days since the last Incident');
imagettftext($im,10,0,5,48,$text_color,$font_normal,"Last Incident: ".$incident_name);

//Output the image to the browser and destroy it locally.
imagepng($im);

imagedestroy($im);

?>
