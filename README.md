bay12test
=========

Test files for the bay12forums

For the PHP files:
=========

$image_x 
and 
$image_y 
control the image size. The text should autocenter regardless of image size.

$background
and
$text_color
do exactly what they say. Values are in RGB.

$font_bold
and
$font_normal
point to the files containing the bold and normal TrueTypeFonts respectively.

$<something>_date
is the date of the last <something>. It is used to compute the difference in days.

$<something>_name
is the name of the last <something>.

$text_one
through
$text_four
are the strings that will be printed on the image. You must put them here so they'll be autocentered.

If you want to change whether or not the text is bold or not or if you want to use different fonts, go to the
imagettfbbox
and
imagettftext
and put your font there.

The second variable in imagettfbbox controls the size of the text.
The second variable in imagettftext controls the size of the text.
YOU MUST CHANGE BOTH OF THOSE FOR THE AUTOCENTERING TO WORK!


Server:
=========
The files will appear in 
http://parisbre56-phpexperiment.rhcloud.com/

So if you upload file foo.php, you need to go to
http://parisbre56-phpexperiment.rhcloud.com/foo.php
to see it.

It may take a lot of time for the changes to load on the server.
