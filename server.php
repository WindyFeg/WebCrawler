<?php
session_start();
if (isset($_GET['link'])) {
    $link = $_GET['link'];
    $_SESSION['link'] = $link;
    echo "Link: " . $link;

    if (str_contains($link,"https://books.toscrape.com/")) {
        header('Location: /WebCrawler/img.php');
    }
    else if (str_contains($link, "cuuduongthancong.com/")) {
        header('Location: /WebCrawler/pdf.php') ;
    } 
    else if (str_contains($link, "https://www.pexels.com/")) {
        header('Location: /WebCrawler/vid.php');
    }
    else {
        echo "Link not found";
    }
}
?>
