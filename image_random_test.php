<?php

//Images and their type
$imagearray=[ 'http://parisbre56-phpexperiment.rhcloud.com/test_image.php','png'
              'http://parisbre56-phpexperiment.rhcloud.com/test_image_death.php','png'
              'http://parisbre56-phpexperiment.rhcloud.com/image_combo_test.php','gif'
              'http://parisbre56-phpexperiment.rhcloud.com/image_gif_test.php','png'];
        
//Select one at random      
$index = rand(0,(count($imagearray)/2)-1);

//Get the selected image
if ($imagearray[$index+1]=="png") {
  header ('Content-type:image/png');
  $image=imagecreatefrompng($imagearray[$index]);
  imagepng($image);
  imagedestroy($image);
} 
else if ($imagearray[$index+1]=="png") {
  header ('Content-type:image/gif');
  $image=imagecreatefromgif($imagearray[$index]);
  imagegif($image);
  imagedestroy($image);
}
else {
  header ('Content-type:text/plain');
  echo "Unhandled image type " . $imagearray[$index+1] . "
  Edit \"image_random_test.php\" in github to add support";
}

?>
