<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<style>
    .inline-span {
        display: inline-block;
        margin-right: 10px; /* Adjust as needed */
    }
</style>

<script>

let que_numbers = 0;

let the_answer;
let task = [];
let rater;
let rating = 0;

let time_left;
let unlock = 0;

let que = document.getElementById("Question");

let timeValue = {{ session('Seo')->meta_quiztime }};

const rate_accepted = {{ session('Seo')->meta_quizrate }};

// creating an array to store questions
let questions = [];

let que_number = {{session('Quiz')}};

let userScore = 0;
let counter;
let counterLine;
let widthValue = 0;
let answered = 0;

let userAns;
let correcAns;
let allOptions;
let checker;


// creating an array and passing the number, questions, options, and answers
@foreach($questions as $key => $question)

    // Constructing a JavaScript object for each question and pushing it into the questions array
    questions.push({
        numb: {{ $key + 1 }},
        question: "{{ $question->question }}",
        img: "{{ $question->img }}",
        answer: "{{ $question['ans_' . $question->answer] }}",
        options: [
            "{{ $question->ans_1 }}",
            "{{ $question->ans_2 }}",
            "{{ $question->ans_3 }}",
            "{{ $question->ans_4 }}"
        ]
    });

    // if (questions[{{ $key }}] && questions[{{ $key }}].options && questions[{{ $key }}].options[2]) {
    //   que_numbers++;
    // }
@endforeach



const correct = new Audio('/frontend/sounds/correct.wav');
const wrong = new Audio('/frontend/sounds/chat.wav');
correct.loop = false;
wrong.loop = false;

//selecting all required elements
const start_btn = document.querySelector(".quiz_strart button");
const info_box = document.querySelector(".info_box");
const exit_btn = info_box.querySelector(".buttons .quit");
const continue_btn = info_box.querySelector(".buttons .restart");
const quiz_box = document.querySelector(".quiz_box");
const result_box = document.querySelector(".result_box");
const ads_box = document.querySelector(".break_box");
const break_btn = document.querySelector(".buttons .break");
const option_list = document.querySelector(".option_list");
const timeText = document.querySelector(".timer .time_left_txt");
const timeCount = document.querySelector(".timer .timer_sec");

const next_btn = document.querySelector("footer .next_btn");
const bottom_ques_counter = document.querySelector("footer .total_que");

const quit_quiz = result_box.querySelector(".buttons .quit");


// if startQuiz button clicked
start_btn.onclick = () => {
  info_box.classList.add("activeInfo"); //show info box
};

// if exitQuiz button clicked
exit_btn.onclick = () => {
  info_box.classList.remove("activeInfo"); //hide info box
};

// if continueQuiz button clicked
continue_btn.onclick = () => {

    info_box.classList.remove("activeInfo"); //hide info box
    quiz_box.classList.add("activeQuiz"); //show quiz box

    queCounter(); //passing 1 parameter to queCounter
    startTimer(timeValue); //calling startTimer function
    startTimerLine(0); //calling startTimerLine function
      
    showQuetions(que_number);
};


// if quitQuiz button clicked
quit_quiz.onclick = () => {
  window.location.href = '/profile'; //redirect to the profile page
};

break_btn.onclick = () => {

    clearInterval(counter);
    clearInterval(counterLine);
    startTimer(timeValue);
    startTimerLine(widthValue);
    timeText.textContent = "Time Left";

    info_box.classList.remove("activeInfo"); //hide info box
    quiz_box.classList.add("activeQuiz"); //show quiz box
    ads_box.classList.remove("activeResult"); //show result box

    queCounter(); //passing 1 parameter to queCounter
    startTimer(timeValue); //calling startTimer function
    startTimerLine(0); //calling startTimerLine function

    showQuetions(que_number); //calling showQestions function
}

next_btn.onclick = () => {

  if(next_btn.textContent == "Next 3/3"){
      recognition.stop();
      synth.cancel(); // Stop speech
      task.length = 0;
      rating = 0;


            // if (questions[que_number].question == "ads") {
            //     showAds();
            // }else{
              que_number++;
              showQuetions(que_number);
              queCounter();

              clearInterval(counter);
              clearInterval(counterLine);
              startTimer(timeValue);
              startTimerLine(widthValue);
              timeText.textContent = "Time Left";
            // }




  }

  if(next_btn.textContent == "Try Again"){

      task.length = 0;
      rating = 0;
      window.location.href = '/quiz'; //redirect to the profile page

  }

};

