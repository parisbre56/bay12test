<?php
//Tells the browser to show the output as plain text
header('Content-type: text/plain');
// outputs the username that owns the running php/httpd process
// (on a system with the "whoami" executable in the path)
echo exec('whoami');
//The git pull command should be put here.
?>

