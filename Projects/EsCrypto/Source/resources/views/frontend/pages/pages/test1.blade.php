<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Call</title>
    <link rel="shortcut icon" href="#" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/peerjs/1.3.2/peerjs.min.js"></script>
    <style>
        #wrapper {
            width: 920px;
            height: auto;
            margin: 0 auto;
        }

        #local-video, #remote-video {
            width: 47.5%;
            height: 300px;
            float: left;
            margin-right: 5%;
        }

        .clear {
            clear: both;
        }

        @media (max-width: 767px) {
            #wrapper {
                width: 100%;
                height: auto;
            }

            #local-video, #remote-video {
                width: 100%;
                height: auto;
                float: none;
            }

        }
    </style>
</head>
<body>
    <div id="wrapper">
        <video id="local-video" width="400" height="300" autoplay muted></video>
        <video id="remote-video" width="400" height="300" autoplay></video> <!-- Added remote-video element -->
        <div>
            <input type="text" id="friendIdInput" placeholder="Enter friend's ID">
            <button id="callBtn">Call</button>
            <button id="toggleCameraBtn">Toggle Camera</button>
            <button id="toggleAudioBtn">Toggle Audio</button>
        </div>
        <div class="clear"></div>
    </div>

    
    <script>
        let localVideo = document.getElementById("local-video");
        // let remoteVideo = document.getElementById("remote-video"); // Added remoteVideo definition
        let id_peer = document.getElementById("friendIdInput");
        let peer, localStream, remoteStream, call;

        let MediaConfiguration = {
            audio: true,
            video: true
        };

        function init(userId) {
            peer = new Peer(userId);
            peer.on("open", () => {
                console.log(`User connected with userID = ${userId}`);
                id_peer.value = userId;
            });
            listenCall();
        }

        function makeCall(friendId) {
            navigator.mediaDevices.getUserMedia(MediaConfiguration)
                .then(stream => {
                    localVideo.srcObject = stream;
                    localStream = stream;
                    call = peer.call(friendId, stream);
                    call.on("stream", (stream) => {
                        remoteStream = stream;
                        remoteVideo.srcObject = stream;
                    });
                    call.on("close", () => {
                        // remoteStream = null;
                        // remoteVideo.srcObject = null;
                    });
                })
                .catch(error => {
                    console.error("Error accessing media devices:", error);
                });
        }

        function listenCall() {
            peer.on("call", (incomingCall) => {
                navigator.mediaDevices.getUserMedia(MediaConfiguration)
                    .then(stream => {
                        localVideo.srcObject = stream;
                        localStream = stream;
                        call = incomingCall;
                        call.answer(stream);
                        call.on("stream", (stream) => {
                            // remoteStream = stream;
                            // remoteVideo.srcObject = stream;
                        });
                        call.on("close", () => {
                            // remoteStream = null;
                            // remoteVideo.srcObject = null;
                        });
                    })
                    .catch(error => {
                        console.error("Error accessing media devices:", error);
                    });
            });
        }

        // Call init with random UUID
        init(getUID());

        // Generate a random UUID string.
        function getUID() {
            return ([1e7] + -1e3 + -4e3 + -8e3 + -1e11).replace(/[018]/g, (c) =>
                (
                    c ^
                    (crypto.getRandomValues(new Uint8Array(1))[0] & (15 >> (c / 4)))
                ).toString(16)
            );
        }

        // Button to initiate call
        document.getElementById("callBtn").addEventListener("click", () => {
            const friendId = document.getElementById("friendIdInput").value.trim();
            if (friendId === '') {
                alert('Please enter a valid friend ID');
                return;
            }
            makeCall(friendId);
        });

        // Button to toggle camera
        document.getElementById("toggleCameraBtn").addEventListener("click", () => {
            if (localStream) {
                const tracks = localStream.getVideoTracks();
                tracks.forEach(track => {
                    track.enabled = !track.enabled;
                });
            }
        });

        // Button to toggle audio
        document.getElementById("toggleAudioBtn").addEventListener("click", () => {
            if (localStream) {
                const tracks = localStream.getAudioTracks();
                tracks.forEach(track => {
                    track.enabled = !track.enabled;
                });
            }
        });

        // Listen for user disconnect
        peer.on('close', () => {
            // User disconnected, update UI accordingly
            // remoteStream = null
            // remoteVideo.srcObject = null;
        });
    </script>
    
</body>
</html>