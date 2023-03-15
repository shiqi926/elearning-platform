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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- NES CSS -->
    <link href="https://unpkg.com/nes.css/css/nes-core.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
    <link href="https://unpkg.com/nes.css/css/nes.css" rel="stylesheet" />

    <!-- VUE -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- External Styling -->
    <link href="../styles.css" rel="stylesheet" />

    <!-- Internal Styling -->
    <style>
        /* Table styling */
        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }


        /* start of badge */
        .badge {
            width: 150px
        }

        @keyframes grow {
            0% {transform: scale(0);}
            30% {transform: scale(1.1);}
            60% {transform: scale(0.9);}
        }

        @keyframes turn {
            0% {transform: rotate(0) scale(0);
                opacity: 0;
            }
            60% {transform: rotate(375deg) scale(1.1);}
            80% {transform: rotate(355deg) scale(0.9);}
            100% {transform: rotate(360deg) scale(1);}
        }

        @keyframes pulse {
            50% {transform: scale(1.4);}
        }

        /* --------------------------
            SVG Styles
            --------------------------- */
        .badge * {
            transform-origin: 50% 50%;
        }

        .outer,
        .inner,
        .inline {
            animation: grow 1s ease-out backwards;
        }

        .inner {
            animation-delay: .1s;
        }

        .inline {
            animation-delay: .15s;
        }


        .star {
            animation: turn 1.1s 0.2s ease-out backwards;
        }

        .star circle {
            animation: pulse .7s 1.5s;
            animation-iteration-count: infinite;
        }

        .star circle:nth-of-type(2) {
            animation-delay: 1.6s;
        }

        .star circle:nth-of-type(3) {
            animation-delay: 1.7s;
        }

        .star circle:nth-of-type(4) {
            animation-delay: 1.8s;
        }

        .star circle:nth-of-type(5) {
            animation-delay: 1.9s;
        }

        /* end of badge */

        /* start of progress bar */
        .progress-bar {
            width: 80%;
            height: 40px;
            border: 2px solid #999;
            padding: 4px;
            border-radius: 50px;
            background-color: salmon;
        }

        .progress.math {
            width: 30%;
            height: 80%;
            box-sizing: border-box;
            border-radius: 50px;
            animation-name: loadmath;
            animation: loadmath 5s;
            background-color:  lightgoldenrodyellow;
        }

        @keyframes loadmath {
            0% {width: 0%;}
            100% {width: 30%;}

        }

        .progress.science {
            width: 70%;
            height: 80%;
            box-sizing: border-box;
            border-radius: 50px;
            animation-name: loadscience;
            animation: loadscience 5s;
            background-color:  lightgoldenrodyellow;
        }

        @keyframes loadscience {
            0% {width: 0%;}
            100% {width: 70%;}
        }

        body {
            background-image: url(../resources/img/game_bg.png);
            background-size: auto 100%;
            background-repeat: repeat-x;
            background-color: #8BB378;
        }

    </style>

    <link rel="icon" href="../resources/img/icon.png">
    <title>Finals Fantasy</title>
</head>

