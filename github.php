<?php
	//Tells the browser to show the output as plain text
	header('Content-type: text/plain');
	print 'Executing manual refresh...\n=================\n';
	//The git pull command should be put here.
	print 'Root directory contents before update:\n';
	passthru('ls -la');
?>

