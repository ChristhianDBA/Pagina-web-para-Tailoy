
document.addEventListener('DOMContentLoaded', function () {
    var youtubeVideo = document.getElementById('youtube-video');

    youtubeVideo.contentWindow.postMessage('{"event":"command","func":"mute","args":""}', '*');
});
