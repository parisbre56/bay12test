<?php
	function executeAndPrint($to_exec) {
		unset($result);
		exec($to_exec,$result);
		for($i=0,$size=count($result);$i<$size;++$i) {
			print $result[$i],'\n';
		}
	}
	//Tells the browser to show the output as plain text
	header('Content-type: text/plain');
	print 'Executing manual refresh...\n=================\n';
	//The git pull command should be put here.
	print 'Root directory contents before update:\n';
	executeAndPrint('ls -la');
?>

