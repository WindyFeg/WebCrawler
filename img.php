<!-- return link img -->
<?php
include './index.php';
require './vendor/autoload.php';

if (isset($_SESSION['link'])) {
    $link = $_SESSION['link'];
}

$httpClient = new \GuzzleHttp\Client();
$response = $httpClient->get($link);
$htmlString = (string) $response->getBody();

//add this line to suppress any warnings
libxml_use_internal_errors(true);
$doc = new DOMDocument();
$doc->loadHTML($htmlString);
$xpath = new DOMXPath($doc);

//$titles = $xpath->evaluate('//ol[@class="row"]//li//article//h3/a');
$pics = $xpath->evaluate('//ol[@class="row"]//li//article//div[@class="image_container"]/a/img');
$pic2 = $xpath->evaluate('//ol[@class="row"]//li//article//img[@class="thumbnail"]');


// Save all image link in array
echo "<h3>Result:</h3>";
$extractedImages = [];
$LinkImages = [];
echo "<div class='search-result'>";
foreach($pics as $pic){
    $extractedImages[] = $pic->textContent;
    echo "<a class='link-download' href='" ;
    $imageLink = $link . $pic->getAttribute('src');
    array_push($LinkImages, $imageLink);
    echo $imageLink;
    echo "'>link". $imageLink . "</a>";
    // echo "<img src='" . $imageLink  ."'  width='500' height='600'>";
}
echo "</div>";

$saveDirectory = __DIR__ . '/downloads/';

$serialized_array = serialize($LinkImages);

?>

<form method="post" action="/WebCrawler/download.php">
    <input type="hidden" name="array_data" value="<?php echo htmlspecialchars($serialized_array); ?>">
    <button class="download-submit" type="submit" name="download">Download</button>
</form>