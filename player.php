<?php

// Bible Concordance Web Application
include 'counter.php';

$version = "2026.02";

// Player page - Music player with track list
$language = isset($_GET['lang']) ? $_GET['lang'] : '';
$album = isset($_GET['album']) ? $_GET['album'] : '';
$albumPath = __DIR__ . '/languages/' . basename($language) . '/' . basename($album);

if (!$language || !$album || !is_dir($albumPath)) {
    header('Location: index.php');
    exit;
}

// Get all MP3 files
$files = array_filter(scandir($albumPath), function($item) use ($albumPath) {
    return $item != '.' && $item != '..' && pathinfo($item, PATHINFO_EXTENSION) === 'mp3';
});

// Sort files naturally
$files = array_values($files);
natsort($files);

// Function to format album name (remove hyphens)
function formatAlbumName($name) {
    return str_replace('-', ' ', $name);
}

// Function to format track name
function formatTrackName($filename) {
    $name = pathinfo($filename, PATHINFO_FILENAME);
    return str_replace('-', ' ', $name);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars(formatAlbumName($album)); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css?v=<?php echo $version; ?>">

    <!-- PWA functionality -->
    <?php include 'pwa/pwa-head.php'; ?>
    
    <!-- Google Analytics -->
    <?php include 'gtag.php'; ?>

</head>
<body>
    <div class="container">
        <header>
            <a href="albums.php?lang=<?php echo urlencode($language); ?>" class="back-btn">← Back to Albums</a>
            <h1>🎵 <?php echo htmlspecialchars(formatAlbumName($album)); ?></h1>
            <p class="subtitle"><?php echo htmlspecialchars($language); ?></p>
        </header>
        
        <div class="player-section">
            <div class="current-track-info">
                <div class="album-art">🎵</div>
                <h2 id="current-track-name">Select a track to play</h2>
            </div>
            
            <audio id="audio-player" controls controlsList="nodownload">
                <source id="audio-source" src="" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
            
            <div class="player-controls">
                <button id="prev-btn" class="control-btn">⏮️ Previous</button>
                <button id="next-btn" class="control-btn">Next ⏭️</button>
            </div>
        </div>
        
        <div class="track-list">
            <h3>Tracks (<?php echo count($files); ?>)</h3>
            <?php $index = 0; foreach ($files as $file): ?>
                <div class="track-item" data-index="<?php echo $index; ?>" data-src="languages/<?php echo urlencode($language); ?>/<?php echo urlencode($album); ?>/<?php echo urlencode($file); ?>">
                    <div class="track-info">
                        <span class="track-number"><?php echo ($index + 1); ?>.</span>
                        <span class="track-name"><?php echo htmlspecialchars(formatTrackName($file)); ?></span>
                    </div>
                    <div class="track-actions">
                        <button class="play-btn" title="Play">▶️</button>
                        <a href="download.php?lang=<?php echo urlencode($language); ?>&album=<?php echo urlencode($album); ?>&file=<?php echo urlencode($file); ?>" class="download-btn" title="Download" download>⬇️</a>
                    </div>
                </div>
            <?php $index++; endforeach; ?>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>

    <?php include 'pwa/pwa-body.php'; ?>
    
    <script src="player.js"></script>
</body>
</html>
