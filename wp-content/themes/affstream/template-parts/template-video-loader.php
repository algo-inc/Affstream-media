<div class="video-loader" id="videLoader">
	<video id="myVideo" src="<?= get_template_directory_uri() . '/img/logo-animation.mp4' ?>" autoplay loop muted ></video>
</div>
<style>
    .video-loader{
        position: fixed;
        bottom: 0;
        top: 0;
        left: 0;
        right: 0;
        width: 100%;
        height: 100%;
        background: black;
        opacity: 1;
        z-index: 70;
        transition: all 0.3s linear;
    }
    #myVideo{
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: auto;
        z-index: 99;
    }
</style>
<script>
  window.onload = function() {
    var video = document.getElementById('myVideo');
    var videoLoader = document.getElementById('videLoader');
    setTimeout(function() {
      hideVideo();
      changeBodyOpacity();
    }, 4400);
    function hideVideo() {
      video.style.display = 'none';
      videoLoader.style.opacity = '0';
      videoLoader.style.display = 'none';
    }
  };
</script>
