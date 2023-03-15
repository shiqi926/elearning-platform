<?php
class ConnectionManager {
    public function getConnection() {
        $servername = 'localhost';
        $dbname = 'finalsfantasy';
        $username = 'root';
        $password = '';
        
        $url  = "mysql:host=$servername;dbname=$dbname";
        return new PDO($url, $username, $password);  
    }
}
?>