<?php
header('Content-Type: text/html');

$pageName = 'http://einsteinianroulette.wikia.com/wiki/'.$_GET["name"];
$pageName = $_GET["name"];

$c = curl_init($pageName);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($c, CURLOPT_VERBOSE, true);
curl_setopt($c, CURLOPT_MAXREDIRS, 5);
curl_setopt($c, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0');
curl_setopt($c, CURLOPT_FAILONERROR, true);
curl_setopt($c, CURLOPT_ENCODING, "gzip");
$headers = array
(
    'Host: einsteinianroulette.wikia.com'
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8'
    'Accept-Language: en-US,en;q=0.5'
    'Accept-Encoding: gzip, deflate'
    'DNT: 1'
    'Connection: keep-alive'
); 
curl_setopt($c, CURLOPT_HTTPHEADER, $headers);

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
