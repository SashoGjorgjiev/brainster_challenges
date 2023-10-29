

const startScreen = document.querySelector('#start-screen')
const quizContainer =document.querySelector('.quiz-container') 
const startBtn = document.querySelector('#start-button');
const questionNumberElement = document.getElementById('question-number');
startBtn.addEventListener('click',function() {
    startScreen.style.display ='none';
    quizContainer.style.display ='block';
    handleHashChange();



});

const _question = document.getElementById('question');
const _options = document.querySelector('.quiz-options');
const _checkBtn = document.getElementById('check-answer');
const _playAgainBtn = document.getElementById('play-again');
const _result = document.getElementById('result');
const _correctScore = document.getElementById('correct-score');
const _totalQuestion = document.getElementById('total-question');
let correctAnswer = "";
let askedCount = 0;
let correctScore = 0;
let currentQuestionNumber = 1;
let totalQuestions = 20; 

window.addEventListener('hashchange', handleHashChange);

function handleHashChange() {
    const questionHash = window.location.hash;
    const questionNumber = parseInt(questionHash.substring(1));

    if (!isNaN(questionNumber) && questionNumber >= 1 && questionNumber <= totalQuestions) {
        currentQuestionNumber = questionNumber;

        loadQuestion();

        questionNumberElement.innerText = `Question ${currentQuestionNumber}`;
    }
}










async function loadQuestion(){
    const APIUrl = 'https://opentdb.com/api.php?amount=20';
    const result = await fetch(`${APIUrl}`)
    const data = await result.json();
    _result.innerHTML = "";
    showQuestion(data.results[0]);

}

document.addEventListener('click', function(){
    eventListeners();
    _totalQuestion.textContent = totalQuestions;
    _correctScore.textContent = correctScore;
});



function eventListeners(){
    _checkBtn.addEventListener('click', checkAnswer);
}

document.addEventListener('DOMContentLoaded', function(){
    loadQuestion();
    eventListeners();
    _totalQuestion.textContent = totalQuestions;
    _correctScore.textContent = correctScore;
});




document.addEventListener('click', function () {
    eventListeners();
    questionNumberElement.textContent = `Question ${currentQuestionNumber}`;
    _totalQuestion.textContent = totalQuestions;
    _correctScore.textContent = correctScore;
});








const spans = document.querySelectorAll('span');

spans.forEach(span => {
    span.style.fontSize = '30px'; 
});


function showQuestion(data){
    _checkBtn.disabled = false;
    correctAnswer = data.correct_answer;
    let incorrectAnswer = data.incorrect_answers;
    let optionsList = incorrectAnswer;
    optionsList.splice(Math.floor(Math.random() * (incorrectAnswer.length + 1)), 0, correctAnswer);
    // console.log(correctAnswer);

    
    _question.innerHTML = `${data.question} <br> <span class = "category"> ${data.category} </span>`;
    _options.innerHTML = `
        ${optionsList.map((option, index) => `
            <li> ${index + 1}. <span>${option}</span> </li>
        `).join('')}
    `;
    selectOption();
}


function selectOption(){
    _options.querySelectorAll('li').forEach(function(option){
        option.addEventListener('click', function(){
            if(_options.querySelector('.selected')){
                const activeOption = _options.querySelector('.selected');
                activeOption.classList.remove('selected');
            }
            option.classList.add('selected');
        });
    });
}
function checkAnswer() {
    _checkBtn.disabled = true;
    if (_options.querySelector('.selected')) {
        let selectedAnswer = _options.querySelector('.selected span').textContent;
        if (selectedAnswer == HTMLDecode(correctAnswer)) {
            correctScore++;
            _result.innerHTML = `<p><i class="fas fa-check"></i>Correct Answer!</p>`;
        } else {
            _result.innerHTML = `<p><i class="fas fa-times"></i>Incorrect Answer!</p> <small><b>Correct Answer: </b>${correctAnswer}</small>`;
        }

        checkCount();
        currentQuestionNumber +=1;

        window.location.hash = `#question-${currentQuestionNumber}`;

    } else {
        _result.innerHTML = `<p><i class="fas fa-question"></i>Please select an option!</p>`;
        _checkBtn.disabled = false;
    }
}







function HTMLDecode(textString) {
    let doc = new DOMParser().parseFromString(textString, "text/html");
    return doc.documentElement.textContent;
}


function checkCount(){
    askedCount++;
    setCount();
    if(askedCount == totalQuestions){
        _result.innerHTML += `<h3>Your score is ${correctScore}.</h3>`;
        _playAgainBtn.style.display = "block";
        _checkBtn.style.display = "none";
    } else {
        loadQuestion(); 
    }
}


function setCount(){
    _totalQuestion.innerText = totalQuestions;
    _correctScore.innerText = correctScore;
}


function restartQuiz(){
    correctScore = askedCount = 0;
    _checkBtn.style.display = "block";
    _checkBtn.disabled = false;
    setCount();
    loadQuestion();
}

_playAgainBtn.addEventListener('click', function(){
    localStorage.clear();
    window.location.reload();
});
