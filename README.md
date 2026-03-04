# Special MP3s Collection - Mobile-Friendly PHP Website

A beautiful, mobile-responsive website for browsing and playing MP3 collections organized by language and albums.

## ✨ Demo URL

https://wordofgod.in/special-mp3s/

## ✨ Features

### � Music Player
- **Built-in HTML5 Audio Player**: Play tracks directly in the browser
- **Auto-Play Next Track**: Automatically advances to the next track when current ends
- **Previous/Next Controls**: Easy navigation between tracks
- **Track Highlighting**: Visual indication of currently playing track
- **Sequential Playback**: Tracks play in the order of filename

### 📚 Content Organization
- **Multi-Language Support**: Easy navigation between different languages (Badaga, English, Hindi, Kannada, Malayalam, Marathi, Tamil, Telugu)
- **Album Organization**: Browse albums within each language
- **Automatic Name Formatting**: Hyphens removed from folder/file names for better display
- **Natural Sorting**: Files sorted in natural order (1, 2, 10 vs 1, 10, 2)

> **Note**: The Healing-Bible-Tablet albums from the languages Badaga, Hindi, Kannada, Malayalam, Marathi and Telugu are published by [www.HealingBibleVerse.com](https://www.HealingBibleVerse.com). We are including them here at one place and streaming free of cost.

### ⬇️ Download Functionality
- **Individual Track Downloads**: Download any MP3 file with a single click
- **Secure Downloads**: File access restricted to MP3 files only
- **Direct Download Links**: No redirects or waiting times

### 📱 Mobile-Responsive Design
- **Fully Responsive**: Works perfectly on mobile, tablet, and desktop
- **Touch-Friendly**: Large buttons and controls optimized for touch screens
- **Adaptive Grid Layout**: Automatically adjusts to screen size
- **Mobile Navigation**: Easy-to-use back buttons and breadcrumbs

### 🎨 Modern UI/UX
- **Beautiful Gradient Design**: Purple/blue gradient theme throughout
- **Smooth Animations**: Hover effects and transitions
- **Card-Based Layout**: Clean, modern card design for languages and albums
- **Custom Footer**: Contact information, quick links, and visitor counter

### 📊 Visitor Tracking
- **Session-Based Counter**: Tracks unique visitors per session
- **Bot Detection**: Filters out search engine bots and crawlers
- **Real-Time Display**: Shows visitor count in footer
- **Thread-Safe**: Uses file locking to prevent race conditions

### 🗺️ SEO Features
- **Sitemap Generator**: Automatic XML sitemap generation
- **All Pages Indexed**: Includes languages, albums, and individual tracks
- **SEO-Friendly URLs**: Clean, readable URLs for all content
- **Auto-Update**: Regenerate sitemap anytime with statistics

### � Progressive Web App (PWA)
- **Install Prompt**: Smart install banner for mobile and desktop
- **Offline Support**: Service worker caches pages and assets
- **App Icons**: 192x192 and 512x512 icons for home screen
- **Standalone Mode**: Launches in full-screen app mode
- **Add to Home Screen**: Install as a native-like app on any device
- **Fast Loading**: Cached resources for instant page loads

### �🔒 Security
- **Path Traversal Protection**: Uses `basename()` to prevent directory attacks
- **File Type Validation**: Only MP3 files can be downloaded
- **Safe Includes**: Modular footer and component includes

## 📁 File Structure

```
special-mp3s/
├── index.php           # Language selection page
├── albums.php          # Album listing page
├── player.php          # Music player page
├── download.php        # File download handler
├── sitemap.php         # Sitemap generator with statistics
├── footer.php          # Site footer (contact, links, copyright)
├── footer-links.php    # Quick links section
├── copyright.php       # Copyright information
├── counter.php         # Visitor counter with session tracking
├── style.css           # Responsive styles
├── player.js           # Player functionality
├── counter.txt         # Visitor count storage
├── sitemap.xml         # Generated sitemap
├── pwa/                # Progressive Web App files
│   ├── manifest.json   # PWA manifest configuration
│   ├── sw.js           # Service worker for offline support
│   ├── pwa.js          # PWA install prompt logic
│   ├── pwa-head.php    # PWA meta tags and styles
│   ├── pwa-body.php    # PWA install banner HTML
│   ├── icon-192.png    # App icon 192x192
│   └── icon-512.png    # App icon 512x512
└── languages/          # MP3 files organized by language/album
    ├── Badaga/
    │   └── Healing-Bible-Tablet/
    ├── English/
    │   └── Healing-Bible-Tablet/
    ├── Hindi/
    │   └── Healing-Bible-Tablet/
    ├── Kannada/
    │   └── Healing-Bible-Tablet/
    ├── Malayalam/
    │   └── Healing-Bible-Tablet/
    ├── Marathi/
    │   └── Healing-Bible-Tablet/
    ├── Tamil/
    │   ├── 1000-Praises/
    │   ├── Asuththa-Aavigalai-Kattungal/
    │   ├── Healing-Bible-Tablet/
    │   ├── Jesus-Life-History/
    │   └── Yesuvin-Raththathin-Thuthigal/
    └── Telugu/
        └── Healing-Bible-Tablet/
```

## 🚀 Setup Instructions

### Requirements
- PHP 7.0 or higher (PHP 8.x recommended)
- Web server (Apache, Nginx, or PHP built-in server)
- File write permissions for counter.txt and sitemap.xml

### Local Development

1. **Using PHP Built-in Server** (Easiest):
   ```bash
   cd /Users/yesudas/WOG/github-projects/special-mp3s
   php -S localhost:8000
   ```
   Then open http://localhost:8000 in your browser.

2. **Using Apache/Nginx**:
   - Point your web server document root to the project folder
   - Ensure PHP is enabled and sessions are configured
   - Access via your configured domain/localhost

### Deployment

1. Upload all files to your web hosting
2. Ensure the `languages` folder and all subdirectories are accessible
3. Make sure PHP is enabled on your hosting
4. Set write permissions for counter.txt (will be auto-created)
5. Generate sitemap by visiting: `http://yourdomain.com/sitemap.php`
6. Access via your domain name

## 📖 Usage

### For Visitors

1. **Select Language**: Choose from available languages on the home page
2. **Browse Albums**: View all albums in the selected language
3. **Play Music**: 
   - Click on an album to open the player
   - First track auto-plays by default
   - Use Previous/Next buttons or click any track to play
   - Tracks automatically continue to the next one
4. **Download**: Click the download icon (⬇️) next to any track

### For Administrators

1. **Add New Content**:
   - Create a new folder under `languages/[Language]/[Album-Name]/`
   - Add MP3 files to the folder
   - Files will automatically appear on the website

2. **Generate Sitemap**:
   - Visit `http://yourdomain.com/sitemap.php`
   - View statistics and download sitemap.xml
   - Submit to search engines

3. **Track Visitors**:
   - Visitor count displayed in footer
   - Session-based counting (one count per browser session)
   - Bot traffic automatically excluded

4. **Install as PWA**:
   - Users will see an install prompt banner
   - Click "Install" to add to home screen
   - App works offline after installation
   - Update `pwa/manifest.json` to customize app name and colors

## 🎯 Features Explained

### Automatic Album Name Formatting
- Album folder names like "Healing-Bible-Tablet" display as "Healing Bible Tablet"
- Track names like "Track-01-Introduction" display as "Track 01 Introduction"
- Hyphens are automatically removed for better readability

### Player Controls
- **Play Button**: Starts playing the selected track
- **Previous Button**: Goes to the previous track (disabled on first track)
- **Next Button**: Advances to the next track (disabled on last track)
- **Audio Controls**: Native browser controls for volume, seeking, playback speed
- **Visual Feedback**: Currently playing track highlighted with gradient background

### Visitor Counter
- **Session-Based**: Counts unique browser sessions, not page views
- **Bot Filtering**: Excludes search engines, crawlers, and automated tools
- **Thread-Safe**: Uses file locking to prevent concurrent write issues
- **Persistent**: Survives server restarts (stored in counter.txt)

### Sitemap Generator
- **Automatic**: Scans all languages, albums, and tracks
- **Statistics Dashboard**: Shows counts of languages, albums, tracks, total URLs
- **SEO Optimized**: Includes lastmod dates and priority values
- **Download Links**: Includes individual MP3 download URLs

### Progressive Web App (PWA)
- **Installable**: Users can install the website as an app on their device
- **Smart Install Banner**: Automatically prompts users on supported browsers
- **Offline Capable**: Service worker caches resources for offline access
- **Native Experience**: Runs in standalone mode without browser UI
- **Cross-Platform**: Works on Android, iOS, Windows, Mac, Linux
- **App Icons**: Custom icons appear on home screen/app drawer
- **Fast & Reliable**: Cached assets load instantly, even on slow networks

**PWA Technical Details:**
- **Service Worker**: Caches pages, CSS, JS, and icons for offline use
- **Install Banner**: Smart detection shows install prompt when appropriate
- **Manifest**: Configures app name, colors, icons, and display mode
- **Dismissible Prompt**: Users can dismiss install banner (won't show again for 7 days)
- **Automatic Updates**: Service worker updates cache when files change
- **Background Sync**: (Future enhancement for offline downloads)

### Mobile Optimization
- **Responsive Grid**: Layout adapts from 1-column (mobile) to multi-column (desktop)
- **Touch-Friendly**: Large tap targets (minimum 44x44px)
- **Optimized Font Sizes**: Scales appropriately for screen size
- **Smooth Animations**: GPU-accelerated transitions
- **Fast Loading**: Minimal CSS/JS, optimized for mobile networks

## 🌐 Browser Compatibility

Works on all modern browsers:
- ✅ Chrome/Edge (version 90+)
- ✅ Firefox (version 88+)
- ✅ Safari (version 14+)
- ✅ Mobile browsers (iOS Safari 14+, Chrome Mobile 90+)
- ✅ Opera (version 76+)

**Note**: HTML5 audio support required for music playback.

## 🔒 Security Features

- **Path Traversal Protection**: Uses `basename()` to prevent directory attacks
- **File Type Validation**: Only MP3 files can be downloaded/played
- **Safe Includes**: Modular PHP includes prevent code injection
- **Bot Detection**: Filters malicious bot traffic from visitor count
- **Input Sanitization**: All user input sanitized with `htmlspecialchars()` and `urlencode()`
- **Session Security**: PHP sessions used for visitor tracking (no cookies exposed)

## 🎨 Customization

### Changing Colors
Edit `style.css` to modify the color scheme:
```css
/* Primary gradient (header, player, footer) */
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);

/* Change to your preferred colors */
background: linear-gradient(135deg, #your-color-1 0%, #your-color-2 100%);
```

### Disabling Auto-Play
In `player.js`, remove or comment out:
```javascript
// Auto-play first track
if (tracks.length > 0) {
    playTrack(0);
}
```

### Customizing Footer
Edit `footer.php`, `footer-links.php`, and `copyright.php` to change:
- Contact information
- Quick links
- Copyright message
- Footer layout

### Customizing PWA
Edit `pwa/manifest.json` to customize the app:
```json
{
  "name": "Your App Name",
  "short_name": "Short Name",
  "description": "Your app description",
  "theme_color": "#667eea",
  "background_color": "#ffffff"
}
```

Replace icons:
- `pwa/icon-192.png` - 192x192 pixels
- `pwa/icon-512.png` - 512x512 pixels

### Changing Version Number
Update version in `index.php`, `albums.php`, `player.php`:
```php
$version = "2026.02"; // Change to your version
```

## 📊 Technical Details

### Session Management
- Sessions started automatically on first page load
- Visitor counted only once per session
- Session expires when browser closes (default PHP behavior)

### File Operations
- **Thread-Safe Writes**: File locking (`LOCK_EX`) prevents corruption
- **Natural Sorting**: `natsort()` ensures proper track order
- **Dynamic Scanning**: No database required, folders scanned in real-time

### Performance
- **Minimal Dependencies**: Only Font Awesome and Bootstrap Icons (CDN)
- **Lightweight**: Total CSS ~15KB, JS ~3KB (unminified)
- **Caching Headers**: CSS versioned for cache busting
- **No Database**: Pure file-based system for fast deployment
- **Service Worker**: PWA caching for instant repeat visits
- **Offline First**: Critical assets cached for offline access

## 🆘 Troubleshooting

### Visitor Counter Not Working
1. Check file permissions: `chmod 666 counter.txt` or let PHP create it
2. Verify sessions are enabled in php.ini: `session.save_path` writable
3. Clear browser cookies/cache to test new session

### Music Not Playing
1. Ensure MP3 files are in correct location: `languages/[Lang]/[Album]/`
2. Check file extensions are lowercase `.mp3`
3. Verify browser supports HTML5 audio (all modern browsers do)
4. Check browser console for errors (F12)

### Download Not Working
1. Use HTTP not HTTPS for localhost: `http://localhost:8000`
2. Check file permissions on languages folder
3. Verify download.php has correct path resolution

### Sitemap Not Generating
1. Check write permissions in root directory
2. Ensure all language/album folders are readable
3. Visit sitemap.php directly to see error messages

### PWA Not Installing
1. Must use HTTPS in production (localhost with HTTP is OK for testing)
2. Ensure `pwa/manifest.json` is accessible
3. Check browser console for service worker errors (F12 → Console)
4. Clear browser cache and reload page
5. On iOS Safari: Use "Add to Home Screen" from share menu

### Service Worker Issues
1. Check `pwa/sw.js` is loading correctly (Network tab in DevTools)
2. Unregister old service workers: DevTools → Application → Service Workers
3. Clear cache: DevTools → Application → Storage → Clear site data
4. Hard refresh: Ctrl+Shift+R (Windows) or Cmd+Shift+R (Mac)

## 📞 Contact & Support

For questions, issues, or contributions:
- **Email**: wordofgod@wordofgod.in
- **WhatsApp**: +91 7676505599
- **Website**: https://wordofgod.in

## 📄 License

**No Copyright** - Freely copy and distribute as per Matthew 10:8.

Feel free to use, modify, and distribute this project for personal or commercial purposes.

## 🙏 Acknowledgments

- Built with vanilla PHP, CSS, and JavaScript (no frameworks)
- Icons by Font Awesome and Bootstrap Icons
- PWA capabilities using modern web standards
- Designed for Word of God ministry

---

**Version**: 2026.02  
**Last Updated**: February 14, 2026  
**Maintained by**: Word of God Team  
**Features**: Music Player, PWA, Offline Support, Visitor Tracking, SEO Optimized
