<?php
    spl_autoload_register(function($class){
        require_once "../model/$class.php";
    });
    session_start();

    $dao = new UserDAO();
   
    if (isset($_SESSION['user'])){
        $username = $_SESSION['user'];
    }

    $tests = $dao->getTestResults($username);
    $result = array("math" => array(), "science" => array(), "all"=>array());
    $math = array("easy"=>intval($tests[0]), "med"=>intval($tests[1]), "hard"=>intval($tests[2]));
    $science = array("easy"=>intval($tests[3]), "med"=>intval($tests[4]), "hard"=>intval($tests[5]));
    $result["math"] = $math;
    $result["science"] = $science;
    $all = $dao->getAll();
    $arr = [];
    foreach($all as $user){
        $total = $user[1]+$user[2]+$user[3]+$user[4]+$user[5]+$user[6];
        $arr[] = [$user[0], $total];
    }
    $result["all"] = $arr;
    

    header('Content-Type: application/json');
    echo json_encode($result);
 
?>