bay12test
=========

Test files for the bay12forums

For the PHP files:
=========

<b>$image_x </b>

and 

<b>$image_y </b>

control the image size. The text should autocenter regardless of image size.



<b>$background</b>

and

<b>$text_color</b>

do exactly what they say. Values are in RGB.



<b>$font_bold</b>

and

<b>$font_normal</b>

point to the files containing the bold and normal TrueTypeFonts respectively.



<b>$|something|_date</b>

is the date of the last |something|. It is used to compute the difference in days.



<b>$|something|_name</b>

is the name of the last |something|.



<b>$text_one</b>

through

<b>$text_four</b>

are the strings that will be printed on the image. You MUST put them here so they'll be autocentered.



If you want to change whether or not the text is bold or not or if you want to use different fonts, go to the

<b>imagettfbbox</b>

and

<b>imagettftext</b>

functions and put your font there.



The first variable in imagettfbbox controls the size of the text.

The second variable in imagettftext controls the size of the text.

YOU MUST CHANGE BOTH OF THOSE FOR THE AUTOCENTERING TO WORK!


Server:
=========
The files will appear in 

http://parisbre56-phpexperiment.rhcloud.com/

So if you upload the file 

<b>foo.php</b>

you need to go to

http://parisbre56-phpexperiment.rhcloud.com/foo.php

to see it.



It may take a lot of time (hours maybe) for the changes to load on the server.

If you want them to load quicker, contact me and I'll do a refresh.

I'll see about making the server update automatically every time this git is updated so that I don't have to do the refresh manually.
