<?php
header('Content-Type: text/html');

$c = curl_init('http://einsteinianroulette.wikia.com/wiki/'.$_GET["name"]);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($c, CURLOPT_MAXREDIRS, 5);

$html = curl_exec($c);

if (curl_error($c)) {
    echo 'CURL Error: ';
    die(curl_error($c));
}

// Get the status code
$status = curl_getinfo($c, CURLINFO_HTTP_CODE);

curl_close($c);

echo $html;
?>
