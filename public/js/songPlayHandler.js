window.addEventListener("DOMContentLoaded", () => {
    // Flag to determine if the next song should automatically play
    let autoPlayNextSong = 'false';
    // Array to store the playlist
    let playlist = [];

    // Pull all audio files from elements with audioFile class (located under downloads)
    for (let audioFile of document.querySelectorAll(".audioFile")) {
        playlist.push({title: audioFile.innerHTML, src: audioFile.href})
    }

    // Get HTML audio player controls
    const audio = new Audio(),
        playButton = document.getElementById("playButton"),
        playButtonIcon = document.getElementById("playButtonIcon"),
        currentTime = document.getElementById("currentTime"),
        totalTime = document.getElementById("totalTime"),
        progressBar = document.getElementById("progressBar"),
        volumeControl = document.getElementById("volumeControl"),
        volumeIcon = document.getElementById("volumeIcon"),
        playerPlaylist = document.getElementById("playerPlaylist");

    // Build playlist using the map function
    const playlistRows = playlist.map((song, index) => {
        // Create a new div element for each song in the playlist
        let playerSong = document.createElement("div");
        playerSong.className = "playerSong";
        playerSong.innerHTML = song["title"];

        // Add a click event listener to play the corresponding song when clicked
        playerSong.addEventListener("click", () => {
            playAudio(index);
        });
        return playerSong;
    });

    // Append the playlist rows to the playlist container
    playlistRows.forEach((row) => {
        playerPlaylist.appendChild(row);
    });


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

    // Update the play/pause button text when the audio is played or paused
    audio.addEventListener("play", () => {
        playButtonIcon.innerHTML = "pause";
    });
    audio.addEventListener("pause", () => {
        playButtonIcon.innerHTML = "play_arrow";
    });

    // Click the play/pause button to play or pause the audio
    playButton.addEventListener("click", () => {
        if (audio.paused) {
            audio.play();
        } else {
            audio.pause();
        }
    });

    // Function to format the current time of the song in HH:MM:SS format
    function timeString(seconds) {
        // Hours, minutes, seconds
        let secs = Math.floor(seconds),
            hours = Math.floor(secs / 3600),
            minutes = Math.floor((secs - (hours * 3600)) / 60);
        seconds = secs - (hours * 3600) - (minutes * 60);

        // Return formatted time
        if (hours > 0) {
            minutes = minutes < 10 ? "0" + minutes : minutes;
        }
        seconds = seconds < 10 ? "0" + seconds : seconds;
        return hours > 0 ? hours + ":" + minutes + ":" + seconds : minutes + ":" + seconds;
    }

    // Set the initial time display and total time for the audio
    audio.addEventListener("loadedmetadata", () => {
        // Set the current time display to 0 and the total time display to the duration of the audio
        currentTime.innerHTML = timeString(0);
        totalTime.innerHTML = timeString(audio.duration);
    });

    // Update the current time display for the audio
    audio.addEventListener("timeupdate", () => {
        currentTime.innerHTML = timeString(audio.currentTime);
    });

    // Set the maximum value and handle user input for the progress bar
    audio.addEventListener("loadedmetadata", () => {
        // Set the maximum value of the progress bar to the duration of the audio
        progressBar.max = Math.floor(audio.duration);

        // Flag to determine if the user is currently changing the time of the progress bar
        let seeking = false;

        // Update the flag when the user starts changing the time
        progressBar.addEventListener("input", () => {
            seeking = true;
        });

        // Update the audio's current time and start playing if necessary when the user stops changing the time
        progressBar.addEventListener("change", () => {
            audio.currentTime = progressBar.value;
            if (!audio.paused) {
                audio.play();
            }
            seeking = false;
        });

        // Update the progress bar as the audio plays, but only if the user is not currently seeking a new time
        audio.addEventListener("timeupdate", () => {
            if (!seeking) {
                progressBar.value = Math.floor(audio.currentTime);
            }
        });
    });

    // Update the audio's volume and the volume icon when the volume control is changed
    volumeControl.addEventListener("change", () => {
        audio.volume = volumeControl.value;
        volumeIcon.innerHTML = volumeControl.value === 0 ? "volume_mute" : "volume_up";
    });

    // Enable or disable the audio controls when the audio is able to play or is waiting to play
    audio.addEventListener("canplay", () => {
        playButton.disabled = false;
        volumeControl.disabled = false;
        progressBar.disabled = false;
    });
    audio.addEventListener("waiting", () => {
        playButton.disabled = true;
        volumeControl.disabled = true;
        progressBar.disabled = true;
    });
});
