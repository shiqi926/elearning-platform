<!-- redirect to quiz-select.php if no quiz has been selected -->
<?php
    if( !isset($_POST['subject']) || !isset($_POST['level']) ) {
        header("Location: quiz-select.php");
        exit;
    }
?>
<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        
        <!-- NES CSS -->
        <link href="https://unpkg.com/nes.css/css/nes-core.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
        <link href="https://unpkg.com/nes.css/css/nes.css" rel="stylesheet" />
        
        <!-- Vue.js -->
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>

        <!-- Axios -->
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

        <!-- External Styling -->
        <link href="../styles.css" rel="stylesheet" />

        <!-- Internal Styling -->
        <style>
            html,body {
                height:100%;
                width:100%;
            }
            body{
                background-image: url(../resources/img/stars_no_cloud.png);
                padding-top: 56px;
                display: flex;
            }
            .main {
                margin: auto;
            }
            .container{
                padding: 1.5rem;
            }
            .quiz-container{
                padding: 0;
                margin: 1.5rem auto;
                max-width: 50rem;
                background-color: lightgray;
            }
            header{
                padding: 1.5rem;
                text-align: center;
                border-bottom: 3px solid rgba(0,0,0,0.1);
            }
            .nes-progress{
                max-height: 35px;
            }
            .question-title{
                margin: 0 auto;
                padding-top: 1.5rem;
                text-align: center;
            }
            .options-container{
                padding: 1.5rem;
                text-align: center;
            }
            .option{
                margin: 10px;
                width: 80%;
                text-align: left;
            }
            .quiz-footer{
                width: 100%;
                border-top: 3px solid rgba(0,0,0,0.1);
            }
            .page{
                margin: 15px 25px;
                display: flex;
                justify-content: space-between;
            }
            .result-container{
                text-align: center;
            }

            /* loading animation*/
            .loading-container {
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .loading {
                display: flex;
                flex-direction: row;
            }
            .loading__letter {
                font-weight: normal;
                font-size: 35px;
                letter-spacing: 4px;
                color: white;
                animation-name: bounce;
                animation-duration: 2s;
                animation-iteration-count: infinite;
            }
            .loading__letter:nth-child(2) {
                animation-delay: .1s;	
            }
            .loading__letter:nth-child(3) {
                animation-delay: .2s;
            }
            .loading__letter:nth-child(4) {
                animation-delay: .3s;	
            }
            .loading__letter:nth-child(5) {
                animation-delay: .4s;
            }
            .loading__letter:nth-child(6) {
                animation-delay: .5s;	
            }
            .loading__letter:nth-child(7) {
                animation-delay: .6s;
            }
            .loading__letter:nth-child(8) {
                animation-delay: .8s;
            }
            .loading__letter:nth-child(9) {
                animation-delay: 1s;
            }
            .loading__letter:nth-child(10) {
                animation-delay: 1.2s;
            } 
            @keyframes bounce {
                0% {
                    transform: translateY(0px)
                }
                40% {
                    transform: translateY(-40px);
                }
                80%,
                100% {
                    transform: translateY(0px);
                }
            }
            @media (max-width: 700px) {
                .loading__letter {
                    font-size: 25px;
                }
            }
            @media (max-width: 340px) {
                .loading__letter {
                    font-size: 20px;
                }
            }

        </style>
        
        <link rel="icon" href="../resources/img/icon.png">
        <title>Quiz!</title>
    </head>  
    <body>
        <!-- Navigation -->
        <?php include '../login/login_header.php'; ?>

        <!-- Quiz Display -->
        <div class="main" id="app">

            <!-- loading -->
            <div v-if="questions=='loading...'" class="loading-container">
                <div class="loading">
                    <div class="loading__letter">L</div>
                    <div class="loading__letter">o</div>
                    <div class="loading__letter">a</div>
                    <div class="loading__letter">d</div>
                    <div class="loading__letter">i</div>
                    <div class="loading__letter">n</div>
                    <div class="loading__letter">g</div>
                    <div class="loading__letter">.</div>
                    <div class="loading__letter">.</div>
                    <div class="loading__letter">.</div>
                </div>
            </div>

            <!-- quiz container -->
            <div v-else class="quiz-container container-fluid">

                <!-- old loading display, no longer in use -->
                <!-- <div v-if="questions=='loading...'" class="result-container nes-container is-rounded">
                    <h5 class="title">
                        Loading...
                    </h5>
                </div> -->

                <!-- error -->
                <div v-if="error" class="result-container nes-container is-rounded">
                    Sorry! There was an error. :(
                </div>
                
                <!-- if questions returned from API -->
                <question-component
                    v-else-if="questions.length!==0 && quizIndex>=0 && quizIndex<10"
                    :quizindex="quizIndex"
                    :currentquestion="questions[quizIndex]"
                    :prev="prev"
                    :next="next"
                    :check="check"
                    :useranswers="userAnswers"
                    :usershuffledanswers="userShuffledAnswers"
                    :reviewed="reviewed">
                </question-component>

                <!-- if no questions returned from API -->
                <form v-else-if="questions.length==0 && quizIndex<10" class="result-container nes-container is-rounded" action='quiz-select.php' method='POST'>

                    <h5 class="title">
                        Sorry! We are still working on questions for this quiz.
                    </h5>
                    <br>
                    <input type='submit' class="nes-btn" value="Select Another Quiz">
                
                </form>

                <!-- result -->
                <div v-else-if="quizIndex >= 10 || (quizIndex == -1 && reviewed)" :key="quizIndex" class="result-container nes-container is-rounded">
                    <!--resultTitleBlock-->
                    <h2 class="title">
                        {{ (numCorrect>7?'Great Job!':(numCorrect<4?'Try harder next time...':'Keep up the good work!')) }}
                    </h2>
                    <p class="subtitle">
                        Total score: {{ numCorrect }} / 10
                    </p>
                    <br>
                    <a class="nes-btn" @click="review()">review</a>
                    <a class="nes-btn" @click="restart()">restart</a>
                </div>

            </div>

        </div>

        <script>

            // generate url if quiz has been selected
            var subject = <?php echo $_POST['subject']; ?>;
            var level = <?php echo $_POST['level']; ?>;
            const category = [19,17]
            const difficulty = ['easy','medium','hard']
            url = 'https://opentdb.com/api.php?amount=10&category=' + category[subject] + '&difficulty=' + difficulty[level];
            console.log(url);

            // function to shuffle options
            function shuffleArray(array) {
                for (let i = array.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [array[i], array[j]] = [array[j], array[i]];
                }
                return array;
            }

            // vue question box component
            Vue.component('questionComponent', {
                props: ['quizindex', 'currentquestion','prev', 'next', 'check', 'useranswers', 'usershuffledanswers', 'reviewed'],
                data() {
                    return {
                        subject: subject,
                        level: level,
                        selectedIndex: null,
                        correctIndex: null,
                        shuffledAnswers: null,
                        answered: false,
                    }
                },
                filters: {
                    // add corresponding letter to quiz option
                    charIndex: function(i) {
                        return String.fromCharCode(97 + i);
                    }
                },
                watch: {
                    currentquestion: {
                        immediate: true,
                        handler() {
                            if (this.useranswers[this.quizindex]==null) {
                                this.selectedIndex = null;
                                this.shuffledAnswers = null;
                                this.answered = false;
                                this.shuffleAnswers();
                            } else {
                                this.answered = true;
                                this.selectedIndex = this.useranswers[this.quizindex];
                                this.shuffledAnswers = this.usershuffledanswers[this.quizindex];
                                this.shuffleAnswers();
                            }
                        }
                    }
                },
                methods: {
                    shuffleAnswers() {
                        if (this.shuffledAnswers == null){
                            let answers = [...this.currentquestion.incorrect_answers, this.currentquestion.correct_answer];
                            this.shuffledAnswers = shuffleArray(answers);
                        }
                        this.correctIndex = this.shuffledAnswers.indexOf(this.currentquestion.correct_answer);
                    },
                    selectAnswer(optionIndex) {
                        this.selectedIndex = optionIndex;
                    },
                    submitAnswer() {
                        let isCorrect = false;
                        if (this.selectedIndex === this.correctIndex) {
                            isCorrect = true;
                        }
                        this.answered = true;
                        this.check(isCorrect, this.selectedIndex, this.shuffledAnswers);
                    },
                    optionClass(optionIndex) {
                        let optionClass = ''
                        if (!this.answered && this.selectedIndex === optionIndex) {
                            optionClass = 'is-primary'
                        } else if (this.answered && this.correctIndex === optionIndex) {
                            optionClass = 'is-success'
                        } else if (this.answered && this.selectedIndex === optionIndex && this.correctIndex !== optionIndex) {
                            optionClass = 'is-error'
                        }
                        return optionClass
                    },
                    decoder(str) {
                        var textArea = document.createElement('textarea');
                        textArea.innerHTML = str;
                        return textArea.value;
                    }
                },
                template: `
                    <div class="question-container nes-container is-rounded">

                        <header>
                            <h2>{{ ['Easy','Medium','Hard'][level] }} {{ ['Math', 'Science'][subject] }} Quiz</h2>

                            <!-- progress -->
                            <div class="progress-container">
                                <progress class="nes-progress is-pattern" :value="(quizindex/10)*100" max="100">{{ (quizindex/10)*100 }}%</progress>
                                <p>{{ (quizindex/10)*100 }}% complete</p>
                            </div>
                        </header>

                        <!-- question title -->
                        <h5 class="question-title">{{ decoder(currentquestion.question) }}</h5>

                        <!-- quiz options -->
                        <div class="options-container">
                            <button v-for="(option, optionIndex) in shuffledAnswers"
                                type="button" 
                                class="option nes-btn" 
                                :class="optionClass(optionIndex)" 
                                @click="selectAnswer(optionIndex)" 
                                :disabled="answered"
                                :key="optionIndex">
                                {{ optionIndex | charIndex }}.{{ decoder(option) }}
                            </button>
                        </div>

                        <!-- quiz footer -->
                        <footer class="quiz-footer">
                            <nav class="page">

                                <!-- back button -->
                                <button 
                                    type="button" 
                                    :class="(quizindex < 1 && !reviewed)?'nes-btn is-disabled':'nes-btn'" 
                                    @click="prev" 
                                    :disabled="quizindex < 1 && !reviewed">
                                    Back
                                </button>

                                <!-- submit button -->
                                <button v-if="!answered" 
                                    type="button"
                                    :class="(selectedIndex === null)?'nes-btn is-disabled':'nes-btn'" 
                                    @click="submitAnswer()" 
                                    :disabled="selectedIndex === null">
                                    Check
                                </button>

                                <!-- next button -->
                                <button v-else
                                    type="button" 
                                    class="nes-btn" 
                                    @click="next">
                                    Next
                                </button>

                            </nav>
                        </footer>

                    </div>
                `
            });

            // vue instance
            const vm = new Vue({
                el: '#app', 
                data: {
                    subject: subject,
                    level: level,
                    questions: 'loading...',
                    quizIndex: 0,
                    numCorrect: 0,
                    userAnswers: Array(10).fill(null),
                    userShuffledAnswers: Array(10).fill(null),
                    reviewed: false,
                    error: false,
                },
                created: function() {
                    // call Open Trivia DB API
                    axios.get(url)
                    .then(response => {
                        this.questions = response.data.results;
                    })
                    .catch(error => {
                        this.questions = 'There was an error: ' + error.message;
                        this.error = true;
                    })
                },
                methods: {
                    prev() {
                        this.quizIndex--;
                    },
                    next() {
                        this.quizIndex++;
                        // add badge to user if total numCorrect > 7
                        if (this.quizIndex == 10 && this.numCorrect > 7 && !this.reviewed){
                            axios.post(
                            '../model/updateScore.php',
                            `subject=${this.subject}&level=${this.level}`,
                            {
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded'
                                }
                            })
                            .then(response => {
                                console.log('Updated!');
                            })
                            .catch(error => {
                                console.log("error");
                                this.error = true;
                            });

                        }
                    },
                    check(isCorrect, selectedIndex, shuffledAnswers) {
                        Vue.set(this.userAnswers, this.quizIndex, selectedIndex);
                        Vue.set(this.userShuffledAnswers, this.quizIndex, shuffledAnswers);
                        // console.log(userShuffledAnswers[quizIndex]);
                        if (isCorrect) {
                            this.numCorrect++;
                        }
                    },
                    restart() {
                        this.quizIndex=0;
                        this.numCorrect=0;
                        this.userAnswers=Array(10).fill(null);
                        this.userShuffledAnswers=Array(10).fill(null);
                        this.reviewed=false;
                    },
                    review() {
                        this.quizIndex=0;
                        this.reviewed=true;
                    }
                }
            });

        </script>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>