<div id="audio" class="holder">
  <div class="audio green-audio-player">
    <div class="play-pause-btn">  
        <i class="fas fa-play play-pause-icon" id="playPause"></i>
    </div>

    <div class="controls">
      <span class="current-time">0:00</span>
      <div class="slider" data-direction="horizontal">
        <div class="progress">
          <div class="pin" id="progress-pin" data-method="rewind"></div>
        </div>
      </div>
      <span class="total-time">0:00</span>
    </div>

    <div class="volume">
      <div class="volume-btn">
          <i class="fas fa-volume-up" id="speaker"></i>
      </div>
    </div>

    <audio id="player" src=""></audio>
  </div>
</div>