<?php 
session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $LinkImages = unserialize($_POST['array_data']);

    # create new zip object
    $zip = new ZipArchive();

    # create a temp file & open it
    $tmp_file = tempnam('.', '');
    $zip->open($tmp_file, ZipArchive::CREATE);
    

    # loop through each file
    foreach ($LinkImages as $file) {
        $download_file = file_get_contents($file);
        $zip->addFromString(basename($file), $download_file);
    }

    # close zip
    $zip->close();

    # send the file to the browser as a download
    header('Content-disposition: attachment; filename="my file.zip"');
    header('Content-type: application/zip');
    readfile($tmp_file);
    unlink($tmp_file);
}
?>