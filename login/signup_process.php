<?php
    # Autoload and start session
    spl_autoload_register(
        function($class){
            require_once "../model/$class.php";
        }
    );
    session_start();

    # Get parameters passed from login.php
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmpw = $_POST["confirm_password"];
    $age = $_POST["age"];

    # Get user information
    $dao = new UserDAO();
    $user = $dao->getUser($username);

    # Check if username exists 
    $success = false;
    if($user != null){
        $error = "Username is taken!";
        $_SESSION["errorSU"] = $error;

        # Redirect to signup.php
        header("location: signup.php");
    }else{
        if ($password != $confirmpw){
            $error = "Passwords are not the same!";
            $_SESSION["errorSU"] = $error;
            header("location: signup.php");
            exit;
        }else{
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $status =  $dao->add($username, $hashed, $age);
            if($status){
                $_SESSION["success"] = "Registration Successful";
                header("location: login.php?username=$username");
                exit;        
            }else{
                echo $status;
                $error = "Failed to register";
                $_SESSION["errorSU"] = $error;
                header("location: signup.php");
                exit;
    
            }    
        }
        # Redirect to login.php
        # Provide information of the newly registered user 
        # at the back of the URL
        }
    
        
?>
