// Flag to determine if the next song should automatically play
let autoPlayNextSong = false;
// Flag to determine if the next song should automatically play a random song
let shufflePlaySong = false;
// Array to store the playlist
let playlist = [];

let playState = 'play';
let duration;

//Check if either song player is present
if (document.getElementById("sectionSongPlayerPlaylist") || document.getElementById("sectionSongPlayer")) {

    window.addEventListener("DOMContentLoaded", () => {

        if (document.getElementById("sectionSongPlayerPlaylist")) {

            // Pull all audio files from elements with audioFile class (located under downloads)
            for (let audioFile of document.querySelectorAll(".audioFile")) {
                playlist.push({
                    title: audioFile.parentElement.children[2].innerHTML,
                    artist: audioFile.parentElement.children[3].innerHTML,
                    image: audioFile.parentElement.children[1].children[0].src,
                    src: audioFile.innerHTML,
                    tableRow: audioFile.parentElement
                })
            }
        }
        if (document.getElementById("sectionSongPlayer")) {

            // Pull all audio files from elements with audioFile class (located under downloads)
            for (let audioFile of document.querySelectorAll(".audioFile")) {
                playlist.push({
                    title: document.getElementById('songTitleBig').innerHTML + ' - ' + audioFile.parentElement.parentElement.children[2].innerHTML,
                    src: audioFile.href,
                    tableRow: audioFile.parentElement.parentElement
                })
            }
        }

        const audio = new Audio(),
            playButton = document.getElementById("playButton"),
            playButtonIcon = document.getElementById("playButtonIcon"),
            repeatButton = document.getElementById("repeatButton"),
            shuffleButton = document.getElementById("shuffleButton"),
            currentTimeTxt = document.getElementById("currentTimeTxt"),
            totalTimeTxt = document.getElementById("totalTimeTxt"),
            playerIndicator = document.querySelector('.player-slider-track'),
            playerToggle = document.getElementById('playerToggle'),
            muteButton = document.getElementById('muteButton'),
            backButton = document.getElementById('backButton'),
            forwardButton = document.getElementById('forwardButton'),
            muteButtonIcon = document.getElementById('muteButtonIcon'),
            volumeIndicator = document.querySelector('.player-volume-slider-track'),
            volumeToggle = document.getElementById('volumeSlider'),
            playerCurrentSong = document.getElementById("playerCurrentSong");

        if (document.getElementById("sectionSongPlayerPlaylist")) {
            const songPlayerImg = document.getElementById("songPlayerImg"),
                playerCurrentArtist = document.getElementById("playerCurrentArtist");
        }

        // Build playlist
        for (let i in playlist) {
            // Create a new div element for each song in the playlist
            let playerSong = document.createElement("div");
            playerSong.className = "playerSong";
            playerSong.innerHTML = playlist[i]["title"];

            // Add a click event listener to play the corresponding song when clicked
            playlist[i].tableRow.addEventListener("click", () => {
                playAudio(i);
            });
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
            playState = 'pause';
            playButtonIcon.src = "/img/icon/icon_pause_001_FFFFFF_32x32.svg";
            playerCurrentSong.innerHTML = playlist[index]["title"];
            if (document.getElementById("sectionSongPlayerPlaylist")) {
                playerCurrentArtist.innerHTML = playlist[index]["artist"];
                songPlayerImg.src = playlist[index]["image"];
            }
            // Highlight the selected song in the playlist
            for (let i in playlist) {
                if (i == index) {
                    playlist[i].tableRow.classList.add("nowPlaying");
                } else {
                    playlist[i].tableRow.classList.remove("nowPlaying");
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
        audio.addEventListener("ended", () => {
            if (autoPlayNextSong === true) {
                currentSongIndex++;
                if (currentSongIndex >= playlist.length) {
                    currentSongIndex = 0;
                }
                playAudio(currentSongIndex);
            } else if (shufflePlaySong === true) {
                currentSongIndex = Math.floor(Math.random() * playlist.length);
                playAudio(currentSongIndex);
            } else {
                changePlayState();
            }
        });

        forwardButton.addEventListener('click', () => {
            currentSongIndex++;
            if (currentSongIndex >= playlist.length) {
                currentSongIndex = 0;
            }
            playAudio(currentSongIndex);
        });

        backButton.addEventListener('click', () => {
            console.log(currentSongIndex)
            currentSongIndex--;
            if (currentSongIndex < 0) {
                currentSongIndex = playlist.length - 1;
            }
            playAudio(currentSongIndex);
        });

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
        playButton.addEventListener('click', changePlayState);
        // Play/Pause Toggle on Spacebar
        document.body.onkeyup = function (e) {

            if (e.key == " " || e.code == "Space" || e.keyCode == 32) {
                changePlayState();
            }
        };

        function changePlayState() {
            if (playState === 'play') {
                audio.play();
                playState = 'pause';
                playButtonIcon.src = "/img/icon/icon_pause_001_FFFFFF_32x32.svg";
            } else {
                audio.pause();
                playState = 'play';
                playButtonIcon.src = "/img/icon/icon_play_001_FFFFFF_32x32.svg";
            }
        }

        // Repeat
        repeatButton.addEventListener('click', () => {
            if (!autoPlayNextSong) {
                autoPlayNextSong = true;
                repeatButton.classList.remove('player-button-disabled');

                if (shufflePlaySong === true) {
                    shufflePlaySong = false;
                    shuffleButton.classList.add('player-button-disabled');
                }
            } else {
                autoPlayNextSong = false;
                repeatButton.classList.add('player-button-disabled');
            }
        });

        //If the playlist element is set, make it default to autoplay
        if (document.getElementById("sectionSongPlayerPlaylist")) {
            autoPlayNextSong = true;
            repeatButton.classList.remove('player-button-disabled');
        }

        // Shuffle
        shuffleButton.addEventListener('click', () => {
            if (!shufflePlaySong) {
                shufflePlaySong = true;
                shuffleButton.classList.remove('player-button-disabled');

                if (autoPlayNextSong === true) {
                    autoPlayNextSong = false;
                    repeatButton.classList.add('player-button-disabled');
                }
            } else {
                shufflePlaySong = false;
                shuffleButton.classList.add('player-button-disabled');
            }

        });

        // Mute Toggle Button
        muteButton.onclick = () => {
            if (audio.muted) {
                audio.muted = false;
                muteButtonIcon.src = "/img/icon/icon_sound_001_FFFFFF_32x32.svg";
            } else {
                audio.muted = true;
                muteButtonIcon.src = "/img/icon/icon_mute_001_FFFFFF_32x32.svg";
            }
        }

        // Volume Toggle
        volumeToggle.addEventListener('input', (e) => {
            const value = e.target.value;
            audio.volume = value / 100;
            volumeIndicator.style.width = value + '%';
        })

        //Set default state for play button
        playState = 'play';
        playButtonIcon.src = "/img/icon/icon_play_001_FFFFFF_32x32.svg";
    })
}
