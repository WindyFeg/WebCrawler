<?php
session_start();
if (isset($_GET['link'])) {
    if (isset($_GET['fileType'])){

        $link = $_GET['link'];
        $filetype = $_GET['fileType'];
        $_SESSION['link'] = $link;
        $_SESSION['fileType'] = $filetype;
    
        if (str_contains($link,"https://books.toscrape.com/")) {
            header('Location: /WebCrawler/img.php');
        }
        else if (str_contains($link, "cuuduongthancong.com/")) {
            header('Location: /WebCrawler/pdf.php') ;
        } 
        else {
            echo "This result is not supported, so it will crawl automatically";
            header('Location: /WebCrawler/other.php');
        }
    }
}
?>