// getting questions and options from array
function showQuetions(index) {
  queCounter();
  unlock = 0;
  task.length = 0;

  const que_text = document.querySelector(".que_text");
  const que_img = document.querySelector(".que_img");


  if (que_number < questions.length) {

  if (questions[que_number].question == "ads") {

    showAds();

  }else{

  let que_tag =
    "<span>" +
    questions[index].numb +
    ". " +
    questions[index].question +
    "</span>";

  let option_tag =
      '<div class="option"><span>A. ' + questions[index].options[0] + "</span></div>" +
      '<div class="option"><span>B. ' + questions[index].options[1] + "</span></div>" +
      '<div class="option"><span>C. ' + questions[index].options[2] + "</span></div>" +
      '<div class="option"><span>D. ' + questions[index].options[3] + "</span></div>";


    que_img.src = "{{ asset('frontend/upload/questions/') }}/" + questions[index].img;

    que_text.innerHTML = que_tag; //adding new span tag inside que_tag
    option_list.innerHTML = option_tag; //adding new div tag inside option_tag

    const option = option_list.querySelectorAll(".option");

    // set onclick attribute to all available options
    for (i = 0; i < option.length; i++) {
      option[i].setAttribute("onclick", "optionSelected(this)");
    }

    que.textContent = '. The Question is.' + '\n\n' +
                 '. ' + questions[index].question.replace(' ...','') + '.' +
                '\n\n' +
                'A. ' + questions[index].options[0] + '.\n' +
                'B. ' + questions[index].options[1] + '.\n' +
                'C. ' + questions[index].options[2] + '.\n' +
                'D. ' + questions[index].options[3] + '.\n\n' +
                '. Please Choose The Correct Answer.';

     listening_btn.classList.remove('d-none');

     listening_btn.innerHTML = '<span id="Listening" class="fas fa-volume-off" style="color: gray; background-color: transparent; cursor: pointer;"></span>';

    clearInterval(checker);
    checker = setInterval(Checking, 100);

    allOptions = option_list.children.length;
    for (let i = 0; i < allOptions; i++) {
      option_list.children[i].classList.add("disabled");
    }

  }

  }else{

        clearInterval(counter);
        clearInterval(counterLine);
        showResult();

}

}
// creating the new div tags which for icons
let tickIconTag = '<div class="icon tick"><i class="fas fa-check"></i></div>';
let crossIconTag = '<div class="icon cross"><i class="fas fa-times"></i></div>';

//if user clicked on option
function optionSelected(answer) {
  the_answer = answer;
  synth.cancel(); // Stop speech
  isListening = false;
      listening_btn.innerHTML = '<span id="Listening" class="fas fa-volume-mute" style="color: red; background-color: transparent; cursor: pointer;"></span>';

  clearInterval(counter); //clear counter
  clearInterval(counterLine); //clear counterLine

 userAns = answer.textContent.substring(3); //getting user selected option
 correcAns = questions[que_number].answer; //getting correct answer from array
 allOptions = option_list.children.length; //getting all option items


the_answer.classList.add("checker"); //adding green color to correct selected option

      for (i = 0; i < allOptions; i++) {
        option_list.children[i].classList.add("disabled"); //once user select an option then disabled all options
      }


  if (!task.includes('Selecting')) {
      task.push('Selecting');
  }

  if(task.length == 2){

    speaking_btn.classList.remove('d-none');

    speaking_btn.innerHTML = '<span id="Speaking" class="fas fa-microphone-alt" style="color: green; background-color: transparent; cursor: pointer;"></span>';
  }

}

function showResult() {
  info_box.classList.remove("activeInfo"); //hide info box
  quiz_box.classList.remove("activeQuiz"); //hide quiz box
  result_box.classList.add("activeResult"); //show result box
  ads_box.classList.remove("activeResult"); //show result box
}

function showAds() {

  clearInterval(counter);
  clearInterval(counterLine);

  info_box.classList.remove("activeInfo"); //hide info box
  quiz_box.classList.remove("activeQuiz"); //hide quiz box
  ads_box.classList.add("activeResult"); //show result box
  
  


  const video = document.getElementById("vid"),
        title = document.getElementById("title"),
        about = document.getElementById("about");

  let frame;

  frame =
    `<iframe style='padding: 8px; border-radius: 25px;' src='${questions[que_number].options[0]}' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>`;

  video.innerHTML = frame; // adding new iframe tag inside the 'video' element

  title.textContent = questions[que_number].question;
  about.textContent = questions[que_number].options[1];

  que_number++;
}

