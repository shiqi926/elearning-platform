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
            .quiz-type{
                margin: 1.5rem auto;
                max-width: 50rem;
                text-align: center;
                background-color: lightgray;
            }
        </style>

        <link rel="icon" href="../resources/img/icon.png">
        <title>Select A Quiz</title>
    </head>  
    <body>
        <!-- Navigation -->
        <?php include '../login/login_header.php'; ?>
        
        <!-- Quiz Selection -->
        <!-- <div class="container-fluid my-auto"> -->
        <div class="main">

            <form id="form" class="quiz-type nes-container" action='quiz-display.php' method='POST'>
                <h5>What quiz today?</h5>

                <div class="row">

                    <div class="col nes-select">
                        <label for="subject">Subject</label>
                        <select required id="subject" name="subject">
                            <option value="" disabled selected hidden>Select a Subject</option>
                            <option value="0">Math</option>
                            <option value="1">Science</option>
                        </select>
                    </div>

                    <div class="col nes-select">
                        <label for="level">Level</label>
                        <select required id="level" name="level">
                            <option value="" disabled selected hidden>Select a Level</option>
                            <option value="0">Easy</option>
                            <option value="1">Medium</option>
                            <option value="2">Hard</option>
                        </select>
                    </div>

                </div>
                <br>
                <input type='submit' class="nes-btn" value="Let's Go!">
            </form>

        </div>

        <script>
            // no longer in use, replaced by php form
            // function getUrl() {
            //     const selectedOptions = document.forms['form'];
            //     const subject = selectedOptions[0].value;
            //     const level = selectedOptions[0].value;

            //     const category = [19,17]
            //     const difficulty = ['easy','medium','hard']
            //     var url = 'https://opentdb.com/api.php?amount=10&category=' + category[subject] + '&difficulty=' + difficulty[level] + '&type=multiple';
            //     console.log(url);
            //     window.location.href = "vue-quiz-api.html"
            //     return url
            // }

            const querystr = window.location.search;
            const subject = querystr.split("=")[1];
            if (subject == "math"){
                document.getElementById("subject").value = "0";
            }else if (subject == "science"){
                document.getElementById("subject").value = "1";
            }
        </script>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>