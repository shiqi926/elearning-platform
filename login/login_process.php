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

    # Get user information
    $dao = new UserDAO();
    $user = $dao->getUser($username);

    # Check if user exists 
    $success = false;
    if($user != null){
        # Get stored hashed password
        $hashed = $user->getHashedPassword();
        # Check if entered password matches stored hashed password
        $success = password_verify($password,$hashed); 
        if($success){
            # Create a session entry for successful login
            $_SESSION["user"] = $username;
            $_SESSION['try'] = "try";
            # Redirect to dashboard.php
            header("Location: ../views/dashboard.php");
            exit;
        }
    }

    # Failed login
    if (!$success){        
        # Add "error" => "Failed Login" key-value pair to the session
        $_SESSION['error'] = "Failed Login";
        # Redirect to login.php 
        ## PASS USERNAME?
        header("Location: login.php");
    }
?>
