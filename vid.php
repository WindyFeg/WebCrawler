<!-- Return Array link -->
<?php
include './index.php';
require './vendor/autoload.php';
if (isset($_SESSION['link'])) {
    $link = $_SESSION['link'];
}
$httpClient = new \GuzzleHttp\Client();

$response = $httpClient->get($link);
// $htmlString = (string) $response->getBody();
//add this line to suppress any warnings
libxml_use_internal_errors(true);
// $doc = new DOMDocument();
// $doc->loadHTML($htmlString);
// $xpath = new DOMXPath($doc);
// $videos = $xpath->evaluate('//*[@id="-"]/div/div/div/div[data-testid="column"]');
$linkVideos = [];



// echo "<h3>Crawl result for domain:". $link ." </h3>";
// foreach ($videos as $video) {
//     $link_value = $video->value;
//     echo "<a class='link-download' href='" ;
//     array_push($linkVideos, $link_value);
// 	echo $link_value;
//     echo "'>link". $link_value . "</a>";

// }

// $saveDirectory = __DIR__ . '/downloads/';

// $serialized_array = serialize($linkVideos);

// ?>
// <form method="post" action="/WebCrawler/download.php">
// <input type="hidden" name="array_data" value="<?php echo htmlspecialchars($serialized_array); ?>">
// <button class="download-submit" type="submit" name="download">Download</button>
// </form>