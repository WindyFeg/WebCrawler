<!-- Return Array link -->
<?php

require 'vendor/autoload.php';
$httpClient = new \GuzzleHttp\Client();
$response = $httpClient->get('https://cuuduongthancong.com/su/may-hoc/dh-bach-khoa-hcm/');
$htmlString = (string) $response->getBody();
//add this line to suppress any warnings
libxml_use_internal_errors(true);
$doc = new DOMDocument();
$doc->loadHTML($htmlString);
$xpath = new DOMXPath($doc);
$pdfs = $xpath->evaluate('//span[@class="col-sm-2 col-lg-1"]//a/@href');
$extractedPdfs = [];
foreach ($pdfs as $pdf) {
    $newstring = $pdf->value;
    $newstring = str_replace("pvf", "dlf", $newstring);
    $newstring = str_replace("?src=afile", "", $newstring);
    $newstring = "https://cuuduongthancong.com" . $newstring;
	$extractedPdfs = $newstring.PHP_EOL;
	echo $newstring;
}