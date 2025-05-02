<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebRTC Video & Voice Chat</title>
	
	<style>
	html,body{
  padding: 0;
  margin: 0;
}

.primary-video{
  position: absolute;
  width: 100%;
  height: 100%;
  object-fit: cover;
  background-color: black;
}

.secondary-video{
  position: absolute;
  width: 30%;
  height: 30%;
  margin: 16px;
  border-radius: 16px;
  object-fit: cover;
  background-color: grey;
}

.video{
  position: absolute;
  height: 100%;
  width: 100%;
  border-radius: 16px;
  object-fit: cover;
}

	</style>
</head>
<body>
    <h1>WebRTC Video & Voice Chat</h1>
    <div id="videos-container"></div>
    <button id="muteButton">Mute/Unmute</button>
    <button id="cameraButton">Disable/Enable Camera</button>
    <input type="text" id="peerIdInput" placeholder="Enter Peer ID">
    <button id="joinButton">Join</button>

    <div id="statusMessage"></div>

    <script src="https://cdn.jsdelivr.net/npm/peerjs@1.3.2/dist/peerjs.min.js"></script>
    <script>
        const MAX_CONNECTIONS = 3;
        const MAX_CALL_DURATION = 10 * 60 * 1000; // 10 minutes in milliseconds

        let peer = null;
        let localStream = null;
        let connections = [];

        async function startMedia() {
            try {
                localStream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
                document.getElementById('videos-container').appendChild(createVideoElement(localStream, 'local'));
            } catch (error) {
                console.error('Error accessing media devices: ', error);
            }
        }

        function createVideoElement(stream, id) {
            const video = document.createElement('video');
            video.id = id;
            video.srcObject = stream;
            video.autoplay = true;
            video.muted = id === 'local'; // Mute local video
            return video;
        }

        function initializePeer() {
            peer = new Peer();

            peer.on('open', (id) => {
                console.log('My peer ID is: ' + id);
            });

            peer.on('call', (call) => {
                const remoteStream = new MediaStream();

                call.on('close', () => {
                    removeVideo(call.peer);
                    displayStatusMessage(`Peer ${call.peer} left the call.`);
                });

                if (connections.length < MAX_CONNECTIONS) {
                    call.answer(localStream);
                    call.on('stream', (stream) => {
                        remoteStream.addTrack(stream.getVideoTracks()[0]);
                        remoteStream.addTrack(stream.getAudioTracks()[0]);
                        const remoteVideo = createVideoElement(remoteStream, call.peer);
                        document.getElementById('videos-container').appendChild(remoteVideo);
                        displayStatusMessage(`Peer ${call.peer} joined the call.`);
                    });
                    connections.push(call);
                } else {
                    call.close();
                    displayStatusMessage('Max connections reached. Call rejected.');
                }
            });

            peer.on('error', (err) => {
                console.error('PeerJS error: ', err);
                if (err.type !== 'browser-incompatible') { // Ignore certain error types
                    displayStatusMessage(`Error: ${err.message}`);
                }
            });
        }

        function muteUnmute() {
            localStream.getAudioTracks().forEach(track => {
                track.enabled = !track.enabled;
            });
        }

        function disableEnableCamera() {
            localStream.getVideoTracks().forEach(track => {
                track.enabled = !track.enabled;
            });
        }

        function joinSpecificPeer(peerId) {
            const existingCall = connections.find(call => call.peer === peerId);
            if (existingCall) {
                console.log(`Already in call with ${peerId}`);
                return;
            }

            const call = peer.call(peerId, localStream);
            const remoteStream = new MediaStream();

            call.on('stream', (stream) => {
                remoteStream.addTrack(stream.getVideoTracks()[0]);
                remoteStream.addTrack(stream.getAudioTracks()[0]);
                const remoteVideo = createVideoElement(remoteStream, peerId);
                document.getElementById('videos-container').appendChild(remoteVideo);
                displayStatusMessage(`Joined call with peer ${peerId}.`);

                // Disable local tracks only when the call is successfully established
                localStream.getAudioTracks().forEach(track => {
                    track.enabled = false;
                });

                localStream.getVideoTracks().forEach(track => {
                    track.enabled = false;
                });
            });

            call.on('error', (err) => {
                console.error('Call error: ', err);
                displayStatusMessage(`Error: ${err.message}`);

                // If call fails, enable local tracks again
                localStream.getAudioTracks().forEach(track => {
                    track.enabled = true;
                });

                localStream.getVideoTracks().forEach(track => {
                    track.enabled = true;
                });
            });

            connections.push(call);
        }

        function removeVideo(peerId) {
            const videoElement = document.getElementById(peerId);
            if (videoElement) {
                videoElement.remove();
            }
        }

        function displayStatusMessage(message) {
            const statusMessageDiv = document.getElementById('statusMessage');
            statusMessageDiv.textContent = message;
            setTimeout(() => {
                statusMessageDiv.textContent = '';
            }, 5000); // Clear message after 5 seconds
        }

        function closeConnections() {
            connections.forEach(connection => {
                connection.close();
            });
            connections = [];
        }

        window.onload = async () => {
            await startMedia();
            initializePeer();
        };

        document.getElementById('muteButton').addEventListener('click', muteUnmute);
        document.getElementById('cameraButton').addEventListener('click', disableEnableCamera);
        document.getElementById('joinButton').addEventListener('click', () => {
            const peerId = document.getElementById('peerIdInput').value.trim();
            if (peerId !== '') {
                joinSpecificPeer(peerId);
            } else {
                displayStatusMessage('Please enter a valid Peer ID.');
            }
        });
        setTimeout(closeConnections, MAX_CALL_DURATION); // Close connections after 10 minutes
    </script>
</body>
</html>
