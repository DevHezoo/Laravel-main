<style type="text/css">
  .hidden {
    display: none;
}
</style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/peerjs/1.3.2/peerjs.min.js"></script>
    <div id="wrapper">


      <div class="card-body p-5 status">
                  <p class="fs--1 text-500">Request From The Host</p>
                  <ol>
                    <p>Pending..</p>
                  </ol>
                </div>

      <video id="remote-video" style="padding: 8px; border-radius: 25px;" height="450" autoplay></video>
      <div class="clear"></div>
    </div>

<script type="text/javascript">

document.addEventListener('DOMContentLoaded', () => {
const friendId = '{{$live->identifier}}';

// listener.js

// let localVideo = document.getElementById("local-video");
let remoteVideo = document.getElementById("remote-video");
let peer, localStream, remoteStream, call;

let MediaConfiguration = {
    audio: true,
    video: true
};

function init(userId) {
    peer = new Peer(userId);
    peer.on("open", () => {
        // console.log(`User connected with userID = ${userId}`);
      listenCall();
    });
}

function makeCall(friendId) {
    navigator.mediaDevices.getUserMedia(MediaConfiguration)
        .then(stream => {
            // localVideo.srcObject = stream;
            // localStream = stream;
            call = peer.call(friendId, stream);
            call.on("stream", (stream) => {
                remoteStream = stream;
                remoteVideo.srcObject = stream;
            });
            call.on("close", () => {
                remoteStream = null;
                remoteVideo.srcObject = null;
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
                // localVideo.srcObject = stream;
                // localStream = stream;
                call = incomingCall;
                call.answer(stream);
                call.on("stream", (stream) => {
                    remoteStream = stream;
                    remoteVideo.srcObject = stream;
                });
                call.on("close", () => {
                    remoteStream = null;
                    remoteVideo.srcObject = null;
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


  makeCall(friendId);


// Listen for user disconnect
peer.on('close', () => {
    // User disconnected, update UI accordingly
    remoteStream = null;
    remoteVideo.srcObject = null;
});


});
</script>