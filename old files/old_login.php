<?php 
    # Start a session
    session_start();
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- Vue JS -->
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>

        <!-- NES CSS -->
        <link href="https://unpkg.com/nes.css/css/nes-core.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
        <link href="https://unpkg.com/nes.css/css/nes.css" rel="stylesheet" />
        
        <!-- External Styling -->
        <link href="../styles.css" rel="stylesheet" />

        <!-- Internal Styling -->
        <style>
            body {
                background-color: lightgreen;
            }
        </style>
        
        <link rel="icon" href="../resources/img/icon.png">
        <title>EDUhub</title>
    </head>  
    <body>
        
        <div class="container-fluid divClass" style="background-color: lightgreen;">
            <div class="container contentClass">

                <div class="mx-auto col-xl-10" style="background-color: lightgray; padding: 5%;" >
                    <?php
                   # Check if "success" key exists in the session
                    if(isset($_SESSION["success"])){
                        # Display the success message
                        echo "<p style='color: green; text-align: center; font-size: large'>" .
                                $_SESSION["success"] .
                            "</p>";
                        # Remove the key "success" from the session
                        unset($_SESSION["success"]);
                    }

                    # Check if "error" key exists in the session
                    if(isset($_SESSION["error"])){
                        # Display the error message
                        echo "<p style='color: red'>" .
                                $_SESSION["error"] .
                            "</p>";
                        # Remove the key "error" from the session
                        unset($_SESSION["error"]);
                    }
                    $username = "";
                    # Get the value of "username" if it exists in $_GET
                    if(isset($_GET["username"])){
                        $username = $_GET["username"];
                    }  
                    ?>
                    <form action="login_process.php" method="post"> 
                        <h2 class="text-center">LOGIN</h2>   
                        <div class="form-group has-error">
                            <input type="text" class="form-control" name="username" placeholder="Username" required="required" value="<?php echo $username;?>">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required="required" >
                        </div>        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                        </div>
                        <!-- EITHER REMOVE OR CREATE LOST YOUR PASSWORD PAGE -->
                        <p><a href="#">Lost your Password?</a></p>
                    </form>
                    <!-- SIGN UP PAGE -->
                    <p class="text-center small">Don't have an account? <a href="./signup.php">Sign up here!</a></p>
                </div>
            </div>
        </div>
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>

