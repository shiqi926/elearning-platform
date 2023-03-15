<?php 
    class User{
        private $username;
        private $hashedPassword;
        public function __construct($username,$hashedPassword,$age,$mathTestEasy, $mathTestMed, $mathTestHard, $sciTestEast, $sciTestMed, $sciTestHard){
            $this->username = $username;
            $this->hashedPassword = $hashedPassword;
            $this->age = $age;
            $this->mathTestEasy = $mathTestEasy;
            $this->mathTestMed = $mathTestMed;
            $this->mathTestHard = $mathTestHard;
            $this->sciTestEasy = $sciTestEasy;
            $this->sciTestMed = $sciTestMed;
            $this->sciTestHard = $sciTestHard;

        }
        public function getUsername(){
            return $this->username;
        }
        public function getHashedPassword(){
            return $this->hashedPassword;
        }
        public function getAge(){
            return $this->age;
        }
        public function getmathTestEasy(){
            return $this->mathTestEasy;
        }
        public function getmathTestMed(){
            return $this->mathTestMed;
        }
        public function getmathTestHard(){
            return $this->mathTestHard;
        }
        public function getsciTestEasy(){
            return $this->mathTestHard;
        }
        public function getsciTestMed(){
            return $this->sciTestMed;
        }
        public function getsciTestHard(){
            return $this->sciTestHard;
        }
      
    }
?>