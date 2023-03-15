<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <!-- <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

        <!-- Bootstrap CSS -->
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
        
        <!-- NES CSS -->
        <!-- <link href="https://unpkg.com/nes.css/css/nes-core.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
        <link href="https://unpkg.com/nes.css/css/nes.css" rel="stylesheet" /> -->
        
        <!-- External Styling -->
        <!-- <link href="../styles.css" rel="stylesheet" /> -->

        <!-- Internal Styling -->
        <style>
            
        </style>
        
        <link rel="icon" href="../resources/img/icon.png">
        <title>Finals Fantasy</title>
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="../views/dashboard.php">Finals Fantasy</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active px-2">
                        <a class="nav-link" href="../views/dashboard.php"><?php echo $_SESSION['user'] ?><span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" style="color: violet" href="../views/learning.php">Learn</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" style="color: lightblue" href="../game/game.php">Game</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="../index.html" onclick="endsession()">LOGOUT</a>
                    </li>
                </ul>
            </div>
        </nav>
        

        <!-- Optional JavaScript -->
        <script>
            function endsession(){
                session_destroy;
            }
        </script>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> -->
    </body>
</html>

<?php
    // unset($_SESSION['user'])
?>