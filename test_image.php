<?php
header('Content-Type: image/png');

//Create a black image
$im = @imagecreatetruecolor(150, 50)
	or die('Cannot Initialize new GD image stream');

//Set background and text color
$background = imagecolorallocate($im,255,255,255);
$text_color = imagecolorallocate($im,50,205,50);



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
imagestring($im , 1 , 45, 5 , 'It has been' , $text_color);
imagestring($im , 1 , 65, 15, $diff_string , $text_color);
imagestring($im , 1 , 5 , 25, 'days since the last Incident', $text_color);
imagestring($im , 1 , 5 , 35, "Last Incident: ".$incident_name, $text_color);


//Output the image to the browser and destroy it locally.
imagepng($im);

imagedestroy($im);

?>
