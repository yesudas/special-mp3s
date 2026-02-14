<?php
// Sitemap Generator - Generates sitemap.xml file
$baseUrl = 'https://' . $_SERVER['HTTP_HOST'] . '/special-mp3s';
$today = date('Y-m-d');
$changefreq = 'yearly';
$priority = '0.8';

// Start building XML content
$xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
$xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

// Add homepage
$xml .= "  <url>\n";
$xml .= "    <loc>" . htmlspecialchars($baseUrl . '/index.php') . "</loc>\n";
$xml .= "    <lastmod>$today</lastmod>\n";
$xml .= "    <changefreq>$changefreq</changefreq>\n";
$xml .= "    <priority>1.0</priority>\n";
$xml .= "  </url>\n";

// Get all languages
$languagesPath = __DIR__ . '/languages';
$languages = array_filter(scandir($languagesPath), function($item) use ($languagesPath) {
    return $item != '.' && $item != '..' && is_dir($languagesPath . '/' . $item);
});

$trackCount = 0;
$albumCount = 0;

// Loop through languages
foreach ($languages as $language) {
    // Add language albums page
    $xml .= "  <url>\n";
    $xml .= "    <loc>" . htmlspecialchars($baseUrl . '/albums.php?lang=' . urlencode($language)) . "</loc>\n";
    $xml .= "    <lastmod>$today</lastmod>\n";
    $xml .= "    <changefreq>$changefreq</changefreq>\n";
    $xml .= "    <priority>$priority</priority>\n";
    $xml .= "  </url>\n";
    
    // Get all albums for this language
    $languagePath = $languagesPath . '/' . $language;
    $albums = array_filter(scandir($languagePath), function($item) use ($languagePath) {
        return $item != '.' && $item != '..' && is_dir($languagePath . '/' . $item);
    });
    
    // Loop through albums
    foreach ($albums as $album) {
        $albumCount++;
        
        // Add album player page
        $xml .= "  <url>\n";
        $xml .= "    <loc>" . htmlspecialchars($baseUrl . '/player.php?lang=' . urlencode($language) . '&album=' . urlencode($album)) . "</loc>\n";
        $xml .= "    <lastmod>$today</lastmod>\n";
        $xml .= "    <changefreq>$changefreq</changefreq>\n";
        $xml .= "    <priority>$priority</priority>\n";
        $xml .= "  </url>\n";
        
        // Get all MP3 files in this album
        $albumPath = $languagePath . '/' . $album;
        $files = array_filter(scandir($albumPath), function($item) use ($albumPath) {
            return $item != '.' && $item != '..' && pathinfo($item, PATHINFO_EXTENSION) === 'mp3';
        });
        
        // Add each MP3 file as a downloadable URL
        foreach ($files as $file) {
            $trackCount++;
            $xml .= "  <url>\n";
            $xml .= "    <loc>" . htmlspecialchars($baseUrl . '/download.php?lang=' . urlencode($language) . '&album=' . urlencode($album) . '&file=' . urlencode($file)) . "</loc>\n";
            $xml .= "    <lastmod>$today</lastmod>\n";
            $xml .= "    <changefreq>$changefreq</changefreq>\n";
            $xml .= "    <priority>0.6</priority>\n";
            $xml .= "  </url>\n";
        }
    }
}

// Close XML
$xml .= '</urlset>';

// Write to sitemap.xml file
$sitemapFile = __DIR__ . '/sitemap.xml';
$result = file_put_contents($sitemapFile, $xml);

// Display result
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitemap Generator</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .success {
            background: #d4edda;
            color: #155724;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #c3e6cb;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #f5c6cb;
        }
        .stats {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 { color: #333; }
        h2 { color: #667eea; margin-top: 20px; }
        .stat-item { 
            padding: 10px;
            margin: 10px 0;
            background: #f8f9fa;
            border-left: 4px solid #667eea;
            padding-left: 15px;
        }
        a {
            color: #667eea;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>🗺️ Sitemap Generator</h1>
    
    <?php if ($result !== false): ?>
        <div class="success">
            <h2>✅ Success!</h2>
            <p><strong>sitemap.xml</strong> has been generated successfully!</p>
            <p>File size: <?php echo number_format($result); ?> bytes</p>
        </div>
        
        <div class="stats">
            <h2>📊 Statistics</h2>
            <div class="stat-item">
                <strong>Languages:</strong> <?php echo count($languages); ?>
            </div>
            <div class="stat-item">
                <strong>Albums:</strong> <?php echo $albumCount; ?>
            </div>
            <div class="stat-item">
                <strong>Tracks:</strong> <?php echo $trackCount; ?>
            </div>
            <div class="stat-item">
                <strong>Total URLs:</strong> <?php echo 1 + count($languages) + $albumCount + $trackCount; ?>
            </div>
            <div class="stat-item">
                <strong>Last Updated:</strong> <?php echo $today; ?>
            </div>
        </div>
        
        <div class="stats">
            <h2>🔗 Links</h2>
            <p><a href="sitemap.xml" target="_blank">View sitemap.xml</a></p>
            <p><a href="index.php">← Back to Home</a></p>
        </div>
    <?php else: ?>
        <div class="error">
            <h2>❌ Error!</h2>
            <p>Failed to generate sitemap.xml. Please check file permissions.</p>
        </div>
    <?php endif; ?>
</body>
</html>
