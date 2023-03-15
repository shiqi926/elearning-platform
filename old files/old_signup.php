<?php
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
             .warning{
                color: red;
            }
        </style>

        <link rel="icon" href="../resources/img/icon.png">
        <title>EDUhub</title>
    </head>  
    <body>
        <!-- LOGIN -->
        <div class="container-fluid divClass" style="background-color: lightgreen;">
            <div class="container contentClass">
                <!-- SETTLE CONFIRMATION PAGE -->
                <div class="mx-auto col-xl-10" style="background-color: lightgray; padding: 5%;" id="signup">

                    <!-- If username is taken -->
                    <?php
                        if(isset($_SESSION["error"])){
                            # Display the error message
                            echo "<p style='color: red'>" .
                                    $_SESSION["error"] .
                                "</p>";
                            # Remove the key "error" from the session
                            unset($_SESSION["error"]);
                        }
                    ?>
                        <h2>Sign Up</h2>
                        <p>Please fill in this form to create an account!</p>
                        <form action="./signup_process.php" method="post" @submit="formError()">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="Username" required="required">
    	
                        </div>
                        <div class="form-group" id="signup">
                            <input type="password" class="form-control" name="password" placeholder="Password" required="required" v-model="password">
                        </div>
                        <ul v-if="errorCheck" style = "list-style:none; margin-left: -35px">
                            <li class="text-danger">{{ lenError }}</li>
                            <li class="text-danger">{{ upperError }}</li>
                            <li class="text-danger">{{ lowerError }}</li>
                        </ul>
                        <div class="form-group">
                            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
                        </div>        
                        <div class="form-group">
                            <input type="number" class="form-control" name="age" placeholder="Age" required="required">
                        </div>
                        <div class="form-group">
                            <label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Sign Up</button>
                        </div>
                    </form>
                    <p class="text-center small" >Already have an account? <a href="./login.php">Login here</a></p>
                </div>
            </div>
        </div>
        
        <script>
            const vm = new Vue({
                el: "#signup",
                data: {
                    password: "",
                    errorCheck: false,
                },
                methods:{
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
                }
            })
        </script>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>