function startTimer(time) {
  counter = setInterval(timer, 1000);

  function timer() {
    timeCount.textContent = time; //changing the value of timeCount with time value
    time--; //decrement the time value

    if (time < 10) {
      //if timer is less than 10
      timeCount.textContent = "0" + time; //add a 0 before time value
    }

    if (time < 0) {
      clearInterval(counter); //clear counter when time reaches 0
      timeCount.textContent = '00';
      timeText.textContent = "Expired"; //change the time text to time off
      let correcAns = questions[que_number].answer; //getting correct answer from array

      for (let i = 0; i < allOptions; i++) {
        if (option_list.children[i].textContent === correcAns) {
          //if there is an option which is matched to an array answer
          option_list.children[i].setAttribute("class", "option correct"); //adding green color to matched option
          option_list.children[i].insertAdjacentHTML("beforeend", tickIconTag); //adding tick icon to matched option
        }
      }

      for (let i = 0; i < allOptions; i++) {
        option_list.children[i].classList.add("disabled"); //once user select an option then disabled all options
      }

    }
  }

  synth.cancel(); // Stop speech
  isListening = false;

  listening_btn.innerHTML = '<span id="Listening" class="fas fa-volume-off" style="color: gray; background-color: transparent; cursor: pointer;"></span>';

  speaking_btn.classList.add('d-none');
}


function startTimerLine(time) {
  const progressBarWidth = 549; // Total width of the progress bar in pixels
  const totalTime = timeValue; // Total time in seconds
  const interval = totalTime * 1000 / progressBarWidth; // Calculate the interval dynamically
  counterLine = setInterval(timer, interval); // Set the interval using the calculated value
  function timer() {
    time += 1; // Upgrading time value with 1
    // time_line.style.width = time + "px"; // Increasing width of time_line with px by time value
    if (time >= progressBarWidth) {
      // If time value is greater than the progress bar width
      clearInterval(counterLine); // Clear counterLine
    }
  }
}

function queCounter() {
  //creating a new span tag and passing the question number and total question
  let totalQueCounTag =
    "<div><span style='display: inline-flex;'><p>" +
    (que_number + 1)
    + "</p> of <p>" +
    questions.length +
    "</p>" +
    "</span>";

    rater =
    "<span id='rate' style='display: inline-flex;'><p>"+
    " | Voice Rating: " +
    rating +
    "/10</p></span></div>";

    bottom_ques_counter.innerHTML = totalQueCounTag + rater; //adding new span tag inside bottom_ques_counter

}



// Function to check for changes in the text content
function Checking() {

  if (timeCount.textContent === "00") {
    task.length = 0;
    next_btn.textContent =  "Try Again";
  } else {
    next_btn.textContent =  "Next " + task.length + "/3";
  }

  if (task.length === 3) {

    speaking_btn.classList.add("d-none");
    listening_btn.classList.add("d-none");

    if (typeof userAns !== 'undefined') {
      if (userAns == correcAns) {
        userScore += 1;
        the_answer.classList.remove("checker");
        the_answer.classList.add("correct");
        the_answer.insertAdjacentHTML("beforeend", tickIconTag);
        correct.play();
      } else {
        the_answer.classList.add("incorrect");
        the_answer.insertAdjacentHTML("beforeend", crossIconTag); 

        for (let i = 0; i < allOptions; i++) {
          if (option_list.children[i].textContent.substring(3) == correcAns) {
            option_list.children[i].setAttribute("class", "option correct");
            option_list.children[i].insertAdjacentHTML("beforeend", tickIconTag);
            wrong.play();
          }
        }
      }

      var csrfToken = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
        url: '/question',
        type: 'POST',
        data: { 
          Question: que_number + 1,
          Rate: rating,
          Answer: userAns,
          '_token': csrfToken
        },
        success: function(response) {
          // window.location.href = '/shortlink/{{ strtolower(session('PageUnit')) }}/' + LinkIndex;
        },
        error: function(error) {
          // window.location.href = '/shortlink/{{ strtolower(session('PageUnit')) }}';
        }
      });
    }

    // Clear the interval only after all actions have been taken
    clearInterval(checker);

    for (let i = 0; i < allOptions; i++) {
      option_list.children[i].classList.add("disabled");
    }
  }

  if (task.length === 1 && unlock === 0) {

      unlock = 1;
  
      for (let i = 0; i < allOptions; i++) {
        option_list.children[i].classList.remove("disabled");
      }
  }
}


</script>

@include('quiz.listen')
@include('quiz.speak')