window.addEventListener("DOMContentLoaded", () => {
    // Flag to determine if the next song should automatically play
    let autoPlayNextSong = 'false';
    // Array to store the playlist
    let playlist = [];

    // Pull all audio files from elements with audioFile class (located under downloads)
    for (let audioFile of document.querySelectorAll(".audioFile")) {
        playlist.push({title: audioFile.innerHTML, src: audioFile.href})
    }

    const audio = new Audio(),
        // audioPlayerContainer = document.getElementById('audioPlayerContainer'),
        playButton = document.getElementById("playButton"),
        playButtonIcon = document.getElementById("playButtonIcon"),
        durationIndicator = document.querySelector('.player-slider-track'),
        durationToggler = document.getElementById('playerSlider'),
        currentTimeTxt = document.getElementById("currentTimeTxt"),
        totalTimeTxt = document.getElementById("totalTimeTxt"),
        muteButton = document.getElementById('muteButton'),
        muteButtonIcon = document.getElementById('muteButtonIcon'),
        volumeIndicator = document.querySelector('.player-volume-slider-track'),
        volumeToggler = document.getElementById('volumeSlider'),
        // currentTimeContainer = document.getElementById("currentTime"),
        // totalTime = document.getElementById("totalTime"),
        // progressBar = document.getElementById("progressBar"),
        // volumeControl = document.getElementById("volumeControl"),
        // volumeIcon = document.getElementById("volumeIcon"),
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
    if (autoPlayNextSong === 'true') {
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
    







    // Play/Pause Button
    // audio.addEventListener("play", () => {
    //     playButtonIcon.src="/img/icon/icon_pause_001_FFFFFF_32x32.svg";
    // });
    // audio.addEventListener("pause", () => {
    //     playButtonIcon.src="/img/icon/icon_play_001_FFFFFF_32x32.svg";
    // });

    // playButton.addEventListener("click", () => {
    //     if (audio.paused) {
    //         audio.play();
    //     } else {
    //         audio.pause();
    //     }
    // });

    // playButton.addEventListener('click', () => {
    //     if(playState === 'play') {
    //         audio.play();
    //         requestAnimationFrame(whilePlaying);
    //         playState = 'pause';
    //     } else {
    //         audio.pause();
    //         cancelAnimationFrame(raf);
    //         playState = 'play';
    //     }
    // });


    // const showRangeProgress = (rangeInput) => {
    //     if(rangeInput === progressBar) audioPlayerContainer.style.setProperty('--seek-before-width', rangeInput.value / rangeInput.max * 100 + '%');
    //     else audioPlayerContainer.style.setProperty('--volume-before-width', rangeInput.value / rangeInput.max * 100 + '%');
    // }
    
    // progressBar.addEventListener('input', (e) => {
    //     showRangeProgress(e.target);
    // });
    // Function to format the current time of the song in HH:MM:SS format
    // function timeString(seconds) {
    //     // Hours, minutes, seconds
    //     let secs = Math.floor(seconds),
    //         hours = Math.floor(secs / 3600),
    //         minutes = Math.floor((secs - (hours * 3600)) / 60);
    //     seconds = secs - (hours * 3600) - (minutes * 60);

    //     // Return formatted time
    //     if (hours > 0) {
    //         minutes = minutes < 10 ? "0" + minutes : minutes;
    //     }
    //     seconds = seconds < 10 ? "0" + seconds : seconds;
    //     return hours > 0 ? hours + ":" + minutes + ":" + seconds : minutes + ":" + seconds;
    // }

    // // Time Duration
    // audio.addEventListener("loadedmetadata", () => {
    //     currentTime.innerHTML = timeString(0);
    //     totalTime.innerHTML = timeString(audio.duration);
    // });
    // audio.addEventListener("timeupdate", () => {
    //     currentTime.innerHTML = timeString(audio.currentTime);
    // });

    // Set the maximum value and handle user input for the progress bar
    // audio.addEventListener("loadedmetadata", () => {        
    //     // Set the maximum value of the progress bar to the duration of the audio
    //     progressBar.max = Math.floor(audio.duration);

    //     // Flag to determine if the user is currently changing the time of the progress bar
    //     let seeking = false;

    //     // Update the flag when the user starts changing the time
    //     progressBar.addEventListener("input", () => {
    //         // requestAnimationFrame(whilePlaying);

    //         seeking = true;
    //     });

    //     // Update the audio's current time and start playing if necessary when the user stops changing the time
    //     progressBar.addEventListener("change", () => {
    //         audio.currentTime = progressBar.value;
    //         if (!audio.paused) {
    //             audio.play();
    //             requestAnimationFrame(whilePlaying);
    //         }
    //         seeking = false;
    //     });

    //     // Update the progress bar as the audio plays, but only if the user is not currently seeking a new time
    //     audio.addEventListener("timeupdate", () => {
    //         if (!seeking) {
    //             progressBar.value = Math.floor(audio.currentTime);
    //         }
    //     });
    // });

    // Update the audio's volume and the volume icon when the volume control is changed
    // volumeControl.addEventListener("change", () => {
    //     audio.volume = volumeControl.value;
    //     volumeIcon.innerHTML = volumeControl.value === 0 ? "volume_mute" : "volume_up";
    // });

    // // Enable or disable the audio controls when the audio is able to play or is waiting to play
    // audio.addEventListener("canplay", () => {
    //     playButton.disabled = false;
    //     // volumeControl.disabled = false;
    //     // progressBar.disabled = false;
    // });
    // audio.addEventListener("waiting", () => {
    //     playButton.disabled = true;
    //     // volumeControl.disabled = true;
    //     // progressBar.disabled = true;
    // });
// });


// const audio = document.getElementById('audio');
// const playButton = document.getElementById('playButton');
// const playButtonIcon = document.getElementById('playButtonIcon');
// const durationIndicator = document.querySelector('.player-slider-track');
// const durationToggler = document.getElementById('playerSlider');
// const muteButton = document.getElementById('muteButton');
// const muteButtonIcon = document.getElementById('muteButtonIcon');
// const volumeIndicator = document.querySelector('.player-volume-slider-track');
// const volumeToggler = document.getElementById('volumeSlider');
// let playState = 'play';
// let duration;

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
    durationIndicator.style.width = progress + '%';
    durationToggler.value = progress;
    return progress;
  }

  audio.addEventListener('timeupdate', (e) => {
    const currentTime = e.target.currentTime;
    getAudioProgress(currentTime);
  });

  durationToggler.addEventListener('input', (e) => {
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
  volumeToggler.addEventListener('input', (e) => {
    const value = e.target.value;
    const volume = value / 100;
    audio.volume = volume;
    volumeIndicator.style.width = value + '%';
  })
});