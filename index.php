<?php
session_start();
?>

<!DOCTYPE html>
<!-- saved from url=(0028)http://localhost/WebCrawler/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
  <title>Web Crawler</title>
  <style>
    /* Basic CSS for the layout */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #fff;
      padding: 10px 20px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      text-align: center; /* Center aligning the content */
    }

    header img {
      display: block;
      margin: 0 auto; /* Centering the image */
      max-width: 30%; /* Limiting the image size to half the original */
      height: auto;
    }

    h1 {
      margin-top: 10px; /* Adjusting margin for the title */
    }

    /* Style for search input and submit button */
    .search-form {
      margin-top: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .search-input {
      width: 400px;
      padding: 8px;
      border-radius: 12px;
      border: 1px solid #ccc;
      margin-right: 5px;
      outline: none;
      font-size: 16px;
    }

    .search-submit {
      background-color: #4285f4;
      color: #fff;
      border: none;
      padding: 8px 20px;
      border-radius: 12px;
      cursor: pointer;
      font-size: 16px;
    }

    .search-submit:hover {
      background-color: #357ae8;
    }

/* Style for search results */
.search-result {
      border-bottom: 1px solid #ccc;
      padding: 10px 0;
    }

    .search-result h3 {
      margin: 0;
      font-size: 18px;
      color: #1a0dab; /* Google link color */
    }

    .search-result p {
      margin: 5px 0 0;
      color: #4d5156; /* Google description color */
    }

    .dropdown {
            position: relative;
            display: inline-block;
            margin-right: 10px;
            margin-left: 5px;
        }

        .dropdown-select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            padding: 10px 36px 10px 16px;
            border: 1px solid #ccc;
      border-radius: 12px;
            
            background-color: #fff;
            font-size: 16px;
            color: #333;
            cursor: pointer;
            outline: none;
        }

        .dropdown-select:hover {
            border-color: #aaa;
        }

        .dropdown-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.2);
        }
      
        .dropdown-icon {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            pointer-events: none;
        }

      header{
        position: fixed;
        width: 100%;
      }
      .numb{
        height: 180px;

      }

      .link-download{
    text-align: left;
    color: #1a0dab;
    margin: 0;
    padding: 0;
    font-family: arial,sans-serif;
    font-weight: 400;
    display: inline-block;
    line-height: 0.8;
    margin-bottom: 3px;
    font-size: 16px;
    margin-top: 18px;
    margin-left: 50px;
    max-width: 650px;
    overflow: hidden;
    cursor: pointer;
    /* remove underline */
    text-decoration: none;
  }

  .link-download:hover{
    text-decoration: underline;
    color: #1962c6;
  }

  .download-submit{
    margin: 50px;
    background-color: #4285f4;
      color: #fff;
      border: none;
      padding: 8px 20px;
      border-radius: 12px;
      cursor: pointer;
      font-size: 16px;
  }

  #crawl_result{
    margin-left: 50px;
  }

    /* ... Other existing CSS styles remain the same ... */
  </style>
<script src="chrome-extension://mooikfkahbdckldjjndioackbalphokd/assets/prompt.js">
  
</script></head>
<body>

  <header>
    <!-- Logo or Title -->
    <a href="/WebCrawler/index.php"><img src="./img/WebCrawlerLogo.png" alt="Web Crawler Logo"></a>
    <form class="search-form" action="./server.php" method="GET">
      <input class="search-input" type="link" name="link" placeholder="Crawl link..." >
      <div class="dropdown">
    <select class="dropdown-select" id="fileType" type="fileType" name="fileType">
        <option value="image">Image</option>
        <option value="pdf">PDF</option>
        <option value="txt">Text</option>
        <option value="video">Video</option>
    </select>
    </div>
      <input class="search-submit" type="submit" value="CRAWL">
    </form>
  </header>
  <div class="numb">
    </div>
</body></html>
