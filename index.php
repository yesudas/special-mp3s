<?php

include 'counter.php';

$version = "2026.02";

// Main page - Language selection
$languagesPath = __DIR__ . '/languages';
$languages = array_filter(scandir($languagesPath), function($item) use ($languagesPath) {
    return $item != '.' && $item != '..' && is_dir($languagesPath . '/' . $item);
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Special MP3s Collection</title>
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
            <h1>🎵 Special MP3s Collection</h1>
            <p class="subtitle">Select a language to browse albums</p>
        </header>
        
        <div class="language-grid">
            <?php foreach ($languages as $language): ?>
                <a href="albums.php?lang=<?php echo urlencode($language); ?>" class="language-card">
                    <div class="language-icon">🌐</div>
                    <h2><?php echo htmlspecialchars($language); ?></h2>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>

    <?php include 'pwa/pwa-body.php'; ?>

</body>
</html>
