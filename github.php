<?php
	//Tells the browser to show the output as plain text
	header('Content-type: text/plain');
	print 'Executing manual refresh...
=================

Root directory contents before update: ls -la
';
	passthru('ls -la');
	print '
=================

Attempting to pull data from github: git pull https://github.com/parisbre56/bay12test.git
';
	passthru('git pull https://github.com/parisbre56/bay12test.git');
	print '
=================

Root directory contents after update: ls -la
'; 
	passthru('ls -la');
	print '
=================
Goodbye!';
?>
