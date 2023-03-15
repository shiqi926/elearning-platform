<?php
    class UserDAO{

        # Add a new user to the database
        public function add($username, $hashedPassword, $age){
            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection();
            $badge = 0;
            $sql = "insert into user (username, hashed_password, age, math_test_easy, math_test_med, math_test_hard, sci_test_easy, sci_test_med, sci_test_hard) 
                    values (:username, :hashed_password, :age, :math_test_easy, :math_test_med, :math_test_hard, :sci_test_easy, :sci_test_med, :sci_test_hard)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":username",$username, PDO::PARAM_STR);
            $stmt->bindParam(":hashed_password",$hashedPassword, PDO::PARAM_STR);
            $stmt->bindParam(":age", $age, PDO::PARAM_INT);
            $stmt->bindParam(":math_test_easy", $badge, PDO::PARAM_INT);
            $stmt->bindParam(":math_test_med", $badge, PDO::PARAM_INT);
            $stmt->bindParam(":math_test_hard", $badge, PDO::PARAM_INT);
            $stmt->bindParam(":sci_test_easy", $badge, PDO::PARAM_INT);
            $stmt->bindParam(":sci_test_med", $badge, PDO::PARAM_INT);
            $stmt->bindParam(":sci_test_hard", $badge, PDO::PARAM_INT);
            $status = $stmt->execute();
            $stmt = null;
            $pdo = null;
            
            return $status;
        }

        # Retrieve a user with a given username
        # Return null if no such user exists
        public function getUser($username){
            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection();
            
            $sql = "select * from user where username=:username";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":username",$username,PDO::PARAM_STR);
            $stmt->execute();
            
            $user = null;
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            if($row = $stmt->fetch()){
                $user = new User($row["username"],$row["hashed_password"],
                                $row["age"],$row["math_test_easy"],$row["math_test_med"],$row["math_test_hard"],
                               $row["sci_test_easy"], $row["sci_test_med"], $row["sci_test_hard"]);
            }
            
            $stmt = null;
            $pdo = null;

            return $user;
        }

        # Retrieve all users
        public function getAll(){
            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection();
            
            $sql = "select * from user";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();            
            $arr = [];
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while($row = $stmt->fetch()){
                $arr[] = [$row["username"], $row["math_test_easy"],$row["math_test_med"],$row["math_test_hard"],
               $row["sci_test_easy"], $row["sci_test_med"], $row["sci_test_hard"]];
            }
            
            $stmt = null;
            $pdo = null;

            return $arr;
        }

        # Return null if no such user exists
        public function getTestResults($username){
            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection();
            
            $sql = "select math_test_easy, math_test_med, math_test_hard, sci_test_easy, sci_test_med, sci_test_hard
            from user where username=:username";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":username",$username,PDO::PARAM_STR);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);     

            
            if($row = $stmt->fetch()){
                $result = [$row["math_test_easy"],$row["math_test_med"],$row["math_test_hard"],
                $row["sci_test_easy"], $row["sci_test_med"], $row["sci_test_hard"]];
            }
            $stmt = null;
            $pdo = null;

            return $result;
        }

        public function updateMathTest($username, $level){
            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection();
            if ($level == "0"){
                $sql = "UPDATE user set math_test_easy=math_test_easy+1 where username=:username";
            }elseif ($level == "1"){
                $sql = "UPDATE user set math_test_med=math_test_med+1 where username=:username";
            }else{
                $sql = "UPDATE user set math_test_hard=math_test_hard+1 where username=:username";
            }
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":username",$username,PDO::PARAM_STR);
            $isUpdateOK = $stmt->execute();

            $stmt = null;
            $pdo = null;

            if($isUpdateOK){
                $result = "Math test score updated!";
            }else{
                $result = "Update failed!";
            }

            $stmt = null;
            $pdo = null;

            return $result;
        }

        public function updateSciTest($username, $level){
            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection();
            
            if ($level == "0"){
                $sql = "UPDATE user set sci_test_easy=sci_test_east+1 where username=:username";
            }elseif ($level == "1"){
                $sql = "UPDATE user set sci_test_med=sci_test_med+1 where username=:username";
            }else{
                $sql = "UPDATE user set sci_test_hard=sci_test_hard+1 where username=:username";
            }
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":username",$username,PDO::PARAM_STR);
            $isUpdateOK = $stmt->execute();

            $stmt = null;
            $pdo = null;

            if($isUpdateOK){
                $result = "Science test score updated!";
            }else{
                $result = "Update failed!";
            }

            $stmt = null;
            $pdo = null;

            return $result;
        }
    }

?>