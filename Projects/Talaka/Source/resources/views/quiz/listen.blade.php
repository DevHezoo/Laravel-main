<script>
const listening_btn = document.getElementById("Listening"),
      speaking_btn = document.getElementById("Speaking"),
      voiceList = document.getElementById("Accent");

let question = document.getElementById("Question");


let synth = speechSynthesis,
  isListening = false,
  utterance;

voices();

function voices() {
  voiceList.innerHTML = ""; // Clear previous options
  let count = 0; // Track the number of voices added
  for (let voice of synth.getVoices()) {
    if (voice.name.includes("Online (Natural) - English (United States)")) {
      if (count >= 5 && !voice.name.includes("Roger Online (Natural)")) { // Skip the first four voices
        let selected = voice.name === ""; // This line needs to be adjusted based on your requirements
        let option = `<option value="${voice.name}" ${selected}>${voice.name} (${voice.lang})</option>`;
        voiceList.insertAdjacentHTML("beforeend", option);
      }
      count++; // Increment the count after adding each voice
    }
  }
}



synth.addEventListener("voiceschanged", voices);

function textToSpeech(text) {
  utterance = new SpeechSynthesisUtterance(text);
  for (let voice of synth.getVoices()) {
    if (voice.name === voiceList.value) {
      utterance.voice = voice;
    }
  }
  
  // Get the options in the dropdown list
  let options = voiceList.options;
  // Select a random option index
  let randomIndex = Math.floor(Math.random() * options.length);
    // Set the selected voice from the dropdown list
  utterance.voice = synth.getVoices().find(voice => voice.name === options[randomIndex].value);
  
  
  utterance.rate = 0.62;
  utterance.onend = () => {
    isListening = false;
    listening_btn.innerHTML = '<span id="Listening" class="fas fa-volume-off" style="color: gray; background-color: transparent; cursor: pointer;"></span>';

    let allOptions = option_list.children.length;
    for (let i = 0; i < allOptions; i++) {
        option_list.children[i].classList.remove("disabled");
    }

  };
  synth.speak(utterance);
}



  listening_btn.addEventListener("click", function() {


    if (!task.includes('Listening')) {
        task.push('Listening');
    }

    if (question.textContent !== null && !isListening) {
      textToSpeech(question.textContent);
      isListening = true;
      listening_btn.innerHTML = '<span id="Listening" class="fas fa-volume-up" style="color: green; background-color: transparent; cursor: pointer;"></span>';

      speaking_btn.classList.add('d-none');
      
    } else if (synth.speaking && isListening) {
      synth.cancel(); // Stop speech
      isListening = false;
      listening_btn.innerHTML = '<span id="Listening" class="fas fa-volume-mute" style="color: red; background-color: transparent; cursor: pointer;"></span>';
    }

    if(task.length > 1){

      speaking_btn.classList.remove('d-none');
      
      speaking_btn.innerHTML = '<span id="Speaking" class="fas fa-microphone-alt" style="color: green; background-color: transparent; cursor: pointer;"></span>';
    }


  });



if (performance.navigation.type === 1 || performance.navigation.type === 0) {
    synth.cancel(); // Stop speech
}


</script>