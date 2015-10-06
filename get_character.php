<?php
header('Content-Type: text/html');

$pageName = 'http://einsteinianroulette.wikia.com/wiki/'.$_GET["name"];

$c = curl_init($pageName);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($c, CURLOPT_MAXREDIRS, 5);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

$html = curl_exec($c);

if (curl_error($c)) {
    echo 'CURL Error: ';
    die(curl_error($c));
}

// Get the status code
$status = curl_getinfo($c, CURLINFO_HTTP_CODE);

curl_close($c);

echo "<!-- Got output for: $pageName -->\n";

echo $html;
?>
