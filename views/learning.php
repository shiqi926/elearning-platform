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
        html,body {
            height:100%;
            width:100%;
        }
        body{
            background-image: url(../resources/img/sky.png);
            background-position: bottom;
            background-size: 100% auto;
            /* background-color: lightblue; */

            padding-top: 56px;
            display: flex;
        }
        .main {
            margin: auto;
            text-align: center
        }
        .card {
            width: 24rem;
        }
        @media screen and (max-width: 800px) {
            .card {
                width: 18rem;    
            }
        }
        @media screen and (max-width: 615px) {
            .card {
                width: 12rem;    
            }
            h5 {
                font-size: 0.8rem;
            }
        }
    </style>
    
    <link rel="icon" href="../resources/img/icon.png">
    <title>Finals Fantasy</title>
</head>

<body>
    <!-- Navigation -->
    <?php include '../login/login_header.php'; ?>

    <!-- Subjects -->
    <div class="main">
        <!-- MATH -->
        <a class="card nav-link nes-btn is-warning mb-3" href="learning_math.php">
            <img class="card-img-top mx-auto" src="../resources/img/learning_math.png">
            <div class="card-body">
                <h5 class="card-title" style="color: black;">Math</h5>
            </div>
        </a>
        <!-- END MATH -->

        <!-- SCIENCE -->
        <a class="card nav-link nes-btn is-success mb-3" href="learning_science.php">
            <img class="card-img-top mx-auto" src="../resources/img/learning_science.png">
            <div class="card-body">
                <h5 class="card-title" style="color: black;">Science</h5>
            </div>
        </a>                
        <!-- END SCIENCE -->

    </div>
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <!-- GSAP 3 ScrollTrigger -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/ScrollTrigger.min.js"></script>

    <script>
        gsap.from('.card', {
            scale: 0.5,
            opacity: 0,
            duration: 1,
        })
    </script>

</body>
</html>