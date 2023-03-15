
<?php
spl_autoload_register(function($class){
    require_once "../model/$class.php";
}); 
session_start();

$subject = $_POST['subject'];
$level = $_POST['level'];
$dao = new UserDAO();
$username = $_SESSION['user'];

if ($subject == "0"){
    $status = $dao->updateMathTest($username, $level);  
}else{
    $status = $dao->updateSciTest($username, $level);  
}

?>