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


$text="<D̸̢̤̬̟̼̹̩̟̥͉̲̯͔͒̅́̾ͧͦ̍̒́̌ͬ́͘͢o̡̘̪͓̰͓̰̻̼̗̍̎̊̽͐̋̽ͮ͆ͩ̇ͣ̌̀̚̕wͦ̈ͦ́͊̇̍ͦ͏҉͕̟̻̘̯͉̮͖͓n͛̂̐́̚͟͞͏̖̹̖͖̪̯̝̼͓̭̮̳̙̪̱̲͕̘.̷̭̥͓̟̪̬̹͓͈̪̗̭̻̹̎ͫͩ͒̒͂͐ͫ̚͠>"

//Create a black image
$im = @imagecreatetruecolor($image_x, $image_y)
	or die('Cannot Initialize new GD image stream');

//Set background and text color
$background = imagecolorallocate($im,0,0,0);
$text_color = imagecolorallocate($im,50,205,50);
imagefill($im, 0, 0, $background);

//Write the text to the image.
imagettftext($im,$font_size,0,10,10,$text_color,$font_normal,$text);

//Output the image to the browser and destroy it locally.
imagepng($im);
imagedestroy($im);
?>
