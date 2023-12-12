<!-- return link img -->
<?php
include '../index.php';

require '../vendor/autoload.php';

$httpClient = new \GuzzleHttp\Client();
$MainPage = "https://books.toscrape.com/";
$response = $httpClient->get($MainPage);
$htmlString = (string) $response->getBody();

//add this line to suppress any warnings
libxml_use_internal_errors(true);
$doc = new DOMDocument();
$doc->loadHTML($htmlString);
$xpath = new DOMXPath($doc);

$titles = $xpath->evaluate('//ol[@class="row"]//li//article//h3/a');
$pics = $xpath->evaluate('//ol[@class="row"]//li//article//div[@class="image_container"]/a/img');
$pic2 = $xpath->evaluate('//ol[@class="row"]//li//article//img[@class="thumbnail"]');

// $extractedTitles = [];
// foreach ($titles as $title) {
// $extractedTitles[] = $title->textContent.PHP_EOL;
// echo "<div>";
// echo "<h3 class='search-result'>Book title:" . $title->textContent.PHP_EOL  . " </h3>";
// //echo $title->getAttribute('href');
// echo "</div>";
// }


// Save all image link in array
echo "<h3>Result:</h3>";
$extractedImages = [];
$LinkImages = [];
foreach($pics as $pic){
    $extractedImages[] = $pic->textContent;
    echo "<div class='link-download'>";
    $imageLink = $MainPage . $pic->getAttribute('src');
    array_push($LinkImages, $imageLink);
    echo $imageLink;
    echo "</div>";
}

$saveDirectory = __DIR__ . '/downloads/';

$serialized_array = serialize($LinkImages);

?>

<form method="post" action="/WebCrawler/download.php">
<input type="hidden" name="array_data" value="<?php echo htmlspecialchars($serialized_array); ?>">
<button type="submit" name="download">Download</button>
</form>