<body>
    <!-- Navigation -->
    <?php include '../login/login_header.php'; ?>

    <!-- Home -->
    <div class="container-fluid mx-auto divClass" style='margin-top:56px' id="about">
        <div class="container d-flex justify-content-center">
            <div class="nes-balloon from-left">
                <h2>Welcome back, <?= $_SESSION['user']?></h2>
            </div>
        </div>

        <div class="container-fluid mt-5">
            <div class="row">

                <div class="col-md-8" id="badges">
                    <!-- main badges -->
                    <div class="container text-center" style='margin-bottom:20px;'>
                        <span :class="{'d-none': mathcount == 0 }">
                            Number of Math badges: {{ mathcount }}
                        </span>
                        <!-- Math badges -->
                        <div class="row justify-content-center">
                            <div v-for="m in mathcount">
                                <badges :badgecolor="mathcolor"></badges>
                            </div>
                        </div>
                        <span :class="{'d-none': sciencecount == 0}">
                            Number of Science badges: {{ sciencecount }}
                        </span> <!-- Math badges -->
                        <div class="row justify-content-center">

                            <div v-for="s in sciencecount">
                                <badges :badgecolor="sciencecolor"></badges>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- Leader Boards -->
                    <div class="container" id="leaderboard">
                        <div class="row justify-content-center">
                            <div class="text-center" style="color:black;">
                                <p>TOP 5 RANKS THIS MONTH!</p>
                            </div>
                            <table class="styled-table" style="background-color: lightgoldenrodyellow; width: 80%">
                                <thead>
                                    <tr style="background-color:#000000; text-align:center; color: white">
                                        <th>Rank</th>
                                        <th>Name</th>
                                        <th>Badges</th>
                                    </tr>
                                </thead>
                                <tbody v-for="(user, index) in allUsers">
                                    <tr style="text-align:center">
                                        <td>{{index+1}}</td>
                                        <td>{{user[0]}}</td>
                                        <td>{{user[1]}}</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>

                        <div class="row justify-content-center" style="margin-top:20px">
                            <span class="mb-3">MATH PROGRESS</span>
                            <div class="progress-bar" style="margin-bottom:20px; background-color:salmon;">
                                <div class="progress math" style="width: 30%; margin-left:10px;"></div>
                            </div>
                            <span class="mb-3">SCIENCE PROGRESS</span>
                            <progress class="nes-progress is-error mb-3" value="30" max="100"></progress>

                            <div class="progress-bar" style="background-color:salmon;">
                                <div class="progress science" style="width:70%; margin-left:10px;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="nes-container with-title is-centered" id="leaderboard" style="background-color: lightgray">
                        <p class="title" style="background-color: lightgray">TOP 5 PLAYERS THIS MONTH!</p>
                        
                        <div class="nes-table-responsive">
                            <table class="nes-table is-bordered mx-auto" style="width: 90%">
                                <thead style="background-color: darkgray">
                                    <tr>
                                        <th>Rank</th>
                                        <th>Name</th>
                                        <th>Badges</th>
                                    </tr>
                                </thead>
                                <tbody v-for="(user, index) in allUsers">
                                    <tr>
                                        <td>{{index+1}}</td>
                                        <td>{{user[0]}}</td>
                                        <td>{{user[1]}}</td>
                                    </tr>                                    
                                </tbody>
                            </table>
                        </div>

                        <p class="mt-3 mb-3">MATH PROGRESS</p>
                        <progress class="nes-progress is-warning mb-3" value="30" max="100"></progress>
                        <p class="mb-3">SCIENCE PROGRESS</p>
                        <progress class="nes-progress is-error mb-3" value="70" max="100"></progress>

                    </div>

                </div>
            </div>

        </div>
    </div>


    <!-- Optional JavaScript -->
    <script>
        // alert(window.devicePixelRatio);

        Vue.component('badges', {
            props: ['badgecolor', 'levelinner'],
            template: `<div class="col-12"> 
            <svg class="badge" xmlns="http://www.w3.org/2000/svg" viewBox="-40 -40 440 440">
                <circle class="outer" :fill="badgecolor" stroke="#fff" stroke-width="8"
                    stroke-linecap="round" cx="180" cy="180" r="157" />
                <circle class="inner" fill="#ebdb05" stroke="#fff" stroke-width="8" cx="180"
                    cy="180" r="108.3" />
                <path class="inline"
                    d="M89.4 276.7c-26-24.2-42.2-58.8-42.2-97.1 0-22.6 5.6-43.8 15.5-62.4m234.7.1c9.9 18.6 15.4 39.7 15.4 62.2 0 38.3-16.2 72.8-42.1 97"
                    stroke="#CAA61F" stroke-width="7" stroke-linecap="round" fill="none" />
                <g class="star">
                    <path fill="#F9D535" stroke="#fff" stroke-width="4" stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M180 107.8l16.9 52.1h54.8l-44.3 32.2 16.9 52.1-44.3-32.2-44.3 32.2 16.9-52.1-44.3-32.2h54.8z" />
                    <circle fill="#DFB828" stroke="#fff" stroke-width="4" stroke-linecap="round"
                        stroke-linejoin="round" cx="180" cy="107.8" r="4.4" />
                    <circle fill="#DFB828" stroke="#fff" stroke-width="4" stroke-linecap="round"
                        stroke-linejoin="round" cx="223.7" cy="244.2" r="4.4" />
                    <circle fill="#DFB828" stroke="#fff" stroke-width="4" stroke-linecap="round"
                        stroke-linejoin="round" cx="135.5" cy="244.2" r="4.4" />
                    <circle fill="#DFB828" stroke="#fff" stroke-width="4" stroke-linecap="round"
                        stroke-linejoin="round" cx="108.3" cy="160.4" r="4.4" />
                    <circle fill="#DFB828" stroke="#fff" stroke-width="4" stroke-linecap="round"
                        stroke-linejoin="round" cx="251.7" cy="160.4" r="4.4" />
                </g>
            </svg>
            </div>`
        });
        var badges = new Vue({
            el: "#badges",
            data: {
                mathcolor: "#fcba03",
                mathcount: 0,
                sciencecolor: "#60c460",
                sciencecount: 0,
            },
            mounted: function () {
                axios.get('getScores.php')
                    .then(response => {
                        console.log(response.data);
                        this.mathcount = response.data.math;
                        this.sciencecount = response.data.science;
                    })
                    .catch(error => console.log('Could not retrieve posts...'));
            },
            methods: {
                showMath: function () {
                    if (this.mathcount == 0) {
                        return true;
                    } else {
                        return false;
                    }
                },
                showScience: function () {
                    if (this.sciencecount == 0) {
                        return true;
                    } else {
                        return false;
                    }
                }
            },
            computed: {
                badgeCount: function () {
                    return this.math + this.science;
                }
            }
        });
        var leaderboard = new Vue({
            el: "#leaderboard",
            data: {
                allUsers: []
            },
            mounted: function () {
                axios.get('getScores.php')
                    .then(response => {
                        const allUsers = response.data.all;
                        console.log(allUsers);
                        allUsers.sort(function (a, b) {
                            if (a[1] === b[1]) {
                                return 0;
                            }
                            else {
                                return (a[1] < b[1]) ? 1 : -1;
                            }
                        });
                        this.allUsers = allUsers.slice(0,5);
                    })
                    .catch(error => console.log('Could not retrieve posts...'));
            }
        });
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

</html>