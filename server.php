<?php
if (isset($_GET['link'])) {
    $link = $_GET['link'];
    echo $link;
    if ($link == "https://books.toscrape.com/") {
        header('Location: /WebCrawler/linkCrawl/img.php');
    } else if ($link == "https://cuuduongthancong.com/") {
        header('Location: /WebCrawler/linkCrawl/pdf.php') ;
    } else {
        echo "Link not found";
    }
}
?>
