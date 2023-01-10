<section>
    <div class="player even-column-3 | d-grid py-3 px-4">
        <div class="d-flex align-items-center">
            <div class="player-img">
                @if($song->path_cover_art !== null)
                    <img class="img-thumbnail" src="{{asset('storage/' . $song->path_cover_art)}}" alt="Albumhoes {{$song->title}}">
                @endif
            </div>
            <div class="px-3">
                <p class="player-txt-light | fs-300 fw-semi-bold">{{$song->title}}</p>
                <p class="player-txt | fs-300">{{$song->artist}}</p>
            </div>
        </div>
        <div class="d-flex flex-column justify-content-center">
            <div class="d-none" id="autoPlayNextSong">false</div>
                
            <div class="d-flex justify-content-center py-2">
                <button class="player-button player-button-disabled">
                    <img class="player-icon-sm" src="/img/icon/icon_shuffle_001_FFFFFF_32x32.svg">
                </button>
                <button class="player-button player-button-disabled | mx-3">
                    <img class="player-icon-sm image-invert" src="/img/icon/icon_next_001_FFFFFF_32x32.svg">
                </button>

                <button class="player-button | mx-2" id="playButton">
                    <img class="player-icon-md" id="playButtonIcon" src="/img/icon/icon_play_001_FFFFFF_32x32.svg">
                </button>

                <button class="player-button player-button-disabled | mx-3">
                    <img class="player-icon-sm " src="/img/icon/icon_next_001_FFFFFF_32x32.svg">
                </button>
                <button class="player-button player-button-disabled">
                    <img class="player-icon-sm" src="/img/icon/icon_repeat_001_FFFFFF_32x32.svg">
                </button>
            </div>

            <div class="d-flex align-items-center">
                <span class="player-time | fs-300" id="currentTimeTxt">0:00</span>
                <div class="player-content | mt-2 mb-1 mx-2">
                    <div class="player-slider-track"></div>
                    <input class="player-input" id="playerSlider" type="range" value="0" />
                </div>
                <span class="player-time | fs-300" id="totalTimeTxt">0:00</span>
            </div>

            <div class="d-none" id="playerPlaylist"></div>
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