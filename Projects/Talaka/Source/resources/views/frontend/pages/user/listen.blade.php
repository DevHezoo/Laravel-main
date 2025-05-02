<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>

$(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();

// Get all elements with class "Listening"
const listeningElements = document.querySelectorAll(".Listening"),
voiceList = document.getElementById("Accent");

let question;



// Add click event listeners to each element
listeningElements.forEach(element => {
    element.addEventListener("click", function() {
        const dataQuestionValue = element.getAttribute("data-question");
        question = dataQuestionValue;

        if (!isListening) {
            textToSpeech(question);
            isListening = true;
            element.textContent = 'Stop'; // Corrected property name
        } else if (synth.speaking && isListening) {
            synth.cancel(); // Stop speech
            isListening = false;
            element.textContent = 'Accent'; // Corrected property name
        }
        
        // Set the text back to "Listen" after speech ends
        utterance.onend = () => {
            element.textContent = 'Listen';
            isListening = false;
        };
    });
});




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
  synth.speak(utterance);
}





if (performance.navigation.type === 1 || performance.navigation.type === 0) {
    synth.cancel(); // Stop speech
}




</script>