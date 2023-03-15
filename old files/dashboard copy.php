<?php
session_start() ;
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
            0% {
                transform: scale(0);
            }
            30% {
                transform: scale(1.1);
            }
            60% {
                transform: scale(0.9);
            }
        }
        @keyframes turn {
            0% {
                transform: rotate(0) scale(0);
                opacity: 0;
            }

            60% {
                transform: rotate(375deg) scale(1.1);
            }

            80% {
                transform: rotate(355deg) scale(0.9);
            }

            100% {
                transform: rotate(360deg) scale(1);
            }
        }

        @keyframes pulse {
            50% {
                transform: scale(1.4);
            }
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
            width: 400px;
            height: 40px;
            border: 2px solid #999;
            padding: 4px;
            border-radius: 50px;
            background-color: brown;
        }

        .progress {
            width: 50%;
            height: 100%;
            box-sizing: border-box;
            border-radius: 50px;
            /* animation-name: loading; */
            animation: loading 5s;
        }

        @keyframes loading {
            0% {
                width: 20%;
            }

            50% {
                width: 50%;
            }

            100% {
                width: 100%;
            }
        }

        body {
            font-family: 'Roboto';
            text-align: center;
            margin: 0;
            height: 100vh;
            width: 100%;
            background: #f0f2fa;
            font-family: 'MinecrafterAltRegular';
            font-weight: normal;
            font-style: normal;
            font-size: 30px;

            display: grid;
            place-items: center;
        }
    </style>

    <title>EDUhub</title>
</head>

<body>
    <!-- Navigation -->
    <?php include '../login/login_header.php'; ?>

    <!-- Home -->
    <div class="container-fluid mx-auto divClass bg-info" style='margin-top:50px' id="about">
        <div class="container d-flex" style="padding-top: 25px;">
            <div class="nes-balloon from-left">
                <h2>Welcome back, <?= $_SESSION['user']?></h2>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-7">
                    <!-- main badges -->
                    <div class="container text-center" style='margin-bottom:20px; color:white;'>
                        You have achieved 6 badges so far!
                        <!-- badges -->
                        <table>
                            <tr>
                                <td>
                                    <svg class="badge" xmlns="http://www.w3.org/2000/svg" viewBox="-40 -40 440 440">
                                        <circle class="outer" fill="#F9D535" stroke="#fff" stroke-width="8"
                                            stroke-linecap="round" cx="180" cy="180" r="157" />
                                        <circle class="inner" fill="#DFB828" stroke="#fff" stroke-width="8" cx="180"
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
                                </td>
                                <td>
                                    <svg class="badge" xmlns="http://www.w3.org/2000/svg" viewBox="-40 -40 440 440">
                                        <circle class="outer" fill="#F9D535" stroke="#fff" stroke-width="8"
                                            stroke-linecap="round" cx="180" cy="180" r="157" />
                                        <circle class="inner" fill="#DFB828" stroke="#fff" stroke-width="8" cx="180"
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
                                </td>
                            </tr>
                            <tr>
                                <td>Binomial Completed!</td>
                                <td>Differentiation Completed!</td>
                            </tr>
                            <tr>
                                <td>
                                    <svg class="badge" xmlns="http://www.w3.org/2000/svg" viewBox="-40 -40 440 440">
                                        <circle class="outer" fill="#F9D535" stroke="#fff" stroke-width="8"
                                            stroke-linecap="round" cx="180" cy="180" r="157" />
                                        <circle class="inner" fill="#DFB828" stroke="#fff" stroke-width="8" cx="180"
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
                                </td>
                                <td>
                                    <svg class="badge" xmlns="http://www.w3.org/2000/svg" viewBox="-40 -40 440 440">
                                        <circle class="outer" fill="#F9D535" stroke="#fff" stroke-width="8"
                                            stroke-linecap="round" cx="180" cy="180" r="157" />
                                        <circle class="inner" fill="#DFB828" stroke="#fff" stroke-width="8" cx="180"
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
                                </td>
                            </tr>
                            <tr>
                                <td>Functions Completed!</td>
                                <td>Photosynthesis Completed!</td>
                            </tr>
                            <tr>
                                <td>
                                    <svg class="badge" xmlns="http://www.w3.org/2000/svg" viewBox="-40 -40 440 440">
                                        <circle class="outer" fill="#F9D535" stroke="#fff" stroke-width="8"
                                            stroke-linecap="round" cx="180" cy="180" r="157" />
                                        <circle class="inner" fill="#DFB828" stroke="#fff" stroke-width="8" cx="180"
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
                                </td>
                                <td>
                                    <svg class="badge" xmlns="http://www.w3.org/2000/svg" viewBox="-40 -40 440 440">
                                        <circle class="outer" fill="#F9D535" stroke="#fff" stroke-width="8"
                                            stroke-linecap="round" cx="180" cy="180" r="157" />
                                        <circle class="inner" fill="#DFB828" stroke="#fff" stroke-width="8" cx="180"
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
                                </td>
                            </tr>
                            <tr>
                                <td>Integration Completed!</td>
                                <td>Magnetic Forces Completed!</td>
                            </tr>


                        </table>
                    </div>
                </div>
                <div class="col-5">
                    <!-- Leader Boards -->
                    <div class="container">
                        <div class="text-center" style="color:white;">
                            <p>TOP 3 RANKS THIS MONTH!</p>
                        </div>
                        <table class="styled-table" style="background-color:beige; width:100%;">
                            <thead>
                                <tr style="background-color:brown;">
                                    <th>Rank</th>
                                    <th>Name</th>
                                    <th>Points</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Shi Qi</td>
                                    <td>6000</td>
                                </tr>
                                <tr class="active-row">
                                    <td>2</td>
                                    <td>Melissa</td>
                                    <td>5680</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>John</td>
                                    <td>5250</td>
                                </tr>
                                <!-- and so on... -->
                            </tbody>
                        </table>
                        <div class="page" style="margin-top:20px">
                            <span>MATH PROGRESS</span>
                            <div class="progress-bar" style="margin-bottom:20px; background-color:brown;">
                                <div class="progress" style="margin-left:10px;"></div>
                            </div>
                            <span>SCIENCE PROGRESS</span>
                            <div class="progress-bar" style="background-color:brown;">
                                <div class="progress" style="width:70%; margin-left:10px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Optional JavaScript -->
    <script>

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