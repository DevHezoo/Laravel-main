<script type='text/javascript' src='https://cdn.scaledrone.com/scaledrone.min.js'></script>

<script type="text/javascript">
let member;

let audio = true;
let camera = true;

const local = document.getElementById('localVideo');
const rem = document.getElementById('remoteVideo');
const reminder = document.getElementById('reminder');

const stream_member = document.getElementById('stream_members');

const toggleAudioButton = document.getElementById('toggleAudioButton');
const toggleVideoButton = document.getElementById('toggleVideoButton');

const roomHash = {!! json_encode($Identifier->identifier) !!};
// TODO: Replace with your own channel ID
const drone = new ScaleDrone(roomHash);
// Room name needs to be prefixed with 'observable-'
const roomName = 'observable-' + roomHash;
const configuration = {
  iceServers: [{
    urls: 'stun:stun.l.google.com:19302'
  }]
};
let room;
let pc;
local.style.backgroundColor = '#000';
rem.style.backgroundColor = '#000';

    // Event listener for the toggle video button
    toggleAudioButton.addEventListener('click', () => {

        if (!audio) {
            audio = true;
            toggleAudioButton.innerText = "Mute Audio";
            toggleAudioButton.classList.add('btn-info');
            toggleAudioButton.classList.remove('btn-danger');
        }else{
            audio = false;
            toggleAudioButton.innerText = "Unmute Audio";
            toggleAudioButton.classList.remove('btn-info');
            toggleAudioButton.classList.add('btn-danger');
        }
        sendMessage({ type: 'audioState', enabled: audio });
    });

    // Event listener for the toggle video button
    toggleVideoButton.addEventListener('click', () => {

        if (!camera) {
            local.classList.remove('d-none');
            camera = true;
            toggleVideoButton.innerText = "Mute Video";
            toggleVideoButton.classList.add('btn-info');
            toggleVideoButton.classList.remove('btn-danger');
        }else{
            local.classList.add('d-none');
            camera = false;
            toggleVideoButton.innerText = "Unmute Video";
            toggleVideoButton.classList.remove('btn-info');
            toggleVideoButton.classList.add('btn-danger');
        }
        // Send signaling message to inform other peers about the video state change
        sendMessage({ type: 'videoState', enabled: camera });

    });

function onSuccess() {};
function onError(error) {
  // console.error(error);
};

drone.on('open', error => {
  if (error) {
    return console.error(error);
  }
  room = drone.subscribe(roomName);
  room.on('open', error => {
    if (error) {
      onError(error);
    }
  });

  // Handle 'members' event
  room.on('members', members => {
    member = members;
    const isOfferer = members.length === 2;
    startWebRTC(isOfferer);

    // Show reminder if less than 2 members
    if (members.length < 2) {
      reminder.classList.remove('d-none');
      stream_member.innerText = "Stream (" + members.length + "/" + "2)";
    } else {
      reminder.classList.add('d-none');
      stream_member.innerText = "Stream (" + members.length + "/" + "2)";
    }
  });


// Handle 'leave' event
room.on('leave', member => {
  console.log('dsad');
  // Check if the member that left is the other peer
  if (member.id !== drone.clientId) {
    // Update the member count
    updateMemberCount(room.members.length);
  }
});

// Handle 'join' event
room.on('join', member => {
  console.log('asd');
  // Check if the number of members in the room is now 2
  if (room.members.length === 2) {
    // Hide reminder and update stream count
    reminder.classList.add('d-none');
    updateMemberCount(room.members.length);
  }
});


});

// Function to update member count
function updateMemberCount(count) {
  stream_member.innerText = "Stream (" + count + "/" + "2)";
}
// Send signaling data via Scaledrone
function sendMessage(message) {
  drone.publish({
    room: roomName,
    message
  });
}

function startWebRTC(isOfferer) {
  pc = new RTCPeerConnection(configuration);

  // 'onicecandidate' notifies us whenever an ICE agent needs to deliver a
  // message to the other peer through the signaling server
  pc.onicecandidate = event => {
    if (event.candidate) {
      sendMessage({'candidate': event.candidate});
    }
  };

  // If user is offerer let the 'negotiationneeded' event create the offer
  if (isOfferer) {
    pc.onnegotiationneeded = () => {
      pc.createOffer().then(localDescCreated).catch(onError);
    }
  }

  // When a remote stream arrives display it in the #remoteVideo element
  pc.ontrack = event => {
    const stream = event.streams[0];
    if (!remoteVideo.srcObject || remoteVideo.srcObject.id !== stream.id) {
      remoteVideo.srcObject = stream;

      


    

            if(member.length < 3 ){
                reminder.classList.add('d-none');
                stream_member.innerText = "Stream (" + (member.length) + "/" + "2)";
            }
      


      
    }
  };

  navigator.mediaDevices.getUserMedia({
    audio: audio,
    video: camera,
  }).then(stream => {
    // Display your local video in #localVideo element
    localVideo.srcObject = stream;
    // Add your stream to be sent to the conneting peer
    stream.getTracks().forEach(track => pc.addTrack(track, stream));
  }, onError);

  // Listen to signaling data from Scaledrone
room.on('data', (message, client) => {
    // Message was sent by us
    if (client.id === drone.clientId) {
        return;
    }

    // Handle video state change message from the other peer
    if (message.type === 'videoState') {
        // Update the camera state of the other peer
        const enabled = message.enabled;
        if (!enabled) {
            // If the other peer has disabled their camera, stop displaying their video
            remoteVideo.srcObject.getTracks().forEach(track => {
                if (track.kind === 'video') {
                    track.enabled = false;
                }
            });
        } else {
            // If the other peer has enabled their camera, display their video
            navigator.mediaDevices.getUserMedia({
                video: true,
            }).then(stream => {
                // Replace the existing srcObject with the new stream
                remoteVideo.srcObject = stream;
            }, onError);
        }
    }


    // Handle video state change message from the other peer
    if (message.type === 'audioState') {
        // Update the camera state of the other peer
        const enabled = message.enabled;
        if (!enabled) {
            // If the other peer has disabled their camera, stop displaying their video
            remoteVideo.srcObject.getTracks().forEach(track => {
                if (track.kind === 'audio') {
                    track.enabled = false;
                }
            });
        } else {
            // If the other peer has enabled their camera, display their video
            navigator.mediaDevices.getUserMedia({
                audio: true,
            }).then(stream => {
                // Replace the existing srcObject with the new stream
                remoteVideo.srcObject = stream;
            }, onError);
        }
    }




    if (message.sdp) {
        // This is called after receiving an offer or answer from another peer
        pc.setRemoteDescription(new RTCSessionDescription(message.sdp), () => {
            // When receiving an offer lets answer it
            if (pc.remoteDescription.type === 'offer') {
                pc.createAnswer().then(localDescCreated).catch(onError);
            }
        }, onError);
    } else if (message.candidate) {
        // Add the new ICE candidate to our connections remote description
        pc.addIceCandidate(
            new RTCIceCandidate(message.candidate), onSuccess, onError
        );
    }
});



}

function localDescCreated(desc) {
  pc.setLocalDescription(
    desc,
    () => sendMessage({'sdp': pc.localDescription}),
    onError
  );
}






</script>