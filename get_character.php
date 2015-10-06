<?php
header('Content-Type: text/html');

echo file_get_contents('http://einsteinianroulette.wikia.com/wiki/'+$_GET["name"]);
>
