<?php
//Tells the browser to show the output as plain text
header('Content-type: text/plain');
echo 'Executing manual refresh...';
//The git pull command should be put here.
echo exec('whoami');
echo exec('ls');
?>

