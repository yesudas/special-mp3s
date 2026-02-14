<?php

// Bible Concordance Web Application
include 'counter.php';

$version = "2026.02";

// Albums page - Show all albums for selected language
$language = isset($_GET['lang']) ? $_GET['lang'] : '';
$languagePath = __DIR__ . '/languages/' . basename($language);

if (!$language || !is_dir($languagePath)) {
    header('Location: index.php');
    exit;
}

$albums = array_filter(scandir($languagePath), function($item) use ($languagePath) {
    return $item != '.' && $item != '..' && is_dir($languagePath . '/' . $item);
});

// Function to format album name (remove hyphens)
function formatAlbumName($name) {
    return str_replace('-', ' ', $name);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($language); ?> Albums</title>
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
            <a href="index.php" class="back-btn">← Back to Languages</a>
            <h1>📚 <?php echo htmlspecialchars($language); ?> Albums</h1>
        </header>
        
        <div class="album-grid">
            <?php foreach ($albums as $album): ?>
                <a href="player.php?lang=<?php echo urlencode($language); ?>&album=<?php echo urlencode($album); ?>" class="album-card">
                    <div class="album-icon">🎼</div>
                    <h2><?php echo htmlspecialchars(formatAlbumName($album)); ?></h2>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>

    <?php include 'pwa/pwa-body.php'; ?>
</body>
</html>
