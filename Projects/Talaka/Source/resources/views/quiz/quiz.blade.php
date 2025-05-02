@include('quiz.css')
<br><br><br><br><br><br><br>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>


<div class="col-12 mt-4 text-center quiz_strart">
    <div class="d-flex justify-content-center">
        <button class="btn-primary btn">
            <span class="fw-semi-bold">Start Quiz</span>
        </button>
    </div>
</div>

    <!-- Info Box -->
    <div class="info_box">
        <div class="info-title"><span>Some Rules of this Quiz</span></div>
        <div class="info-list">
            <div class="info">1. There are {{ session('Questions') }} questions.</div>
            <div class="info">2. You have to choose an answer, then test your accent.</div>
            <div class="info">3. You will have only <span>{{ session('Seo')->meta_quiztime }} seconds</span> for each question.</div>
            <div class="info">4. Once you select your answer, it can't be undone.</div>
            <div class="info">5. You can't select any option once time runs out.</div>
            <div class="info">6. You can exit from the quiz while you're playing.</div>
            <div class="info">7. Points based on your correct (answers/accent).</div>
            <div class="info">8. Steps: Listen, Choose answer, Then Test Your Accent.</div>
        </div>
        <div class="buttons">
            <button class="quit">Exit Quiz</button>
            <button class="restart">Continue</button>
        </div>
    </div>

    <!-- Quiz Box -->
    <div class="quiz_box">
        <span id="Recorder" class="d-none"></span>
        <span id="Question" class="d-none"></span>
        <select id="Accent" class="d-none"></select>
        <header>
            <div class="title">
            Actions:&nbsp
                <span id="Listening"></span>
                <span id="Speaking"></span>
        </div>
            <div class="timer">
                <div class="time_left_txt">Time Left</div>
                <div class="timer_sec">{{session('Seo')->meta_quiztime}}</div>
            </div>
        </header>
        <section style="padding-bottom:0px;" class="sectionn">
            <img class="que_img" width="225" height="225" style="border-radius: 10px;" draggable="false">
            <div class="que_text">
            </div>
            <div style="padding-bottom:10px;" class="option_list">
            </div>
        </section>
        <footer>
            <div class="total_que">
            </div>
            <button class="next_btn nex show"></button>
        </footer>
    </div>

<br><br>
    <div class="result_box">
        <div class="icon">
            <img src="{{ asset('frontend/assets/img/favicons/apple-touch-icon.png') }}" width="125" height="100">
        </div>
        <div class="complete_text">You've completed the Daily Quiz, Comeback Later!</div>
        <div class="score_text">
        </div>
        <div class="buttons">
            <button class="quit">Return</button>
        </div>
    </div>

    <div class="break_box">
        <p>Take a Break</p>
        <div id="vid" class="complete_text">
        </div>
        <p id="title"></p>
        <p id="about"></p>
        <div class="buttons">
            <button class="break">Continue</button>
        </div>
    </div>

@include('quiz.js')