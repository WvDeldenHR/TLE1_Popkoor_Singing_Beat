window.addEventListener("DOMContentLoaded", () => {
  // Flag to determine if the next song should automatically play
  let autoPlayNextSong = true;
  // Array to store the playlist
  let playlist = [];

  // Pull all audio files from elements with audioFile class (located under downloads)
  for (let audioFile of document.querySelectorAll(".audioFile")) {
    playlist.push({title: audioFile.innerHTML, src: audioFile.href})
  }

  const audio = new Audio(),
    playButton = document.getElementById("playButton"),
    playButtonIcon = document.getElementById("playButtonIcon"),
    repeatButton = document.getElementById("repeatButton"),
    repeatButtonIcon = document.getElementById("repeatButtonIcon"),
    currentTimeTxt = document.getElementById("currentTimeTxt"),
    totalTimeTxt = document.getElementById("totalTimeTxt"),
    playerIndicator = document.querySelector('.player-slider-track'),
    playerToggle = document.getElementById('playerToggle'),
    muteButton = document.getElementById('muteButton'),
    muteButtonIcon = document.getElementById('muteButtonIcon'),
    volumeIndicator = document.querySelector('.player-volume-slider-track'),
    volumeToggle = document.getElementById('volumeSlider'),
    playerPlaylist = document.getElementById("playerPlaylist");
    let playState = 'play';
    let duration;

  // Build playlist
  for (let i in playlist) {
    // Create a new div element for each song in the playlist
    let playerSong = document.createElement("div");
    playerSong.className = "playerSong";
    playerSong.innerHTML = playlist[i]["title"];

    // Add a click event listener to play the corresponding song when clicked
    playerSong.addEventListener("click", () => {
      playAudio(i);
    });
    playlist[i]["row"] = playerSong;
    playerPlaylist.appendChild(playerSong);
  }

  // Flag to determine if the current song should start playing
  let startPlaying = false;
  // Index of the currently playing song
  let currentSongIndex = 0;

  // Play the selected song
  function playAudio(index, noStart) {
    currentSongIndex = index;
    startPlaying = !noStart;
    audio.src = playlist[index]["src"];
    // Highlight the selected song in the playlist
    for (let i in playlist) {
      if (i == index) {
        playlist[i]["row"].classList.add("now");
      } else {
        playlist[i]["row"].classList.remove("now");
      }
    }
  }

  // Start playing the audio when it is sufficiently buffered
  audio.addEventListener("canplay", () => {
    if (startPlaying) {
      audio.play();
      startPlaying = false;
    }
  });

  // If the autoPlayNextSong flag is set to true, play the next song in the playlist when the current song ends
  if (autoPlayNextSong === true) {
    audio.addEventListener("ended", () => {
      currentSongIndex++;
        if (currentSongIndex >= playlist.length) {
          currentSongIndex = 0;
        }
      playAudio(currentSongIndex);
    });
  }

  // Set the first song in the playlist as the initial song
  playAudio(0, true);


  audio.addEventListener('loadedmetadata', () => {
    duration = audio.duration;
  });

  // Current/Total Time Display
  const timeString = (secs) => {
      const minutes = Math.floor(secs / 60);
      const seconds = Math.floor(secs % 60);
      const returnedSeconds = seconds < 10 ? `0${seconds}` : `${seconds}`;
      return `${minutes}:${returnedSeconds}`;
  }

  audio.addEventListener('loadedmetadata', () => {
    currentTimeTxt.innerHTML = timeString(0);
    totalTimeTxt.innerHTML = timeString(audio.duration);
  })
  audio.addEventListener("timeupdate", () => {
    currentTimeTxt.innerHTML = timeString(audio.currentTime);
  });

  // Player Toggle
  const setCurrentTime = (currentTime) => {
    audio.currentTime = currentTime;
  }

  const getAudioProgress = (currentTime) => {
    const progress = currentTime / duration * 100
    playerIndicator.style.width = progress + '%';
    playerToggle.value = progress;
    return progress;
  }

  audio.addEventListener('timeupdate', (e) => {
    const currentTime = e.target.currentTime;
    getAudioProgress(currentTime);
  });

  playerToggle.addEventListener('input', (e) => {
    const progress = parseInt(e.target.value);
    const time = progress / 100 * duration;
    setCurrentTime(time);
    getAudioProgress(time, duration);

  })

  // Play/Pause Toggle Button
  playButton.addEventListener('click', () => {
      if(playState === 'play') {
          audio.play();
          playState = 'pause';
          playButtonIcon.src="/img/icon/icon_pause_001_FFFFFF_32x32.svg";
      } else {
          audio.pause();
          playState = 'play';
          playButtonIcon.src="/img/icon/icon_play_001_FFFFFF_32x32.svg";
      }
  });
  // Play/Pause Toggle on Spacebar
  document.body.onkeyup = function(e) {
    if (e.key == " " || e.code == "Space" || e.keyCode == 32) { 
      if(playState === 'play') {
        audio.play();
        playState = 'pause';
        playButtonIcon.src="/img/icon/icon_pause_001_FFFFFF_32x32.svg";
      } else {
        audio.pause();
        playState = 'play';
        playButtonIcon.src="/img/icon/icon_play_001_FFFFFF_32x32.svg";
      }
    }
  };

  // Repeat
  const repeatButtonDisabled = document.querySelector(".player-button-repeat");
  
  autoPlayNextSong = true;
  repeatButton.addEventListener('click', () => {
    if (audio.repeat) {
      console.log(autoPlayNextSong);
      audio.repeat = false;
      autoPlayNextSong = true;
      repeatButtonDisabled.classList.add('player-button-disabled');
      repeatButtonIcon.src="/img/icon/icon_repeat_001_FFFFFF_32x32.svg"
    } else {
      console.log(autoPlayNextSong);
      audio.repeat = true;
      autoPlayNextSong = false;
      repeatButtonDisabled.classList.remove('player-button-disabled');
      repeatButtonIcon.src="/img/icon/icon_repeat_001_5F3F6D_32x32.svg"
    }
  });



  // Mute Toggle Button
  muteButton.onclick = () => {
    if (audio.muted) {
      audio.muted = false;
      muteButtonIcon.src="/img/icon/icon_sound_001_FFFFFF_32x32.svg";
    } else {
      audio.muted = true;
      muteButtonIcon.src="/img/icon/icon_mute_001_FFFFFF_32x32.svg";
    }
  }

  // Volume Toggle
  volumeToggle.addEventListener('input', (e) => {
    const value = e.target.value;
    const volume = value / 100;
    audio.volume = volume;
    volumeIndicator.style.width = value + '%';
  })
});