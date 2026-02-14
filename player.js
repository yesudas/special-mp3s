// Music Player JavaScript
document.addEventListener('DOMContentLoaded', function() {
    const audioPlayer = document.getElementById('audio-player');
    const audioSource = document.getElementById('audio-source');
    const currentTrackName = document.getElementById('current-track-name');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    const trackItems = document.querySelectorAll('.track-item');
    
    let currentTrackIndex = -1;
    let tracks = [];
    
    // Build tracks array
    trackItems.forEach((item, index) => {
        tracks.push({
            index: index,
            src: item.dataset.src,
            name: item.querySelector('.track-name').textContent,
            element: item
        });
        
        // Add click event to play button
        const playBtn = item.querySelector('.play-btn');
        playBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            playTrack(index);
        });
        
        // Add click event to track item
        item.addEventListener('click', function() {
            playTrack(index);
        });
    });
    
    // Play track function
    function playTrack(index) {
        if (index < 0 || index >= tracks.length) return;
        
        currentTrackIndex = index;
        const track = tracks[index];
        
        // Update audio source
        audioSource.src = track.src;
        audioPlayer.load();
        audioPlayer.play();
        
        // Update UI
        currentTrackName.textContent = track.name;
        
        // Remove playing class from all tracks
        trackItems.forEach(item => item.classList.remove('playing'));
        
        // Add playing class to current track
        track.element.classList.add('playing');
        
        // Update button states
        updateButtonStates();
        
        // Scroll track into view
        track.element.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }
    
    // Update button states
    function updateButtonStates() {
        prevBtn.disabled = currentTrackIndex <= 0;
        nextBtn.disabled = currentTrackIndex >= tracks.length - 1;
    }
    
    // Previous button
    prevBtn.addEventListener('click', function() {
        if (currentTrackIndex > 0) {
            playTrack(currentTrackIndex - 1);
        }
    });
    
    // Next button
    nextBtn.addEventListener('click', function() {
        if (currentTrackIndex < tracks.length - 1) {
            playTrack(currentTrackIndex + 1);
        }
    });
    
    // Auto-play next track when current ends
    audioPlayer.addEventListener('ended', function() {
        if (currentTrackIndex < tracks.length - 1) {
            playTrack(currentTrackIndex + 1);
        }
    });
    
    // Initialize button states
    updateButtonStates();
    
    // Auto-play first track
    if (tracks.length > 0) {
        playTrack(0);
    }
});
