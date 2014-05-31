<?php
//Tells the browser to show the output as plain text
header('Content-type: text/plain');
print 'Executing manual refresh...';
//The git pull command should be put here.
print exec('whoami');
print exec('ls');
?>

