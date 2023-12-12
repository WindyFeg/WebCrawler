<!-- Return Array link -->
<?php
include './index.php';
require './vendor/autoload.php';
if (isset($_SESSION['link'])) {
    $link = $_SESSION['link'];
}

$httpClient = new \GuzzleHttp\Client();

$response = $httpClient->get($link);//$httpClient->get('https://cuuduongthancong.com/su/may-hoc/dh-bach-khoa-hcm/');
$htmlString = (string) $response->getBody();
//add this line to suppress any warnings
libxml_use_internal_errors(true);
$doc = new DOMDocument();
$doc->loadHTML($htmlString);
$xpath = new DOMXPath($doc);
$pdfs = $xpath->evaluate('//span[@class="col-sm-2 col-lg-1"]//a/@href');
$extractedPdfs = [];

echo "<h3>Crawl result for domain:". $link ." </h3>";
foreach ($pdfs as $pdf) {
    $link_value = $pdf->value;
    echo "<a class='link-download' href='" ;
    $link_value = str_replace("pvf", "dlf", $link_value);
    $link_value = str_replace("?src=afile", "", $link_value);
    $link_value = "https://cuuduongthancong.com" . $link_value;
	//$extractedPdfs = $link_value.PHP_EOL;
    array_push($extractedPdfs, $link_value);
	echo $link_value;
    echo "'>link". $link_value . "</a>";

}

$saveDirectory = __DIR__ . '/downloads/';

$serialized_array = serialize($extractedPdfs);

?>
<form method="post" action="/WebCrawler/download.php">
<input type="hidden" name="array_data" value="<?php echo htmlspecialchars($serialized_array); ?>">
<button class="download-submit" type="submit" name="download">Download</button>
</form>