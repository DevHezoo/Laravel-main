<script>
var speechRecognition = window.webkitSpeechRecognition;
var recognition = new speechRecognition();
var textbox = '';
var res = document.getElementById("Recorder");
var content = '';
var isSpeaking = false; // Flag to indicate if speech is detected
var timeout;

recognition.continuous = true;

recognition.onstart = function() {

  speaking_btn.innerHTML = '<span id="Speaking" class="fas fa-microphone-alt-slash" style="color: red; background-color: transparent; cursor: pointer;"></span>';

  listening_btn.classList.add('d-none');
};

recognition.onspeechstart = function() {
  isSpeaking = true;
};

recognition.onspeechend = function() {
  isSpeaking = false;
};

recognition.onerror = function() {
};

recognition.onresult = function(event) {
  var current = event.resultIndex;
  var transcript = event.results[current][0].transcript;
  content += transcript;
  textbox = content;
  textbox = textbox.replace(".", "");
  textbox = textbox.replace("?", "");
  textbox = textbox.replace(", ", "");
  textbox = textbox.replace("!", "");
  
  res.value = textbox;

  clearTimeout(timeout); // Clear previous timeout
  timeout = setTimeout(stopRecognition, 1500); // Start new timeout

    let question = correcAns;
    let myAnswer = res.value.toLowerCase();

    let rate = calculateSimilarity(question, myAnswer);

    rating = rate.toFixed(0);

    if (!task.includes('Speaking')) {
        task.push('Speaking');
    }

    queCounter();
};

function stopRecognition() {
  
  if (!isSpeaking) { // Stop only if not speaking
    recognition.stop();
    
    speaking_btn.innerHTML = '<span id="Speaking" class="fas fa-microphone-alt" style="color: green; background-color: transparent; cursor: pointer;"></span>';

    if (!(task.length === 3)) {
        listening_btn.classList.remove('d-none');
    }

  }
    
}

speaking_btn.addEventListener("click", function() {

// if (!isListening) {

    if (isSpeaking) {
        recognition.stop();
        speaking_btn.innerHTML = '<span id="Speaking" class="fas fa-microphone-alt" style="color: green; background-color: transparent; cursor: pointer;"></span>';
        isSpeaking = false;

        synth.cancel(); // Stop speech
        isListening = false;
        listening_btn.innerHTML = '<span id="Listening" class="fas fa-volume-mute" style="color: red; background-color: transparent; cursor: pointer;"></span>';

        if (!(task.length === 3)) {
        listening_btn.classList.remove('d-none');
    }



  }else{
      synth.cancel(); // Stop speech
      isSpeaking = true;  
      content = '';
      textbox = '';
      recognition.start();
  }
   
// }


});


function levenshteinDistance(a, b) {
    // Create a 2D array to store the distances
    const distances = Array(a.length + 1)
        .fill(null)
        .map(() => Array(b.length + 1).fill(null));

    // Fill the first row and column of the array
    for (let i = 0; i <= a.length; i++) {
        distances[i][0] = i;
    }
    for (let j = 0; j <= b.length; j++) {
        distances[0][j] = j;
    }

    // Fill in the rest of the array
    for (let i = 1; i <= a.length; i++) {
        for (let j = 1; j <= b.length; j++) {
            const cost = a[i - 1] === b[j - 1] ? 0 : 1;
            distances[i][j] = Math.min(
                distances[i - 1][j] + 1, // deletion
                distances[i][j - 1] + 1, // insertion
                distances[i - 1][j - 1] + cost // substitution
            );
        }
    }

    // The distance between the two strings is the value in the bottom right corner of the array
    return distances[a.length][b.length];
}

function calculateSimilarity(question, answer) {
    const maxDistance = Math.max(question.length, answer.length);
    const distance = levenshteinDistance(question, answer);
    const similarity = 1 - distance / maxDistance;
    return similarity * 10; // Normalize to a scale of 10
}



</script>