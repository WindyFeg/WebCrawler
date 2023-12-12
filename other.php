<!-- return link img -->
<?php
include './index.php';
require './vendor/autoload.php';

if (isset($_SESSION['link'])) {
    $link = $_SESSION['link'];
    $filetype = $_SESSION['fileType'];
}

$httpClient = new \GuzzleHttp\Client();
$response = $httpClient->get($link);
$htmlString = (string) $response->getBody();

//add this line to suppress any warnings
libxml_use_internal_errors(true);
$doc = new DOMDocument();
$doc->loadHTML($htmlString);
$xpath = new DOMXPath($doc);
if ($filetype == "image")
{
    $data = $xpath->evaluate('//img');
}
else if ($filetype == "video")
{
    $data = $xpath->evaluate('//video');
}
else if ($filetype == "pdf")
{
    $data = $xpath->evaluate('//a');
}
else if ($filetype == "text")
{   
    $data = $xpath->evaluate('//div/div/div/div');
    
}
else {
    $data = $xpath->evaluate('//a');
}
// Save all image link in array
echo "<h4 id='crawl_result'>Crawl result for domain: <span style='color: #4285f4;'>". $link ."</span></h4>";
echo "<h4 id='crawl_result'>File type: <span style='color: #4285f4;'>". $filetype ."</span></h4>";

$extractedImages = [];
$LinkImages = [];
echo "<div class='search-result'>";
if ($filetype == "text"){
    foreach($data as $dat){
        echo "<div>";
        echo $dat->textContent;
        echo "</div>";
    
    }
}
else{

    foreach($data as $dat){
        $extractedImages[] = $dat->textContent;
        echo "<a class='link-download' href='" ;
        $imageLink = $dat->getAttribute('src');
        array_push($LinkImages, $imageLink);
        echo $imageLink;
        echo "'>link". $imageLink . "</a>";
        echo "<img src='" . $imageLink  ."'  width='50' >" ;
        
        echo "<a class='link-download' href='" ;
        echo  $link . $imageLink;
        echo "'>link". $link . $imageLink . "</a>";
        echo "<img src='" . $link . $imageLink  ."'  width='50'>";

    }
    echo "</div>";
}

$saveDirectory = __DIR__ . '/downloads/';

$serialized_array = serialize($LinkImages);

?>

<form method="post" action="/WebCrawler/download.php">
    <input type="hidden" name="array_data" value="<?php echo htmlspecialchars($serialized_array); ?>">
    <button class="download-submit" type="submit" name="download">Download</button>
</form>