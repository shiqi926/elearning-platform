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
        
        <!-- NES CSS -->
        <link href="https://unpkg.com/nes.css/css/nes-core.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
        <link href="https://unpkg.com/nes.css/css/nes.css" rel="stylesheet" />
        
        <!-- Vue.js -->
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

        <!-- External Styling -->
        <link href="./login.css" rel="stylesheet"/>

        <!-- Internal Styling -->
        <style>
        html,body {
            height:100%;
            width:100%;
        }
        body{
            background-image: url(../resources/img/game_bg.png);
            /* background-color: lightblue; */
            display: flex;
        }
        .main {
            margin: auto;
        }

        @media screen and (max-width: 767px) {
            .container{
                overflow: scroll;
            }
            .form-container {
                position: absolute;
                top: 0;
                height: auto;
                transition: all 0.6s ease-in-out;
            }
            .sign-in-container {
                margin-top: 4rem;
                /* margin-bottom: 4rem; */
                left: 0;
                width: 100%;
                z-index: 3;
            }
            .right-panel-active .sign-up-container {
                margin-top: 4rem;
                margin-bottom: 4rem;
                left: 0;
                width: 100%;
                z-index: 10;
                opacity: 1;
            }
            .sign-up-container {
                margin-top: 4rem;
                margin-bottom: 4rem;
                left: 0;
                width: 100%;
                z-index: 1;
            }
            
            .smShow {
                display: block;
            }
        }

        </style>

        <link rel="icon" href="../resources/img/icon.png">
        <title>Finals Fantasy</title>
    </head>  
    <body>
    
        <div class="container-fluid main" id="app">

            <!-- MEDIUM SCREEN -->

            <div class="row" id="medScreen">
                <div class="col-lg-2 col-md-1"></div>
                <div class="col-lg-8 col-md-10">
                    <!-- ADAPTED FROM: https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/ -->
                    <div class="container nes-container is-rounded shadow-lg mx-auto right-panel-active" id="container">
                        <div class="form-container sign-up-container">
                        <form action="./signup_process.php" method="post" @submit="formError()">
                                <h1 class="mb-3">Sign Up</h1>

                                <?php
                                    if(isset($_SESSION["errorSU"])){
                                        # Display the error message
                                        echo "<p style='color: red; margin: 0;'>" .
                                                $_SESSION["errorSU"] .
                                            "</p>";
                                        # Remove the key "error" from the session
                                        unset($_SESSION["errorSU"]);
                                    }
                                ?>

                                <input type="text" class="form-control nes-input mt-3 mb-3" name="username" placeholder="Username" required="required"/>
                                <input type="password" class="form-control nes-input mb-3" name="password" placeholder="Password" required="required" v-model="password"/>
                                <ul v-if="errorCheck" style = "list-style:none; margin-left: -35px; font-size: 0.7em">
                                    <li class="text-danger">{{ lenError }}</li>
                                    <li class="text-danger">{{ upperError }}</li>
                                    <li class="text-danger">{{ lowerError }}</li>
                                </ul>
                                <input type="password" class="form-control nes-input mb-3" name="confirm_password" placeholder="Confirm Password" required="required"/>
                                <input type="number" class="form -control nes-input mb-3"name="age" placeholder="Age" required="required" />
                                <label>
                                    <input type="checkbox" class="nes-checkbox" required="required"/>
                                    <span style="font-size: 0.8em"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></span>
                                </label>
                                <br>
                                <button type="submit" class="nes-btn is-success">Sign Up</button>
                                <span class="smShow">
                                    <div class="mb-3">
                                        Already have an account?
                                    </div> 
                                    <button type="button" class="nes-btn is-warning" @click="showSignInSM">Sign In</button>
                                </span>
                                
                            </form>
                        </div>
                        <div class="form-container sign-in-container">
                        <form action="./login_process.php" method="post">
                                <h1 class="mb-3">Sign In</h1>
                                
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
                                        echo "<p style='color: red; margin: 0;'>" .
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

                                <input type="text" class="form-control nes-input mt-3 mb-3" name="username" placeholder="Username" required="required" value="<?php echo $username;?>">
                                <input type="password" class="form-control nes-input" name="password" placeholder="Password" required="required"/>
                                <br>
                                <a href="#">Forgot your password?</a>
                                <br>
                                <button type="submit" class="nes-btn is-success">Sign In</button>
                                <div class="smShow">
                                    <div class="mb-3">
                                        No account? <br> Just sign up now!
                                    </div> 
                                    <button type="button" class="nes-btn is-warning" @click="showSignUpSM">Sign Up</button> 
                                </div>
                            </form>
                        </div>
                        <div class="overlay-container">
                            <div class="overlay">
                                <div class="overlay-panel overlay-left">
                                    <h1>Welcome Back!</h1>
                                    <br>
                                    <p>Please sign in with your personal info</p>
                                    <br>
                                    <button class="nes-btn is-warning" id="signIn" @click="showSignIn">Sign In</button>
                                </div>
                                <div class="overlay-panel overlay-right">
                                    <h1>Hello, Friend!</h1>
                                    <br>
                                    <p>Enter your personal details to start your journey</p>
                                    <br>
                                    <button type="button" class="nes-btn is-warning" id="signUp" @click="showSignUp">Sign Up</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-1"></div>
            </div>
        </div>             

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


        <script>
            var vm = new Vue ({
                el: '#app',
                data: {
                    password: "",
                    errorCheck: false,
                },
                methods: {
                    showSignUp: function() {
                        $('.sign-up-container').css('opacity',1);
                        container.classList.add('right-panel-active');
                    },
                    showSignIn: function() {
                        $('.sign-up-container').css('opacity',0);
                        container.classList.remove('right-panel-active');
                    },
                    showSignUpSM: function() {
                        $('.sign-up-container').css('z-index',10);
                        $('.sign-up-container').css('opacity',1);
                        container.classList.add('right-panel-active');
                    },
                    showSignInSM: function() {
                        $('.sign-up-container').css('z-index',1);
                        $('.sign-up-container').css('opacity',0);
                        container.classList.remove('right-panel-active');
                    },
                    formError: function(){
                        if (this.lenError || this.upperError || this.lowerError) {
                            event.preventDefault();
                            this.errorCheck = true;
                        }
                    }
                },
                computed: {
                    lenError: function(){
                        if (this.password.length < 8){
                            return "Password must be minimum 8 characters!";
                        }else{
                            return "";
                        }
                    },
                    upperError: function(){
                        const regex = RegExp("^(?=.*[A-Z])");
                        if (! regex.test(this.password)){
                            return "Password must contain at least 1 uppercase";
                        }else{
                            return "";
                        }
                    },
                    lowerError: function(){
                        const regex = RegExp("^(?=.*[a-z])");
                        if (! regex.test(this.password)){
                            return "Password must contain at least 1 lowercase";
                        }else{
                            return "";
                        }
                    },
                },
            })

        </script>
    </body>
</html>