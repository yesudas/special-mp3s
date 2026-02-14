<?php
// Download handler
$language = isset($_GET['lang']) ? $_GET['lang'] : '';
$album = isset($_GET['album']) ? $_GET['album'] : '';
$file = isset($_GET['file']) ? $_GET['file'] : '';

$filePath = __DIR__ . '/languages/' . basename($language) . '/' . basename($album) . '/' . basename($file);

if (!file_exists($filePath) || pathinfo($filePath, PATHINFO_EXTENSION) !== 'mp3') {
    header('HTTP/1.0 404 Not Found');
    echo 'File not found';
    exit;
}

// Set headers for download
header('Content-Type: audio/mpeg');
header('Content-Disposition: attachment; filename="' . basename($file) . '"');
header('Content-Length: ' . filesize($filePath));
header('Cache-Control: no-cache');

// Read and output file
readfile($filePath);
exit;
