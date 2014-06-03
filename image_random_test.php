<?php

//Images and their type
$imagearray=array( 'http://parisbre56-phpexperiment.rhcloud.com/test_image.php','png',
                   'http://parisbre56-phpexperiment.rhcloud.com/test_image_death.php','png',
                   'http://parisbre56-phpexperiment.rhcloud.com/image_combo_test.php','png',
                   'http://parisbre56-phpexperiment.rhcloud.com/image_gif_test.php','gif'         );
        
//Select one at random      
$index = rand(0,(count($imagearray)/2)-1);

//Get the selected image and print it
header ('Content-type:image/' . $imagearray[($index*2)+1]);
print file_get_contents($imagearray[$index*2]);

?>
