<section>
    <div class="player even-column-3 | d-grid py-3 px-4">
            <div class="d-flex align-items-center">
                <div class="player-img">

                </div>
                <div class="px-3">

                </div>
            </div>
            <div class="d-flex flex-column justify-content-center">
        
                <audio id='audio' src='/mp3/RIOT-Overkill.mp3' type="audio/mpeg"></audio>
                <div class="d-flex justify-content-center pb-3">
                    <button class="player-button" id="playButton">
                        <img class="player-icon" id="playButtonIcon" src="/img/icon/icon_play_001_FFFFFF_32x32.svg">
                    </button>
                </div>
                <div class="player-content">
                    <div class="player-slider-track"></div>
                    <input class="player-input" id="playerSlider" type="range" value="0" />
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-end">
                <button class="player-button" id="muteButton">
                    <img class="player-icon-sm" id="muteButtonIcon" src="/img/icon/icon_sound_001_FFFFFF_32x32.svg">
                </button>
                <div class="player-volume | mx-2">
                    <div class="player-volume-slider-track"></div>
                    <input class="player-volume-input" id='volumeSlider' type="range" value="100" />
                </div>
               
            </div>
        </div>
</section>