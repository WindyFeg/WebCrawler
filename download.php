<?php
session_start();
echo "Hello World";

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $LinkImages = unserialize($_POST['array_data']);

    foreach($LinkImages as $linkImg){
        echo "<a >" .$linkImg . " </a>";
    }

    $zip = new ZipArchive();
    // Temp file to store data
    $tmp_file = tempnam(sys_get_temp_dir(), 'zip');
    // Open the temporary file for writing
    $zip->open($tmp_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);
    
    // Zip the damn files
    foreach ($LinkImages as $url) {
        echo "Pusing..." . $url;
        $contents = file_get_contents($url);
        $filename = basename($url);
        $zip->addFromString($filename, $contents);
      }
    
    // Close the zip archive
    $zip->close();
    
    echo "Done ZIP file";
    // Set the appropriate headers for downloading the zip file
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="files.zip"');
    header('Content-Length: ' . filesize($tmp_file));
    
    // Output the contents of the temporary file
    readfile($tmp_file);
    
    // Delete the temporary file
    unlink($tmp_file);
    
}
